@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin/songs') }}">Songs</a></li>
        @if(Route::currentRouteName() == 'backend.songs.edit')
            <li class="breadcrumb-item active">{!! $song->title !!} - {!! $song->primary_artist !!}</li>
        @endif
        @if(Route::currentRouteName() == 'backend.songs.add')
            <li class="breadcrumb-item active">Add New Song</li>
        @endif
    </ol>
    <div class="row">
        @if(Route::currentRouteName() == 'backend.songs.edit')
            <div class="col-lg-12 media-info mb-3 album">
                <div class="media mb-3">
                    <img class="mr-3" src="{{ $song->artwork_url }}">
                    <div class="media-body">
                        <h5 class="m-0">{!! $song->title !!} - {!! $song->primary_artist !!}</h5>
                        <h5>
                            @if($song->mp3)
                                <span class="badge badge-pill badge-dark">MP3</span>
                            @endif
                            @if($song->hd)
                                <span class="badge badge-pill badge-danger">HD</span>
                            @endif
                            @if($song->hls)
                                <span class="badge badge-pill badge-warning">HLS</span>
                            @endif
                        </h5>
                        <p class="m-0"><a href="{{ $song->permalink_url }}" class="btn btn-warning" target="_blank">Preview @if(! $song->approved) (only Moderator) @endif</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 media-info mb-3 song">
                <iframe width="100%" height="60" frameborder="0" src="{{ asset('share/embed/dark/song/' . $song->id) }}"></iframe>
            </div>
        @endif
        <div class="col-lg-12">
            <form role="form" action="" enctype="multipart/form-data" method="post">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="pill"><i class="fas fa-fw fa-newspaper"></i> Overview</a></li>
                            {{-- Edit by Lindo --}}
                            {{-- <li class="nav-item"><a href="#streamable" class="nav-link" data-toggle="pill"><i class="fas fa-fw fa-lock"></i> Advanced</a></li> --}}
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-2" id="myTabContent">
                            <div id="overview" class="tab-pane fade show active">
                                @csrf
                                <div class="form-group">
                                    <label>Track Name</label>
                                    <input class="form-control" name="title" value="{{ isset($song) && ! old('title') ? $song->title : old('title') }}" required>
                                </div>
                                <div class="form-group multi-artists">
                                    <label>Artist(s)</label>
                                    <select class="form-control multi-selector" data-ajax--url="{{ route('api.search.artist') }}" name="artistIds[]" multiple="" required>
                                        @if(Route::currentRouteName() == 'backend.songs.edit')
                                            <option value="{{ $song->display_artists->id }}" selected="selected" data-artwork="{{ $song->display_artists->artwork_url }}" data-title="{!! $song->display_artists->name !!}">{!! $song->display_artists->name !!}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group select2-artwork">
                                    <label>Album(s)</label>
                                    <select class="form-control select-ajax" data-ajax--url="{{ route('api.search.album') }}" name="albumIds[]">
                                        @if(Route::currentRouteName() == 'backend.songs.edit')
                                            @if($song->album)
                                                <option value="{{ $song->album->id }}" selected="selected" data-artwork="{{ $song->album->artwork_url }}"  data-title="{{ $song->album->title }}">{{ $song->album->title }}</option>
                                            @endif
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Artwork File</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="artwork" class="file-selector" accept="image/*">
                                        <span class="input-group-addon"><i class="fas fa-fw fa-image"></i></span>
                                        <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                        <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button"><i class="fas fa-fw fa-image"></i> Browse</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Audio File</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="file" class="file-selector" accept="audio/*">
                                        <span class="input-group-addon"><i class="fas fa-fw fa-music"></i></span>
                                        <input type="text" class="form-control input-lg" disabled placeholder="Upload Music File">
                                        <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button"><i class="fas fa-fw fa-music"></i> Browse</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Remix or Version:</label>
                                    <input name="remix_version" class="form-control" value="{{ isset($song) && ! old('remix_version') ? $song->remix_version : old('remix_version') }}">
                                </div>
                                <div class="form-group">
                                    <label>Label</label>
                                    <input name="label" class="form-control" value="{{ isset($song) && ! old('label') ? $song->label : old('label') }}" required>
                                </div>
                                <!--<div class="form-group">-->
                                <!--    <label>Display Artist</label>-->
                                <!--    <input name="name" class="form-control" value="{{ isset($song) && ! old('label') ? $song->label : old('label') }}">-->
                                <!--</div>-->
                                <div class="form-group">
                                    <label>Composer:</label>
                                    <input name="composer" class="form-control" value="{{ isset($song) && ! old('composer') ? $song->composer : old('composer') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Arranger:</label>
                                    <input name="arranger" class="form-control" value="{{ isset($song) && ! old('arranger') ? $song->arranger : old('arranger') }}">
                                </div>
                                <div class="form-group">
                                    <label>Lyricist:</label>
                                    <input name="lyricist" class="form-control" value="{{ isset($song) && ! old('lyricist') ? $song->lyricist : old('lyricist') }}">
                                </div>
                                <!--<div class="form-group">-->
                                <!--    <label>Others</label>-->
                                <!--    <input name="name" class="form-control" value="{{ isset($song) && ! old('lyricist') ? $song->lyricist : old('lyricist') }}" required>-->
                                <!--</div>-->
                                <div class="form-group">
                                    <label>Primary Genre:</label>
                                    <select multiple="" class="form-control select2-active" name="genre[]">
                                        @php
                                            $genre = isset($song) && ! old('genre') ? $song->genre : old('genre');
                                            $genre = is_array($genre) ? $genre : explode(',', $genre);
                                        @endphp
                                        {!! genreSelection($genre) !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Secondary Genre:</label>
                                    <select multiple="" class="form-control select2-active" name="genre[]">
                                        {!! genreSelection(explode(',', isset($song) && ! old('second_genre') ? $song->second_genre : old('second_genre'))) !!}
                                    </select>
                                </div>
                                <!--<div class="form-group">-->
                                <!--    <label>Local Genre</label>-->
                                <!--    <select multiple="" class="form-control select2-active" name="genre[]">-->
                                <!--        {!! genreSelection(explode(',', isset($song) && ! old('group_genre') ? $song->group_genre : old('group_genre'))) !!}-->
                                <!--    </select>-->
                                <!--</div>-->
                                <div class="form-group">
                                    <label>Release ISRC code:</label>
                                    <input name="isrc" class="form-control" value="{{ isset($song) && ! old('isrc') ? $song->isrc : old('isrc') }}">
                                </div>
                                <div class="control field">
                                    <label>ISWC code:</label>
                                    <input name="iswc" class="form-control" value="{{ isset($song) && ! old('iswc') ? $song->iswc : old('iswc') }}">
                                </div>
                                <div class="form-group">
                                    <label>(P) Publishing rights:</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input name="publisher_year" class="form-control" value="{{ isset($song) && ! old('publisher_year') ? $song->publisher_year : old('publisher_year') }}" required>
                                        </div>        
                                        <div class="col-md-9">
                                            <input name="publisher_name" class="form-control" value="{{ isset($song) && ! old('publisher_name') ? $song->publisher_name : old('publisher_name') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Lyrics</label>
                                    <textarea rows="10" class="form-control" name="lirik"> {{ (isset($song) && isset($song->lirik)) &&! old('lirik') ? $song->lirik : old('lirik') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Explicit:</label>
                                    <input name="explicit" class="form-control" value="{{ isset($song) && ! old('explicit') ? ($song->explicit == 0 ? 'No' : 'Yes') : old('explicit') }}">
                                </div>
                                <div class="form-group">
                                    <label>Language:</label>
                                    <input name="language" class="form-control" value="{{ isset($song) && ! old('language') ? ($song->language == 1 ? 'Indonesia' : 'English') : old('language') }}">
                                </div>
                                <div class="form-group">
                                    <label>Available separately:</label>
                                    <input name="separately" class="form-control" value="{{ isset($song) && ! old('separately') ? ($song->separately == 0 ? 'No' : 'Yes') : old('separately') }}">
                                </div>
                                <div class="form-group">
                                    <label>Start Point Time (TikTok):</label>
                                    <input name="start_point" class="form-control" value="{{ isset($song) && ! old('start_point') ? $song->start_point : old('start_point') }}">
                                </div>
                                @if(isset($song->bpm))
                                    <div class="form-group">
                                        <label>BPM</label>
                                        <input type="text" class="form-control" name="bpm" value="{{ isset($song) && ! old('bpm') ? $song->bpm : old('bpm') }}">
                                    </div>
                                @endif
                                <!--<div class="form-group">-->
                                <!--    <div class="col-sm-12">-->
                                <!--        <label class="switch">-->
                                <!--            {!! makeCheckBox('selling', isset($song) && ! old('selling') ? $song->selling : old('selling')) !!}-->
                                <!--            <span class="slider round"></span>-->
                                <!--        </label>-->
                                <!--        <label class="pl-6 col-form-label">Allow to sell this song</label>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--<div class="form-group">-->
                                <!--    <label>Price</label>-->
                                <!--    <input type="text" class="form-control" name="price" value="{{ isset($song) && ! old('price') ? $song->price : old('price') }}">-->
                                <!--</div>-->
                                <!--<div class="form-group">-->
                                <!--    <div class="col-sm-12">-->
                                <!--        <label class="switch">-->
                                <!--            {!! makeCheckBox('allow_comments', isset($song) && ! old('allow_comments') ? $song->allow_comments : old('allow_comments') ) !!}-->
                                <!--            <span class="slider round"></span>-->
                                <!--        </label>-->
                                <!--        <label class="pl-6 col-form-label">Allow to comment</label>-->
                                <!--    </div>-->
                                <!--</div>-->
                                @if(Route::currentRouteName() == 'backend.songs.edit')
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="switch">
                                                {!! makeCheckBox('approved', isset($song) && ! old('approved') ? $song->approved : old('approved')) !!}
                                                <span class="slider round"></span>
                                            </label>
                                            <label class="pl-6 col-form-label">Approve this song</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if(Route::currentRouteName() == 'backend.songs.edit')
                            <input type="hidden" name="file_id" value="{{ $song->file_id }}">
                            <button type="submit" class="btn btn-primary">Save</button>
                        @endif
                        @if(Route::currentRouteName() == 'backend.songs.add')
                            <button type="submit" class="btn btn-primary">Submit</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        @if(Route::currentRouteName() == 'backend.songs.edit')
            <div class="col-lg-12">
                <div class="mt-5 collapse" id="collapseExample">
                    <form role="form" method="post" action="{{ route('backend.songs.edit.reject.post', ['id' => $song->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Comment</label>
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Reject & Send Email to the artist</button>
                    </form>
                </div>

            </div>
        @endif
    </div>
@endsection