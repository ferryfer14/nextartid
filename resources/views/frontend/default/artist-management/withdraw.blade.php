@extends('index')
@section('pagination')
    @foreach ($withdraw as $trx)
        <tr class="module" data-toggle="contextmenu" data-trigger="right" data-type="withdraw" data-id="{{ $trx->id }}">
            <td class="text-center desktop">{{ $trx->bank }}</td>
            <td class="text-center">{{ $trx->name }}</td>
            <td class="text-center">{{ $trx->account_number }}</td>
            <td class="text-center">${{ $trx->value }}</td>
            <td class="text-center">Rp {{ number_format((float)($trx->value_idr), 0, ',', '.') }}</td>
            <td class="text-center">Rp {{ number_format((float)($trx->value_tax), 0, ',', '.') }}</td>
            <td class="text-center">Rp {{ number_format((float)($trx->value_admin), 0, ',', '.') }}</td>
            <td class="text-center">Rp {{ number_format((float)($trx->value_total), 0, ',', '.') }}</td>
            <td class="text-center">
                @if($trx->status == 0)
                    <span class="badge badge-warning">Pending</span>
                @else
                    <span class="badge badge-success">Success</span>
                @endif
            </td>
            <td class="text-center">{{\Carbon\Carbon::parse($trx->created_at)->format('M j, Y')}}</td>
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
                    <div class="byline">Your History Withdraw</div>
                </div>
            </div>
            @include('artist-management.nav-transaction')
            <br/>
            <div id="page-content" class="p-0">
                <div id="column1" class="full">
                    @if(count($withdraw))
                        <div class="card shadow">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h2 class="m-0 font-weight-bold" data-translate-text="Withdraw">Transaction</h2>
                            </div>
                            <div class="card-body">
                                <table class="table artist-management">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Bank Name</th>
                                        <th class="text-center">Account Name</th>
                                        <th class="text-center">Account Number</th>
                                        <th class="text-center">Value</th>
                                        <th class="text-center">Value IDR</th>
                                        <th class="text-center">Tax</th>
                                        <th class="text-center">Admin</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Created Date</th>
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