@extends('index')
@section('pagination')      
    @foreach ($artist as $index => $artist)
        <tr class="module" data-toggle="contextmenu" data-trigger="right" data-type="artist" data-id="{{ $artist->id }}">
            <td class="text-center desktop">{{ $artist->name }}</td>
            <td class="text-right desktop">${{ round($artist->balance_confirm,3) }}</td>
            <td class="text-right desktop"></td>
            <td class="text-right secondary-actions-container">
                <div class="row-actions secondary align-items-stretch">
                    <a class="btn options artist-royalti" data-type="artist" data-id="{{ $artist->id }}">
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
        <script>var artist_data_{{ $artist->id }} = {!! json_encode($artist) !!}</script>
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
                        <!--@include('artist-management.actions')-->
                    </div>
                </div>
            </div>
            @include('artist-management.nav-royalti')
            <br/>
            <div id="column1" class="full">  
                <div class="card shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2 class="m-0 font-weight-bold" data-translate-text="Artists">Artists</h2>
                    </div>
                    <div class="card-body">
                        <table class="table artist-management">
                            <thead>
                            <tr>
                                <th class="text-center">Artist Name</th>
                                <th class="text-right">Royalti</th>
                                <th class="text-right"></th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody class="infinity-load-more">
                                @yield('pagination')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection