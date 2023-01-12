@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/user-contract') }}">User Contract</a></li>
        <li class="breadcrumb-item active">Edit User Contract {{$user->email}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" readonly type="text" name="email" value="{{ isset($user) && ! old('email') ? $user->email : old('email') }}" required>
                </div>
                <div class="form-group">
                    <label>For Admin</label>
                    <input class="form-control" type="number" name="charge_admin" placeholder="{{ isset($user) && ! old('charge_admin') ? $user->charge_admin : old('charge_admin') }}" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection