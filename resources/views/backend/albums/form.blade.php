@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('backend.albums') }}">Albums</a></li>
        <li class="breadcrumb-item active">
            @if(isset($album))
                <a href="{{ route('backend.albums.edit', ['id' => $album->id]) }}">{!! $album->title !!}</a> - {{ $album->primary_artist }}
            @else
                Add New Album
            @endif
        </li>
    </ol>
    <div class="row">
        @if(isset($album))
            <div class="col-lg-12 media-info mb-3 album">
                <div class="media mb-3">
                    <img class="mr-3" src="{{ $album->artwork_url }}">
                    <div class="media-body">
                        <h5 class="m-0">{!! $album->title !!} - {{ $album->primary_artist }}</h5>
                        <p>Songs: {{ $album->song_count }}</p>
                        <p class="m-0"><a href="{{ $album->permalink_url }}" class="btn btn-warning" target="_blank">Preview @if(! $album->approved) (only Moderator) @endif</a> <a href="{{ route('backend.albums.tracklist', ['id' => $album->id]) }}" class="btn btn-info">Tracks List</a> <a href="{{ route('backend.albums.upload', ['id' => $album->id]) }}" class="btn btn-success">Upload</a></p>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-lg-12">
            <form role="form" action="" enctype="multipart/form-data" method="post">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="pill"><i class="fas fa-fw fa-newspaper"></i> Overview</a></li>
                            <li class="nav-item"><a href="#streamable" class="nav-link" data-toggle="pill"><i class="fas fa-fw fa-lock"></i> Advanced</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-2" id="myTabContent">
                            @csrf
                            <div class="form-group multi-artists">
                                <label>Artists</label>
                                <select class="form-control multi-selector" data-ajax--url="{{ route('api.search.artist') }}" name="artistIds[]" multiple="">
                                    @if(isset($album))
                                        @foreach ($album->artists as $index => $artist)
                                            <option value="{{ $artist->id }}" selected="selected" data-artwork="{{ $artist->artwork_url }}" data-title="{!! $artist->name !!}">{!! $artist->name !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Album Name</label>
                                <input name="title" class="form-control" value="{{ isset($album) && ! old('title') ? $album->title : old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Artwork</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" name="artwork" class="file-selector" accept="image/*">
                                    <span class="input-group-addon"><i class="fas fa-fw fa-image"></i></span>
                                    <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                    <span class="input-group-btn"><button class="browse btn btn-primary input-lg" type="button"><i class="fas fa-fw fa-file"></i> Browse</button></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="switch">
                                        {!! makeCheckBox('update-song-artwork') !!}
                                        <span class="slider round"></span>
                                    </label>
                                    <label class="pl-6 col-form-label">Also update artwork for all songs in this album</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Remix or Version:</label>
                                <input name="remix_version" class="form-control" value="{{ isset($album) && ! old('remix_version') ? $album->remix_version : old('remix_version') }}">
                            </div>
                            <div class="form-group">
                                <label>Label</label>
                                <input name="label" class="form-control" value="{{ isset($album) && ! old('label') ? $album->label : old('label') }}" required>
                            </div>
                            <!--<div class="form-group">-->
                            <!--    <label>Display Artist</label>-->
                            <!--    <input name="name" class="form-control" value="{{ isset($album) && ! old('label') ? $album->label : old('label') }}">-->
                            <!--</div>-->
                            <div class="form-group">
                                <label>Composer:</label>
                                <input name="composer" class="form-control" value="{{ isset($album) && ! old('composer') ? $album->composer : old('composer') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Arranger:</label>
                                <input name="arranger" class="form-control" value="{{ isset($album) && ! old('arranger') ? $album->arranger : old('arranger') }}">
                            </div>
                            <div class="form-group">
                                <label>Lyricist:</label>
                                <input name="lyricist" class="form-control" value="{{ isset($album) && ! old('lyricist') ? $album->lyricist : old('lyricist') }}">
                            </div>
                            <!--<div class="form-group">-->
                            <!--    <label>Others</label>-->
                            <!--    <input name="name" class="form-control" value="{{ isset($album) && ! old('lyricist') ? $album->lyricist : old('lyricist') }}" required>-->
                            <!--</div>-->
                            <div class="form-group">
                                <label>Primary Genre:</label>
                                <select multiple="" class="form-control select2-active" name="genre[]">
                                    @php
                                        $genre = isset($album) && ! old('genre') ? $album->genre : old('genre');
                                        $genre = is_array($genre) ? $genre : explode(',', $genre);
                                    @endphp
                                    {!! genreSelection($genre) !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Secondary Genre:</label>
                                <select multiple="" class="form-control select2-active" name="genre[]">
                                    {!! genreSelection(explode(',', isset($album) && ! old('second_genre') ? $album->second_genre : old('second_genre'))) !!}
                                </select>
                            </div>
                            <!--<div class="form-group">-->
                            <!--    <label>Local Genre</label>-->
                            <!--    <select multiple="" class="form-control select2-active" name="genre[]">-->
                            <!--        {!! genreSelection(explode(',', isset($album) && ! old('group_genre') ? $album->group_genre : old('group_genre'))) !!}-->
                            <!--    </select>-->
                            <!--</div>-->
                            <div class="form-group">
                                <label>Language:</label>
                                <input name="language" class="form-control" value="{{ isset($album) && ! old('language') ? ($album->language == 1 ? 'Indonesia' : 'English') : old('language') }}">
                            </div>
                            <div class="form-group">
                                <label>Release UPC code:</label>
                                <input name="upc" class="form-control" value="{{ isset($album) && ! old('upc') ? $album->upc : old('upc') }}">
                            </div>
                            <div class="control field">
                                <label>Global Release Identifier (GRid):</label>
                                <input name="grid_code" class="form-control" value="{{ isset($album) && ! old('grid') ? $album->grid : old('grid') }}">
                            </div>
                            <div class="form-group">
                                <label>Release description:</label>
                                <input name="description" class="form-control" value="{{ isset($album) && ! old('description') ? $album->description : old('description') }}">
                            </div>
                            <div class="form-group">
                                <label>Original release date:</label>
                                <input type="text" class="form-control datepicker" name="released_at" value="{{ isset($album) && ! old('released_at') ? \Carbon\Carbon::parse($album->released_at)->format('m/d/Y') : old('released_at') }}" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label>Schedule publish date:</label>
                                <input type="text" class="form-control datepicker" name="created_at" value="{{ isset($album) && ! old('created_at') ? \Carbon\Carbon::parse($album->created_at)->format('m/d/Y') : old('created_at') }}" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label>License Holder:</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input name="license_year" class="form-control" value="{{ isset($album) && ! old('license_year') ? $album->license_year : old('license_year') }}" required>
                                    </div>        
                                    <div class="col-md-9">
                                        <input name="license_name" class="form-control" value="{{ isset($album) && ! old('license_name') ? $album->license_name : old('license_name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>(P) copyright for sound recordings:</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input name="recording_year" class="form-control" value="{{ isset($album) && ! old('recording_year') ? $album->recording_year : old('recording_year') }}" required>
                                    </div>        
                                    <div class="col-md-9">
                                        <input name="recording_name" class="form-control" value="{{ isset($album) && ! old('recording_name') ? $album->recording_name : old('recording_name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="switch">
                                        {!! makeCheckBox('approved', isset($album) && ! old('approved') ? $album->approved : old('approved')) !!}
                                        <span class="slider round"></span>
                                    </label>
                                    <label class="pl-6 col-form-label">Approve this album</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <!--@if(isset($album) && ! $album->approved)-->
                        <!--    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Reject</button>-->
                        <!--@endif-->
                        <!--@if(Route::currentRouteName() == 'backend.albums.edit')-->
                        <!--    <input type="hidden" name="file_id" value="{{ $album->file_id }}">-->
                        <!--    @if(! $album->approved)-->
                        <!--        <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Reject</button>-->
                        <!--    @endif-->
                        <!--    <button type="reset" class="btn btn-secondary">Reset</button>-->
                        <!--    <a class="btn btn-danger"  href="{{ route('backend.songs.delete', ['id' => $album->id]) }}" onclick="return confirm('Are you sure want to delete this song?')" data-toggle="tooltip" data-placement="left" title="Delete this song"><i class="fas fa-fw fa-trash"></i></a>-->
                        <!--@endif-->
                        <!--@if(Route::currentRouteName() == 'backend.albums.add')-->
                        <!--    <button type="submit" class="btn btn-primary">Submit</button>-->
                        <!--@endif-->
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection