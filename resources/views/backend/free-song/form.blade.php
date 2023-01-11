@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/free-song') }}">Free Song</a></li>
        <li class="breadcrumb-item active">{{ isset($free_song) ? $free_song->name : 'Add New Free Song'}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ isset($free_song) && ! old('name') ? $free_song->name : old('name') }}" required>
                </div>
                <div class="form-group">
                    <label>Min Track</label>
                    <input class="form-control" type="number" name="min" value="{{ isset($free_song) && ! old('min') ? $free_song->min : old('min') }}" required>
                </div>
                <div class="form-group">
                    <label>Free Track</label>
                    <input class="form-control" type="number" name="free" value="{{ isset($free_song) && ! old('free') ? $free_song->free : old('free') }}" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection