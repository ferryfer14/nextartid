@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Import Your Royalti</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            @if(isset($file_royalti))
                <div class="alert alert-warning">
                    Last Name File : {{ $file_royalti->nama_file }}<br/>
                    Note : {{ $file_royalti->note }}
                </div>
            @endif
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File Csv</label>
                    <input class="form-control" name="file" type="file" accept=".csv,.xlsx" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Note</label>
                    <textarea class="form-control" name="note" placeholder="Notes"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Export">
                </div>
            </form>
        </div>
    </div>
@endsection