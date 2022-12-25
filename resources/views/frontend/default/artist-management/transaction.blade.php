@extends('index')
@section('pagination')
    @foreach ($transaction as $trx)
        @if(isset($trx->payments))
            <tr class="module" data-toggle="contextmenu" data-trigger="right" data-type="transaction" data-id="{{ $trx->id }}">
                <td class="text-center desktop"><a href="{{ route('frontend.auth.user.artist.manager.albums.show', ['id' => $trx->albums->id]) }}">NXA{{ $trx->transaction_id }}</a></td>
                <td class="text-center"><a href="{{ route('frontend.auth.user.artist.manager.albums.show', ['id' => $trx->albums->id]) }}">{{$trx->albums->title}}</a></td>
                <td class="text-center">Rp {{ number_format((float)($trx->amount), 0, ',', '.') }}</td>
                <td class="text-center text-danger">Rp {{ number_format((float)($trx->nilai_voucher), 0, ',', '.') }}</td>
                <td class="text-center text-success">Rp {{ number_format((float)($trx->amount-$trx->nilai_voucher), 0, ',', '.') }}</td>
                <td class="text-center">
                    @if($trx->status == 0)
                        <span class="badge badge-danger">Pending</span>
                    @else
                        <span class="badge badge-success">Paid</span>
                    @endif
                </td>
                <td class="text-center">{{\Carbon\Carbon::parse($trx->payments->created_at)->format('M j, Y')}}</td>
            </tr>
        @endif
    @endforeach
@stop
@section('content')
    @include('artist-management.nav', ['artist' => $artist])
    <div id="page-content">
        <div class="container">
            <div class="page-header artist main small desktop"> <a class="img "> <img src="{{ $artist->artwork_url }}" alt="{{ $artist->name}}">  </a>
                <div class="inner">
                    <h1 title="{!! auth()->user()->email; !!}">{!! auth()->user()->email; !!}<span class="subpage-header"> / Artists</span></h1>
                    <div class="byline">Your History Transaction</div>
                </div>
            </div>
            <br/>            
            <div id="page-content" class="p-0">
                <div id="column1" class="full">
                    @if(count($transaction))
                        <div class="card shadow">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h2 class="m-0 font-weight-bold" data-translate-text="Transaction">Transaction</h2>
                            </div>
                            <div class="card-body">
                                <table class="table artist-management">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Transaction Id</th>
                                        <th class="text-center">Album Name</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Coupon Value</th>
                                        <th class="text-center">Total Payment</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Payment Date</th>
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