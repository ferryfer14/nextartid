@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Transaction ({{ $transaction->total() }})</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success mb-2" href="{{ route('backend.transaction.subscribe.paid') }}">Paid</a>
            <a class="btn btn-primary mb-2" href="{{ route('backend.transaction.subscribe.add') }}">Add Subscribe</a>
            
            <form mothod="GET" action="">
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="q" value="{{ $term }}" placeholder="Enter email or transaction id without prefix NEX">
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
                    <th>User Email</th>
                    <th class="desktop">Amount</th>
                    <th class="desktop">Total Payment</th>
                    <th>Status</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach ($transaction as $index => $trx )
                    <tr>
                        <td>NEX{{ $trx->transaction_id }}</td>
                        <td>{{ isset($trx->users->email) ? $trx->users->email : '' }}</td>
                        <td><span>Rp {{ number_format((float)($trx->amount), 0, ',', '.') }}</span></td>
                        <td><span class="text-success">Rp {{ number_format((float)($trx->amount), 0, ',', '.') }}</span></td>
                        <td>
                            <span class="badge badge-danger">Pending</span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($trx->created_at)->format('M j, Y') }}</td>
                        <td>
                            <a href="{{ route('backend.transaction.subscribe.edit', ['id' => $trx->transaction_id]) }}" class="row-button edit"><i class="fas fa-fw fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="pagination pagination-right">
                {{ $transaction->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection