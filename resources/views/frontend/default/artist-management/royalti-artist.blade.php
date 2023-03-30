@extends('index')
@section('pagination')      
    @foreach ($artists as $index => $art)
        <tr class="module" data-toggle="contextmenu" data-trigger="right" data-type="artist" data-id="{{ $artist->id }}">
            <td class="text-center desktop">{{ $art->name }}</td>
            <td class="text-center desktop">${{ round($art->balance_confirm_artist,2) }}</td>
            <td class="text-center desktop">${{ round($art->balance_unconfirm_artist,2) }}</td>
            <td class="text-center desktop"></td>
            <td class="text-center secondary-actions-container">
                <div class="row-actions secondary align-items-stretch">
                    <a class="btn options artist-royalti basic-tooltip" tooltip="Confirmed Royalty Details"  data-type="artist" data-id="{{ $art->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                            <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                        </svg>
                    </a>
                    <a class="btn options artist-unconfirm basic-tooltip" tooltip="Unconfirmed Royalty Details"  data-type="artist" data-id="{{ $art->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                            <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                        </svg>
                    </a>
                    <!--<a class="btn options song-row-delete" data-type="song" data-id="{{ $artist->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                    </a>-->
                </div>
            </td>
        </tr>
        <script>var artist_data_{{ $art->id }} = {!! json_encode($art) !!}</script>
    @endforeach
@stop
@section('content')
    @include('artist-management.nav', ['artist' => $artist])
    <div id="page-content">
        <div class="container">
            <div class="page-header artist main small desktop"> <a class="img "> <img src="{{ $artist->artwork_url }}" alt="{{ $artist->name}}">  </a>
                <div class="inner">
                    <h1 title="{!! auth()->user()->email !!}">{!! auth()->user()->email !!}<span class="subpage-header"> / Royalty</span></h1>
                    <div class="byline">History royalty.</div>
                    <div class="actions-primary">
                        <a class="btn withdraw-royalti" data-min="100" data-max="{{ round($artist->balance_confirm,2)-round($artist->sum_withdraw,2) }}">
                            <svg height="26" width="14" viewBox="0 0 511.854 511.854" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m480.927 190.854c16.542 0 30-13.458 30-30v-38.844c0-12.317-7.377-23.234-18.8-27.831l-224.952-91.98c-7.325-2.951-15.252-2.899-22.391-.042-.166.067 3.765-1.54-225.058 92.023-11.423 4.596-18.8 15.514-18.8 27.831v38.845c0 16.542 13.458 30 30 30h18v226h-18c-16.542 0-30 13.458-30 30v35c0 16.542 13.458 30 30 30h450c16.542 0 30-13.458 30-30v-35c0-16.542-13.458-30-30-30h-18v-226h18.001zm0 256c.019 35.801.1 35 0 35h-450v-35zm-402-30v-226h34v226zm64 0v-226h66v226zm96 0v-226h34v226zm64 0v-226h66v226zm96 0v-226h34v226zm-368-256c0-41.843-.045-38.826.105-38.887l224.895-91.957 224.895 91.957c.155.062.105-2.857.105 38.887-4.986 0-444.075 0-450 0z"/></g><g><path d="m255.927 64.854c-8.284 0-15 6.716-15 15v32c0 8.284 6.716 15 15 15s15-6.716 15-15v-32c0-8.284-6.716-15-15-15z"/></g></g></svg>
                            <span data-translate-text="WITHDRAW">{{ __('web.WITHDRAW') }}</span>
                        </a>
                        <!--@include('artist-management.actions')-->
                    </div>
                    <ul class="stat-summary">
                        <li><a class="basic-tooltip" tooltip="Available Royalty"><span class="num">${{ round($artist->balance_confirm,2) }}</span><span class="label" data-translate-text="BALANCE_CONFIRM">Confirmed Balance</span></a></li>
                        <li><a class="basic-tooltip" tooltip="Unconfirmed Royalty"><span class="num">${{ round($artist->balance_unconfirm,2) }}</span><span class="label" data-translate-text="BALANCE_UNCONFIRM">Unconfirmed Balance</span></a></li>
                        <li><a class="basic-tooltip" tooltip="Available IDR"><span class="num">Rp {{ number_format((float)($artist->balance_idr), 0, ',', '.') }}</span><span class="label" data-translate-text="BALANCE_IDR">IDR Balance</span></a></li>
                    </ul>
                </div>
            </div>
            @include('artist-management.nav-royalti')
            <br/>
            <div id="page-content" class="p-0">
                <div id="column1" class="full">  
                    @if(count($artists))
                        <div class="card shadow">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h2 class="m-0 font-weight-bold" data-translate-text="Artists">Artists</h2>
                            </div>
                            <div class="card-body">
                                <table class="table artist-management">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Artist Name</th>
                                        <th class="text-center basic-tooltip" tooltip="Upto Today Royalty">Confirmed Royalty</th>
                                        <th class="text-center basic-tooltip" tooltip="Unconfirmed Royalty">Unconfirmed Royalty</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="infinity-load-more">
                                        @yield('pagination')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection