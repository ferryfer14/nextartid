@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/patners') }}">Patner</a></li>
        <li class="breadcrumb-item active">{{ isset($patner) ? $patner->name : 'Add new patner'}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ isset($patner) && ! old('name') ? $patner->name : old('name') }}" required>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="switch">
                            {!! makeCheckBox('discover', isset($patner) && ! old('discover') ? $patner->discover : old('discover')) !!}
                            <span class="slider round"></span>
                        </label>
                        <label class="pl-6 col-form-label">Show on list order page</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection