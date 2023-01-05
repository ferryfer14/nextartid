@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.user.balance') }}">User Balance</a></li>
        <li class="breadcrumb-item active">Detail Balance</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form mothod="GET" action="">
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="q" value="{{ $term }}" placeholder="Enter user name or email">
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
                        <th>Detail</th>
                        <th class="text-center">Value</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($balances as $index => $balance)
                        <tr>
                            <td>{{ $balance->jenis }}</td>
                            <td class="text-center desktop">
                                @if($balance->value > 0)
                                    <span class="text-success">${{ number_format((float)$balance->value,6) }}</span>
                                @else
                                    <span class="text-danger">{{ str_replace('-','-$',number_format((float)$balance->value,6)) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($balance->status == 1)
                                    <span class="badge badge-warning">Pending</span>
                                @else
                                    <span class="badge badge-success">Success</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($balance->created_at)->format('M j, Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination pagination-right">
                {{ $balances->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection