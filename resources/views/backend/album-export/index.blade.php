@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Export Your Album</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Date Start</label>
                    <input class="form-control datepicker" name="start" type="text" placeholder="Date Start" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Date Finish</label>
                    <input class="form-control datepicker" name="finish" type="text" placeholder="Date Finish" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Export">
                </div>
            </form>
        </div>
    </div>
@endsection