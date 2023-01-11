@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/pricing/edit/1') }}">Song Price</a></li>
        <li class="breadcrumb-item active">{{ 'Edit song price'}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Harga</label>
                    <input class="form-control" type="number" name="harga" value="{{ isset($pricing) && ! old('harga') ? $pricing->harga : old('harga') }}" required>
                </div>
                <div class="form-group">
                    <label>Harga Discount</label>
                    <input class="form-control" type="number" name="harga_discount" value="{{ isset($pricing) && ! old('harga discount') ? $pricing->harga_discount : old('harga discount') }}" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection