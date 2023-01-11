@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.user.royalti') }}">User Royalti</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.user.royalti.album', ['id' => $artistIds]) }}">Albums Royalti</a></li>
        <li class="breadcrumb-item active">Songs Royalti</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form mothod="GET" action="">
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="q" value="{{ $term }}" placeholder="Enter Title Song">
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
                        <th class="th-image"></th>
                        <th>title</th>
                        <th class="desktop">ISRC</th>
                        <th class="desktop">Display Artist</th>
                        <th class="text-center">Royalti</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($songs as $index => $song)
                        <tr>
                            <td class="td-image"><div class="play" data-id="{{ $song->id }}" data-type="user"><img src="{{ $song->artwork_url }}"/></div></td>
                            <td>{{ $song->title }}</td>
                            <td class="desktop">{{ $song->isrc }}</td>
                            <td class="desktop">{{ $song->primary_artist }}</td>
                            <td class="text-center desktop">${{ isset($song->sum_royalti) ? round($song->sum_royalti,3) : '0' }}</td>
                            <td class="desktop">
                                <a class="row-button songs" href="{{ route('backend.user.royalti.song.detail', ['id' => $song->id, 'album_id' => $album_id, 'artist_id' => $artistIds]) }}"><i class="fas fa-fw fa-music"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination pagination-right">
                {{ $songs->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection