@extends('index')
@section('pagination')
    @foreach ($withdraw as $trx)
        <tr class="module" data-toggle="contextmenu" data-trigger="right" data-type="withdraw" data-id="{{ $trx->id }}">
            <td class="text-center desktop">{{ $trx->bank }}</td>
            <td class="text-center">{{ $trx->name }}</td>
            <td class="text-center">{{ $trx->account_number }}</td>
            <td class="text-center">Rp {{ number_format((float)($trx->value), 0, ',', '.') }}</td>
            <td class="text-center">
                @if($trx->status == 0)
                    <span class="badge badge-warning">Pending</span>
                @else
                    <span class="badge badge-success">Success</span>
                @endif
            </td>
            <td class="text-center">{{\Carbon\Carbon::parse($trx->created_at)->format('M j, Y')}}</td>
            <td>
                <a class="btn options" target="_blank" href="{{ route('frontend.auth.user.artist.manager.albums.invoice.withdraw', ['id' => $trx->id]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    </svg>
                </a>
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
                    <div class="byline">Your Withdrawal History </div>
                </div>
            </div>
            @include('artist-management.nav-transaction')
            <br/>
            <div id="page-content" class="p-0">
                <div id="column1" class="full">
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h2 class="m-0 font-weight-bold" data-translate-text="Withdraw">Withdraw</h2>
                        </div>
                        <div class="card-body">
                            <table class="table artist-management">
                                <thead>
                                <tr>
                                    <th class="text-center">Bank Name</th>
                                    <th class="text-center">Account Name</th>
                                    <th class="text-center">Account Number</th>
                                    <th class="text-center">Value</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Created Date</th>
                                    <th class="text-center"></th>
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
    </div>
@endsection