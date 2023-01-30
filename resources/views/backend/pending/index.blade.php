@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Pending ({{ $pending->total() }})</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form mothod="GET" action="">
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="q" value="{{ $term }}" placeholder="Enter album name or transaction id without prefix NEX">
                    <span class="input-group-append">
			        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
			    </span>
                    <span class="input-group-append">
			        <button class="btn btn-primary"><i class="fa fa-filter"></i></button>
			    </span>
                </div>
            </form>
            <table class="table table-striped datatables table-hover">
                <thead>
                <tr>
                    <th>Transaction Id</th>
                    <th>Album Name</th>
                    <th class="desktop">Amount</th>
                    <th class="desktop">Coupon Value</th>
                    <th class="desktop">Free Song Value</th>
                    <th class="desktop">Total Payment</th>
                    <th>Status</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach ($pending as $index => $pen )
                    @if($pen->transaction_id)
                        <tr>
                            <td>NEX{{ $pen->transaction_id }}</td>
                            <td>{{ isset($pen->albums->title) ? $pen->albums->title : '' }}</td>
                            <td><span>Rp {{ number_format((float)($pen->amount), 0, ',', '.') }}</span></td>
                            <td><span class="text-danger">Rp {{ number_format((float)($pen->nilai_voucher), 0, ',', '.') }}</span></td>
                            <td><span class="text-danger">Rp {{ number_format((float)($pen->nilai_free_song), 0, ',', '.') }}</span></td>
                            <td><span class="text-success">Rp {{ number_format((float)($pen->amount-$pen->nilai_voucher-$pen->nilai_free_song), 0, ',', '.') }}</span></td>
                            <td>
                                <span class="badge badge-danger">Pending</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($pen->created_at)->format('M j, Y') }}</td>
                            <td>
                                <a href="{{ route('backend.pending.edit', ['id' => $pen->transaction_id]) }}" class="row-button edit"><i class="fas fa-fw fa-edit"></i></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
            <div class="pagination pagination-right">
                {{ $pending->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection