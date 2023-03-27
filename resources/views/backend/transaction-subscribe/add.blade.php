@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/transaction-subscribe') }}">Transaction Subscribe</a></li>
        <li class="breadcrumb-item active">{{ 'Add Transaction Subscribe'}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>User</label>
                    <div class="col-xs-12">
                        <select class="form-control multi-selector-without-sortable" data-ajax--url="{{ route('api.search.email') }}" name="email" required>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input class="form-control" type="number" value="{{ old('amount')}}" name="amount" required>
                </div>
                <div class="form-group">
                    <label>Max Artist</label>
                    <input class="form-control" type="number" name="max_artist" value="{{ old('max_artist')}}" required>
                </div>
                <div class="form-group">
                    <label>Payment Album</label>
                    <select class="form-control" name="album_pay" required>
                        <option value="0">Tetep Bayar</option>
                        <option value="1">Gratis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Batas Waktu (1-12) bulanan</label>
                    <input class="form-control" type="number" value="{{ old('month')}}" name="month" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection