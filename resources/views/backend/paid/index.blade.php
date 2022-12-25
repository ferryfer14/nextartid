@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Paid ({{ $paid->total() }})</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 border-0">
                    <button class="btn btn-link p-0 m-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h6 class="m-0 font-weight-bold text-primary">Advanced search</h6>
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="accordion" id="collapseMetaTags">
                        <div id="collapseOne" class="collapse p-4" aria-labelledby="headingOne" data-parent="#collapseMetaTags">
                            <form class="search-form" action="{{ route('backend.paid') }}">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keyword</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="term" class="form-control" placeholder="Enter album name or transaction id without prefix NXA" value="{{ request()->input('term') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Date of the creation</label>
                                    <div class="col-sm-10">
                                        <div class="form-inline">
                                            <div class="input-group mr-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">From</div>
                                                </div>
                                                <input type="text" class="form-control datepicker" name="created_from" value="{{ request()->input('created_from') }}" autocomplete="off">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Until</div>
                                                </div>
                                                <input type="text" class="form-control datepicker" name="created_until" value="{{ request()->input('created_until') }}" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Find</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="{{ route('backend.songs') }}" class="btn btn-secondary">Clear</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped datatables table-hover">
                <thead>
                <tr>
                    <th>Transaction Id</th>
                    <th>Album Name</th>
                    <th class="desktop">Amount</th>
                    <th class="desktop">Coupon Value</th>
                    <th class="desktop">Total Payment</th>
                    <th>Status</th>
                    <th width="150">Payment Date</th>
                </tr>
                </thead>
                @foreach ($paid as $index => $pen )
                    @if($pen->transaction_id)
                        <tr>
                            <td>NXA{{ $pen->transaction_id }}</td>
                            <td>{{ isset($pen->albums->title) ? $pen->albums->title : '' }}</td>
                            <td><span>Rp {{ number_format((float)($pen->amount), 0, ',', '.') }}</span></td>
                            <td><span class="text-danger">Rp {{ number_format((float)($pen->nilai_voucher), 0, ',', '.') }}</span></td>
                            <td><span class="text-success">Rp {{ number_format((float)($pen->amount-$pen->nilai_voucher), 0, ',', '.') }}</span></td>
                            <td>
                                <span class="badge badge-success">Paid</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($pen->updated_at)->format('M j, Y') }}</td>
                        </tr>
                    @endif
                @endforeach
            </table>
            <div class="pagination pagination-right">
                {{ $paid->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection