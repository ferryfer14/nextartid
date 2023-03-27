@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/transaction-subscribe') }}">Transaction Subscribe Manual</a></li>
        <li class="breadcrumb-item active">{{ isset($transaction) ? 'NEX'.$transaction->transaction_id : 'Add new transaction subscribe'}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Transaction Id</label>
                    <input class="form-control" readonly type="text" name="transaction_id" value="{{ isset($transaction) && ! old('transaction_id') ? $transaction->transaction_id : old('transaction_id') }}" required>
                </div>
                <div class="form-group">
                    <label>Nominal</label>
                    <input class="form-control" type="number" name="amount" placeholder="{{ isset($transaction) && ! old('amount') ? $transaction->amount : old('amount') }}" required>
                </div>
                <div class="form-group">
                    <label>Note</label>
                    <textarea class="form-control" name="note" placeholder="Notes"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection