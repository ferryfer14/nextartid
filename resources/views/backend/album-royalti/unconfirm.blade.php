@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Import Your Unconfirm Royalti</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            @if(isset($unconfirm))
                <div class="alert alert-warning">
                    Last Data :<br/>
                    Title Song : {{ $unconfirm->song->title }}<br/>
                    Email User : {{ $unconfirm->song->users->email }}<br/>
                    Channel : {{ $unconfirm->patner }}<br/>
                    Value : ${{ $unconfirm->value }}<br/>
                    Country : {{ $unconfirm->country }}<br/>
                </div>
            @endif
            <a class="btn btn-danger accept" onclick="return confirm('Are you sure want to delete all unconfirm royalty?')" href="{{ route('backend.album.royalti.unconfirm.delete') }}"><i class="fas fa-fw fa-trash text-white"></i> Delete All Unconfirm</a>
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File Csv</label>
                    <input class="form-control" name="file" type="file" accept=".csv,.xlsx" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Export">
                </div>
            </form>
        </div>
    </div>
@endsection