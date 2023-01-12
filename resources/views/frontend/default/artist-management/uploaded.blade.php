@extends('index')
@section('pagination')      
    @foreach ($albums as $index => $album)
    <div class="card shadow mb-4">
        <div class="card-header py-3 border-1">
            <div class="row align-items-center" data-id="{{$album->id}}">  
                <div class="col-sm-1">                    
                    <div class="img-container">
                        <img class="img" width="50" height="50" src="{{$album->artwork_url}}" alt="{!! $album->title !!}">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="metadata">
                        <div class="title">
                            <!--<p class="text-secondary">Title Album</p>-->
                            <a class="btn btn-link p-0 m-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h3 class="m-0 font-weight-bold text-primary">{{ $album->title }}</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">   
                    <!--<p class="text-secondary">UPC</p>-->
                    <h4 class="m-0 font-weight-bold text-primary">UPC: {{ round($album->upc) }}</h4>                 
                </div>
                <div class="col-sm-2">   
                    <!--<p class="text-secondary">Royalty</p>-->
                    <h4 class="m-0 font-weight-bold text-primary">${{ round($album->sum_royalti,3) }}</h4>                 
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="accordion" id="collapseMetaTags">
                <div id="collapseOne" class="collapse p-4" aria-labelledby="headingOne" data-parent="#collapseMetaTags">
                    <h4 class="m-0 font-weight-bold text-primary">Songs</h4>
                    <table class="table artist-management">
                        <thead>
                        <tr>
                            <th class="th-image"></th>
                            <th class="text-left">Title</th>
                            <th class="desktop">ISRC</th>
                            <th class="desktop">Plays</th>
                            <th class="desktop">Favs</th>
                            <th class="desktop">Royalty</th>
                            <th class="text-right"></th>
                        </tr>
                        </thead>
                        <tbody class="infinity-load-more">
                            @foreach ($album->song as $index => $song)
                                <tr class="module" data-toggle="contextmenu" data-trigger="right" data-type="song" data-id="{{ $song->id }}">
                                    <td style="width: 60px">
                                        <div class="img-container">
                                            <img class="img" src="{{$song->artwork_url}}" alt="{!! $song->title !!}">
                                            <div class="row-actions primary song-play-action">
                                                @if(! $song->pending)
                                                    <a class="btn play-lg play-object" data-type="song" data-id="{{ $song->id }}">
                                                        <svg class="icon-play" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                                        <svg class="icon-pause" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                                        <svg class="icon-waiting embed_spin" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252.264 252.264" xml:space="preserve"><path d="M248.988,80.693c-3.423-2.335-8.089-1.452-10.422,1.97l-15.314,22.453c-9.679-44.721-49.575-78.354-97.123-78.354c-26.544,0-51.498,10.337-70.265,29.108c-2.929,2.929-2.928,7.678,0.001,10.606c2.929,2.929,7.678,2.929,10.606-0.001c15.933-15.937,37.12-24.713,59.657-24.713c41.32,0,75.815,29.921,82.98,69.228l-26.606-18.147c-3.423-2.336-8.089-1.452-10.422,1.97c-2.334,3.422-1.452,8.088,1.971,10.422l39.714,27.087c0.003,0.002,0.005,0.003,0.007,0.005c0.97,0.661,2.039,1.064,3.128,1.225c0.362,0.053,0.727,0.08,1.091,0.08c2.396,0,4.751-1.146,6.203-3.274l26.764-39.242C253.293,87.693,252.41,83.027,248.988,80.693z"></path><path d="M187.196,184.351c-16.084,16.863-37.77,26.15-61.065,26.15c-41.317-0.001-75.813-29.921-82.978-69.227l26.607,18.147c1.293,0.882,2.764,1.305,4.219,1.305c2.396,0,4.751-1.145,6.203-3.274c2.334-3.422,1.452-8.088-1.97-10.422l-39.714-27.087c-0.002-0.001-0.004-0.003-0.006-0.005c-3.424-2.335-8.088-1.452-10.422,1.97L1.304,161.149c-2.333,3.422-1.452,8.088,1.97,10.422c1.293,0.882,2.764,1.304,4.219,1.304c2.397,0,4.751-1.146,6.203-3.275l15.313-22.453c9.68,44.72,49.577,78.352,97.121,78.352c27.435,0,52.977-10.938,71.919-30.797c2.859-2.997,2.747-7.745-0.25-10.604C194.8,181.241,190.053,181.353,187.196,184.351z"></path></svg>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($song->approved)
                                            <a class="song-link" href="{{ $song->permalink_url }}" data-song-id="{{ $song->id }}">{!! $song->title !!}</a>
                                        @else
                                            <span class="text-muted">{!! $song->title !!}</span>
                                        @endif
                                    </td>
                                    <td class="text-center desktop">{{ $song->isrc }}</td>
                                    <td class="text-center desktop">{{ $song->plays }}</td>
                                    <td class="text-center desktop">{{ $song->loves }}</td>
                                    <td class="text-center desktop">${{ round($song->sum_royalti,3) }}</td>
                                    <td class="text-right secondary-actions-container">
                                        <div class="row-actions secondary align-items-stretch">
                                            <a class="btn options song-royalti" data-type="song" data-id="{{ $song->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                                    <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                                                </svg>
                                            </a>
                                            <!--<a class="btn options song-row-delete" data-type="song" data-id="{{ $song->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                            </a>-->
                                            <a class="btn options" data-toggle="contextmenu" data-trigger="left" data-type="song" data-id="{{ $song->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <script>var song_data_{{ $song->id }} = {!! json_encode($song->makeVisible(['description', 'copyright', 'released_at'])) !!}</script>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@stop
@section('content')
    @include('artist-management.nav', ['artist' => $artist])
    <div id="page-content">
        <div class="container">
            <div class="page-header artist main small desktop"> <a class="img "> <img src="{{ $artist->artwork_url }}" alt="{{ $artist->name}}">  </a>
                <div class="inner">
                    <h1 title="{!! auth()->user()->email !!}">{!! auth()->user()->email !!}<span class="subpage-header"> / Royalty</span></h1>
                    <div class="byline">Royalty History.</div>
                    <div class="actions-primary">
                        <a class="btn withdraw-royalti" data-min="100" data-max="{{ round($artist->balance_confirm,3)-round($artist->sum_withdraw,3) }}">
                            <svg height="26" width="14" viewBox="0 0 511.854 511.854" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m480.927 190.854c16.542 0 30-13.458 30-30v-38.844c0-12.317-7.377-23.234-18.8-27.831l-224.952-91.98c-7.325-2.951-15.252-2.899-22.391-.042-.166.067 3.765-1.54-225.058 92.023-11.423 4.596-18.8 15.514-18.8 27.831v38.845c0 16.542 13.458 30 30 30h18v226h-18c-16.542 0-30 13.458-30 30v35c0 16.542 13.458 30 30 30h450c16.542 0 30-13.458 30-30v-35c0-16.542-13.458-30-30-30h-18v-226h18.001zm0 256c.019 35.801.1 35 0 35h-450v-35zm-402-30v-226h34v226zm64 0v-226h66v226zm96 0v-226h34v226zm64 0v-226h66v226zm96 0v-226h34v226zm-368-256c0-41.843-.045-38.826.105-38.887l224.895-91.957 224.895 91.957c.155.062.105-2.857.105 38.887-4.986 0-444.075 0-450 0z"/></g><g><path d="m255.927 64.854c-8.284 0-15 6.716-15 15v32c0 8.284 6.716 15 15 15s15-6.716 15-15v-32c0-8.284-6.716-15-15-15z"/></g></g></svg>
                            <span>Convert Royalty to Wallet</span>
                        </a>
                        <!--@include('artist-management.actions')-->
                    </div>
                    <ul class="stat-summary">
                        <li><a class="basic-tooltip" tooltip="Available Royalty"><span class="num">${{ round($artist->balance_confirm,3)-round($artist->sum_withdraw,3) }}</span><span class="label" data-translate-text="BALANCE">{{ __('web.BALANCE') }}</span></a></li>
                    </ul>
                </div>
            </div>
            @include('artist-management.nav-royalti')
            <br/>
            <div id="column1" class="full">  
                @yield('pagination')
            </div>
        </div>
    </div>
@endsection