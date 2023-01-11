@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Import Your Songs</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ URL::to('/storage/template_song.csv') }}">Download Template</a>
        </div>
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File Csv</label>
                    <input class="form-control" name="file" type="file" accept=".csv" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Export">
                </div>
            </form>
        </div>
    </div>
@endsection