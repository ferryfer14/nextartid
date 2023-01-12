@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/nominal-fee/edit/1') }}">Nominal Fee</a></li>
        <li class="breadcrumb-item active">{{ 'Edit Fee Convert'}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Fee withdraw %</label>
                    <input class="form-control" type="number" name="fee_withdraw" value="{{ isset($nominal_fee) && ! old('fee_withdraw') ? $nominal_fee->fee_withdraw : old('fee_withdraw') }}" required>
                </div>
                <div class="form-group">
                    <label>Exchange Rate Gap %</label>
                    <input class="form-control" type="number" name="exchange_rate_gap" value="{{ isset($nominal_fee) && ! old('exchange_rate_gap') ? $nominal_fee->exchange_rate_gap : old('exchange_rate_gap') }}" required>
                </div>
                <div class="form-group">
                    <label>Min Convert</label>
                    <input class="form-control" type="number" name="min_convert" value="{{ isset($nominal_fee) && ! old('min_convert') ? $nominal_fee->min_convert : old('min_convert') }}" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection