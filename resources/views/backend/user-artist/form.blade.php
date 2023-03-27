@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/user-artist') }}">User Artist</a></li>
        <li class="breadcrumb-item active">Edit User Artist {{$user->email}}</li>
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
                    <label>Affiliation</label>
                    <select class="form-control" name="affiliation" required>
                        <option value="Artist/Band Member" {{ isset($user) ? ($user->affiliation == "Artist/Band Member" ? "selected" : "") : "" }}>Artist/Band Member</option>
                        <option value="Producer" {{ isset($user) ? ($user->affiliation == "Producer" ? "selected" : "") : "" }}>Producer</option>
                        <option value="Subscribe" {{ isset($user) ? ($user->affiliation == "Subscribe" ? "selected" : "") : "" }} hidden>Subscribe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Max Artist</label>
                    <input class="form-control" type="number" name="max_artist" value="{{ isset($user) && ! old('max_artist') ? $user->max_artist : old('max_artist') }}" required>
                </div>
                <div class="form-group">
                    <label>Payment Album</label>
                    <select class="form-control" name="album_pay" required>
                        <option value="0" {{ isset($user) ? ($user->album_pay == "0" ? "selected" : "") : "" }}>Tetep Bayar</option>
                        <option value="1" {{ isset($user) ? ($user->album_pay == "1" ? "selected" : "") : "" }}>Gratis</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection