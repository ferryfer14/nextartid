@extends('index')
@section('content')
    @include('artist-management.nav', ['artist' => $artist])
    <script>var album_data_{{ $album->id }} = {!! json_encode($album->makeHidden('songs')) !!}</script>
    <script>var artist_roles_{{ $album->id }} = {!! json_encode($artist_roles) !!}</script>
    <script>var patners_{{ $album->id }} = {!! json_encode($album->patner) !!}</script>
    <script>var data_patner = {!! json_encode($patners) !!}</script>
    <div id="page-content">
        <div class="container">
            <div class="page-header artist-management main mb-0 pb-1">
                <div class="img">
                    <img src="{{ $album->artwork_url }}" alt="{!! $album->title !!}">
                </div>
                <div class="inner">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 title="{!! $album->title !!}">{!! $album->title !!}, ({{ $album->remix_version }})</h1>
                            <div class="mt-2">
                                <a class="btn edit" data-type="album" data-id="{{ $album->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                                    <span data-translate-text="EDIT">{{ __('web.EDIT') }}</span>
                                </a>

                                @if($album->paid == 0)
                                    @if($album->album_type->max == $album->song_count)
                                    @else
                                        <a class="btn upload" href="{{ route('frontend.auth.user.artist.manager.albums.upload', ['id' => $album->id]) }}">
                                            <svg width="14" height="26" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                                <path d="M380.032,133.472l-112-128C264.992,2.016,260.608,0,256,0c-4.608,0-8.992,2.016-12.032,5.472l-112,128
                                                        c-4.128,4.736-5.152,11.424-2.528,17.152C132.032,156.32,137.728,160,144,160h64v208c0,8.832,7.168,16,16,16h64
                                                        c8.832,0,16-7.168,16-16V160h64c6.272,0,11.968-3.648,14.56-9.376C385.152,144.896,384.192,138.176,380.032,133.472z"/>
                                                <path d="M432,352v96H80v-96H16v128c0,17.696,14.336,32,32,32h416c17.696,0,32-14.304,32-32V352H432z"/>
                                            </svg>
                                            <span data-translate-text="UPLOAD">Upload</span>
                                        </a>
                                    @endif
                                @endif
                                <!--@if($album->approved)-->
                                <!--    <a class="btn share" data-type="album" data-id="{{ $album->id }}">-->
                                <!--        <svg height="26" viewBox="0 0 24 24" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg>-->
                                <!--        <span data-translate-text="SHARE">{{ __('web.SHARE') }}</span>-->
                                <!--    </a>-->
                                <!--@endif-->
                                @if($album->paid == 0)
                                    <a class="btn delete" data-type="album" data-id="{{ $album->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                                        <span data-translate-text="DELETE">Delete</span>
                                    </a>
                                @endif
                            </div>
                            <div class="description">
                                <p id="user-bio"></p>
                            </div>
                            <ul class="stat-summary">
                                <li class="basic-tooltip" tooltip="Before tax">
                                    <a href="{{ route('frontend.auth.user.artist.manager.uploaded') }}">
                                        <span class="num">${{ round($album->sum_royalti,3) }}</span>
                                        <span class="label" data-translate-text="ROYALTI">Royalti</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.auth.user.artist.manager.uploaded') }}">
                                        <span class="num">{{ $album->song_count }}</span>
                                        <span class="label" data-translate-text="SONGS">Songs</span>
                                    </a>
                                </li>
                                <li>
                                    <span id="album-count" class="num">{{ $artist->album_count }}</span>
                                    <span class="label" data-translate-text="">Duration</span>
                                </li>
                                <li>
                                    <span class="num">
                                        @if($album->approved) Approved @else <span class="badge badge-warning basic-tooltip" tooltip="To get this album published, it needs to be approved by Admin.">Processing</span> @endif
                                    </span>
                                    <span class="label" data-translate-text="">Status</span>
                                </li>
                                <li>
                                    <span class="num">
                                        @if($album->paid) Paid @else <span class="badge badge-warning basic-tooltip" tooltip="To get this album paid, you have to pay this album.">Unpaid</span> @endif
                                    </span>
                                    <span class="label" data-translate-text="">Status Payment</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4" style="min-height: 120px;">
                            <div class="card {{$album->paid == 1 ? 'd-none' : ''}}">
                                <div class="m-2">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <p class="d-flex justify-content-center">{{ $album->song_count }} Songs x {{ number_format((float)($album->price->harga), 0, ',', '.') }}</p>
                                            <p class="d-flex justify-content-left">Discount {{(($album->price->harga-$album->price->harga_discount)/$album->price->harga)*100}}%</p>
                                            @if(isset($transaction->voucher_id))
                                                <a class="remove_voucher" data-id="{{ $transaction->id }}">
                                                    <svg class="align-middle" xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                                    <span>Voucher</span>
                                                </a>   
                                            @endif
                                            @if(isset($transaction->free_song_id))
                                                <p class="d-flex justify-content-left">({{ $album->free_song->name }})</p>
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="d-flex justify-content-center">{{ number_format((float)($album->price->harga*$album->song_count), 0, ',', '.') }}</p>
                                            <p class="d-flex text-danger justify-content-center">({{ number_format((float)(($album->price->harga-$album->price->harga_discount)*$album->song_count), 0, ',', '.') }})</p>
                                            @if(isset($transaction->voucher_id))
                                                <p class="d-flex text-danger justify-content-center">({{ number_format((float)$transaction->nilai_voucher, 0, ',', '.') }})</p>
                                            @endif
                                            @if(isset($transaction->free_song_id))
                                                <p class="d-flex text-danger justify-content-center">({{ number_format((float)$transaction->nilai_free_song, 0, ',', '.') }})</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-sm-8">
                                            <p class="d-flex justify-content-left">Total</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <hr class="sidebar-divider m-0">
                                            @if(isset($transaction->voucher_id))
                                                <p class="d-flex justify-content-center"><b>{{ number_format((float)($transaction->amount-$transaction->nilai_voucher-$transaction->nilai_free_song), 0, ',', '.') }}</b></p>
                                            @else
                                                <b class="d-flex justify-content-center">{{ number_format((float)($transaction->amount-$transaction->nilai_free_song), 0, ',', '.') }}</b>
                                            @endif
                                        </div>
                                    </div>
                                    @if(!isset($transaction->voucher_id) && $album->song_count > 0)
                                        @if (session('status') && session('status') == 'failed')
                                            <div class="alert alert-danger">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        <form id="voucher-form" class="ajax-form mt-2 mb-1" method="post" action="{{ route('frontend.auth.user.artist.manager.voucher.apply') }}" enctype="multipart/form-data" novalidate>    
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="control field">
                                                        <input name="id" type="hidden" value="{{$album->id}}">
                                                        <input name="code" placeholder="code voucher" type="text" value="" required>
                                                    </div>
                                                </div>
                                                <div class="co-sm-4">                    
                                                    <button class="btn btn-primary" type="submit" data-translate-text="APPLY">{{ __('web.APPLY') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                    @if($album->paid == 0)
                                        <a data-type="pay" data-id="{{ $album->id }}" class=" w-100 btn {{ $album->song_count*$album->price->harga_discount == 0 ? 'btn-secondary' : 'pay btn-primary' }}">Pay Now</a>
                                    @else
                                        <a data-type="pay" data-id="{{ $album->id }}" class=" w-100 btn btn-secondary">Pay Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="font-size: 90%;">
                <div class="col-sm-3">
                    <span class="label">Display Artist : {{ $album->primary_artist }} </span><br/>
                    <span class="label">UPC : {{ $album->upc }}</span><br/>
                    <span class="label">Digital Release : {{ Date('Y-m-d', strtotime($album->released_at)) }}</span><br/>
                    <span class="label">Posting Date : {{ Date('Y-m-d', strtotime($album->inserted_at)) }}</span>
                </div>
                <div class="col-sm-3 m-0 p-0">
                    <span class="label">Artist : {{ $album->primary_artist }}@foreach($album->participants as $p) @if($p->artist_role == 1), {{ $p->artist_name }}@endif @endforeach</span><br/>
                    <span class="label">Composer : {{ $album->composer }}@foreach($album->participants as $p) @if($p->artist_role == 5), {{ $p->artist_name }}@endif  @endforeach </span><br/>
                    <span class="label">Arranger : {{ $album->arranger }}@foreach($album->participants as $p) @if($p->artist_role == 11), {{ $p->artist_name }}@endif  @endforeach </span><br/>
                    <span class="label"> Lyricist : {{ $album->lyricist }}@foreach($album->participants as $p) @if($p->artist_role == 6), {{ $p->artist_name }}@endif  @endforeach </span><br/>
                    @php    
                        $others = @foreach($album->participants as $p) @if($p->artist_role != 1 && $p->artist_role != 5 && $p->artist_role != 11 && $p->artist_role != 6){{ $p->artist_name }}, @endif  @endforeach;
                        $others = preg_replace(strrev("/,/"),strrev(""),strrev($others),1);
                    @endphp
                    <span class="label">Others : {{ $others }} </span>
                </div>
            </div>
            <div id="column1" class="full album-song-sortable" data-type="album" data-id="{{ $album->id }}">
                <div class="module module-row song tall artist-management can-drag drag-handle">
                    <div class="drag-handle">
                    <!--    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M11 18c0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2 2 .9 2 2zm-2-8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 4c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    </div>
                    <div class="img-container">
                    </div>-->
                    <div class="metadata">
                        <div class="title">
                            <div class="row">
                                <div class="col-sm-6">
                                    Title
                                </div>
                                <div class="col-sm-6">
                                    <span class="text-secondary">ISRC</span>
                                </div>    
                            </div>
                        </div>
                        <div class="artist">
                            Artist
                        </div>
                        <div class="duration"></div>
                    </div>
                    <div class="row-actions secondary">
                    </div>
                </div>
                @foreach($album->songs as $song)
                    <script>var song_data_{{ $song->id }} = {!! json_encode($song) !!}</script>
                    <div class="module module-row song tall artist-management can-drag drag-handle" data-song-id="{{$song->id}}" data-type="song" data-id="{{$song->id}}">
                        <div class="drag-handle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M11 18c0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2 2 .9 2 2zm-2-8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 4c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                        </div>
                        <div class="img-container">
                            <img class="img" src="{{$song->artwork_url}}" alt="{!! $song->title !!}">
                            <div class="row-actions primary song-play-action">
                                <a class="btn play-lg play-object" data-type="song" data-id="{{ $song->id }}">
                                    <svg class="icon-play" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                    <svg class="icon-pause" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                    <svg class="icon-waiting embed_spin" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 252.264 252.264" xml:space="preserve"><path d="M248.988,80.693c-3.423-2.335-8.089-1.452-10.422,1.97l-15.314,22.453c-9.679-44.721-49.575-78.354-97.123-78.354c-26.544,0-51.498,10.337-70.265,29.108c-2.929,2.929-2.928,7.678,0.001,10.606c2.929,2.929,7.678,2.929,10.606-0.001c15.933-15.937,37.12-24.713,59.657-24.713c41.32,0,75.815,29.921,82.98,69.228l-26.606-18.147c-3.423-2.336-8.089-1.452-10.422,1.97c-2.334,3.422-1.452,8.088,1.971,10.422l39.714,27.087c0.003,0.002,0.005,0.003,0.007,0.005c0.97,0.661,2.039,1.064,3.128,1.225c0.362,0.053,0.727,0.08,1.091,0.08c2.396,0,4.751-1.146,6.203-3.274l26.764-39.242C253.293,87.693,252.41,83.027,248.988,80.693z"></path><path d="M187.196,184.351c-16.084,16.863-37.77,26.15-61.065,26.15c-41.317-0.001-75.813-29.921-82.978-69.227l26.607,18.147c1.293,0.882,2.764,1.305,4.219,1.305c2.396,0,4.751-1.145,6.203-3.274c2.334-3.422,1.452-8.088-1.97-10.422l-39.714-27.087c-0.002-0.001-0.004-0.003-0.006-0.005c-3.424-2.335-8.088-1.452-10.422,1.97L1.304,161.149c-2.333,3.422-1.452,8.088,1.97,10.422c1.293,0.882,2.764,1.304,4.219,1.304c2.397,0,4.751-1.146,6.203-3.275l15.313-22.453c9.68,44.72,49.577,78.352,97.121,78.352c27.435,0,52.977-10.938,71.919-30.797c2.859-2.997,2.747-7.745-0.25-10.604C194.8,181.241,190.053,181.353,187.196,184.351z"></path></svg>
                                </a>
                            </div>
                        </div>
                        <div class="metadata">
                            <div class="title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!--<a href="{{ $song->permalink_url }}">{!! $song->title !!}</a> -->
                                        <a>{!! $song->title !!}</a> 
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-secondary">{{ $song->isrc }}</span>
                                    </div>    
                                </div>
                            </div>
                            <div class="artist">
                                {{ $song->primary_artist }}
                            </div>
                            <div class="duration">{{humanTime($song->duration)}}</div>
                        </div>
                        <div class="row-actions secondary">
                            <a class="btn options song-row-edit" data-type="song" data-id="{{ $song->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                            </a>
                            @if($album->paid == 0)
                                <a class="btn options song-row-delete" data-type="song" data-id="{{ $song->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                </a>
                            @endif
                            <!--<a class="btn options" data-toggle="contextmenu" data-trigger="left" data-type="song" data-id="{{ $song->id }}">-->
                            <!--    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>-->
                            <!--</a>-->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
