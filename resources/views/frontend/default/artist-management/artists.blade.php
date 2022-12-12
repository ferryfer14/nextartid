@extends('index')
@section('pagination')
    @foreach ($artists as $art)
        <tr class="module" data-toggle="contextmenu" data-trigger="right" data-type="artists" data-id="{{ $art->id }}">
            <td class="text-center desktop">{{ $art->name }}</td>
            <td class="text-center">
                @if($art->verified)
                    <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 367 367" class="basic-tooltip" tooltip="This song has been approved by admin.">
                        <path fill="#3BB54A" d="M183.903,0.001c101.566,0,183.902,82.336,183.902,183.902s-82.336,183.902-183.902,183.902S0.001,285.469,0.001,183.903l0,0C-0.288,82.625,81.579,0.29,182.856,0.001C183.205,0,183.554,0,183.903,0.001z"/>
                        <polygon fill="#D4E1F4" points="285.78,133.225 155.168,263.837 82.025,191.217 111.805,161.96 155.168,204.801 256.001,103.968"/>
                    </svg>
                @else
                    <svg fill="#ffc107" width="18" height="18" class="basic-tooltip" tooltip="Waiting to be approved." xmlns="http://www.w3.org/2000/svg" viewBox="0 0 299.995 299.995">
                        <path d="M149.995,0C67.156,0,0,67.158,0,149.995s67.156,150,149.995,150s150-67.163,150-150S232.834,0,149.995,0zM214.842,178.524H151.25c-0.215,0-0.415-0.052-0.628-0.06c-0.213,0.01-0.412,0.06-0.628,0.06c-5.729,0-10.374-4.645-10.374-10.374V62.249c0-5.729,4.645-10.374,10.374-10.374s10.374,4.645,10.374,10.374v95.527h54.47c5.729,0,10.374,4.645,10.374,10.374C225.212,173.879,220.571,178.524,214.842,178.524z"/>
                    </svg>
                @endif
            </td>
        </tr>
    @endforeach
@stop
@section('content')
    @include('artist-management.nav', ['artist' => $artist])
    <div id="page-content">
        <div class="container">
            <div class="page-header artist main small desktop"> <a class="img "> <img src="{{ $artist->artwork_url }}" alt="{{ $artist->name}}">  </a>
                <div class="inner">
                    <h1 title="{!! auth()->user()->email; !!}">{!! auth()->user()->email; !!}<span class="subpage-header"> / Artists</span></h1>
                    <div class="byline">Managed your artists</div>
                </div>
            </div>
            @include('artist-management.nav-artist')
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
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Status</th>
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