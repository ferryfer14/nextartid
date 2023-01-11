@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/album-type') }}">Album Type</a></li>
        <li class="breadcrumb-item active">{{ isset($album_type) ? $album_type->name : 'Add New Album Type'}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ isset($album_type) && ! old('name') ? $album_type->name : old('name') }}" required>
                </div>
                <div class="form-group">
                    <label>Min Track</label>
                    <input class="form-control" type="number" name="min" value="{{ isset($album_type) && ! old('min') ? $album_type->min : old('min') }}" required>
                </div>
                <div class="form-group">
                    <label>Max Track</label>
                    <input class="form-control" type="number" name="max" value="{{ isset($album_type) && ! old('max') ? $album_type->max : old('max') }}" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection