@extends('index')
@section('pagination')
    @foreach ($participants as $par)
        <tr class="module" data-toggle="contextmenu" data-trigger="right" data-type="artists" data-id="{{ $par->id }}">
            <td class="text-center desktop">{{ $par->artist_name }}</td>
            <td class="text-center">{{ $my_artist[$par->artist_role]['name'] }}</td>
        </tr>
    @endforeach
@stop
@section('content')
    @include('artist-management.nav', ['artist' => $artist])
    <div id="page-content">
        <div class="container">
            <div class="page-header artist main small desktop"> <a class="img "> <img src="{{ $artist->artwork_url }}" alt="{{ $artist->name}}">  </a>
                <div class="inner">
                    <h1 title="{!! auth()->user()->name; !!}">{!! auth()->user()->name; !!}<span class="subpage-header"> / Participants</span></h1>
                    <div class="byline">Your's Participants</div>
                </div>
            </div>
            @include('artist-management.nav-artist')
            <br/>
            <div id="page-content" class="p-0">
                <div id="column1" class="full">
                    @if(count($participants))
                        <div class="card shadow">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h2 class="m-0 font-weight-bold" data-translate-text="Artists">Participants</h2>
                            </div>
                            <div class="card-body">
                                <table class="table artist-management">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Role</th>
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