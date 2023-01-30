@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.user.royalti') }}">User Royalti</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.user.royalti.album', ['id' => $artistIds]) }}">Albums Royalti</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.user.royalti.album', ['id' => $album_id, 'artist_id' => $artistIds]) }}">Song Royalti</a></li>
        <li class="breadcrumb-item active">Songs Detail Royalti</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form mothod="GET" action="">
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="q" value="{{ $term }}" placeholder="Enter Patner Name">
                    <span class="input-group-append">
			        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
			    </span>
                    <span class="input-group-append">
			        <button class="btn btn-primary"><i class="fa fa-filter"></i></button>
			    </span>
                </div>
            </form>
            <table class="table table-striped datatables table-hover">
                <thead>
                    <tr>
                        <th>Patner</th>
                        <th class="text-center">Royalti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($royaltis as $index => $royalti)
                        <tr>
                            <td>{{ $royalti->patner }}</td>
                            <td class="text-center desktop">${{ isset($royalti->value) ? round($royalti->value,2) : '0' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination pagination-right">
                {{ $royaltis->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection