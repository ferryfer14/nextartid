@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/config-point/edit/1') }}">Song Price</a></li>
        <li class="breadcrumb-item active">{{ 'Edit song price'}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Point</label>
                            <input class="form-control" type="number" name="point" value="{{ isset($point) && ! old('point') ? $point->point : old('point') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-2 d-flex justify-content-center">
                        <label>To</label>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Idr</label>
                            <input class="form-control" type="number" name="idr" value="{{ isset($point) && ! old('idr') ? $point->idr : old('idr') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Idr</label>
                            <input class="form-control" type="number" name="cal_idr" value="{{ isset($point) && ! old('cal_idr') ? $point->cal_idr : old('cal_idr') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-2 d-flex justify-content-center">
                        <label>Get</label>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Point</label>
                            <input class="form-control" type="number" readonly value="1" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection