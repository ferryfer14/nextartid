@foreach ($albums as $index => $album)
    <tr>
        <td class="td-image">
            <div class="play" data-id="{{ $album->id }}" data-type="album">
                <img src="{{ $album->artwork_url }}"/>
            </div>
        </td>
        <td><a href="{{ route('backend.albums.edit', ['id' => $album->id]) }}">{!! $album->title !!}</a></td>
        <td id="album_{{ $album->id }}" type="upc" class="editable" title="Click to edit">{!! $album->upc !!}</td>
        <!--<td class="desktop">{{ $album->upc }}</td>-->
        <td>{{ $album->primary_artist }}</td>
        <td>
            @if(isset($album->user) && $album->user->artist)
                <a href="{{ route('backend.users.edit', ['id' => $album->user->id]) }}">{{ $album->user->email }}</a>
            @else
                <span class="text-muted font-weight-light font-italic">System</span>
            @endif
        </td>
        <!--<td class="desktop">@foreach($album->genres as $genre)<a href="{{ route('backend.genres.edit', ['id' => $genre->id]) }}" title="{{ $genre->name }}">{{$genre->name}}</a>@if(!$loop->last), @endif @endforeach</td>-->
        <!--<td class="desktop">@foreach($album->moods as $mood)<a href="{{ route('backend.moods.edit', ['id' => $mood->id]) }}" title="{{ $mood->name }}">{{$mood->name}}</a>@if(!$loop->last), @endif @endforeach</td>-->
        <td class="desktop">
            @if($album->approved)
                <span class="badge badge-pill badge-success">Yes</span>
            @else
                <span class="badge badge-pill badge-danger">No</span>
            @endif
        </td>
        <td class="desktop text-center">{{ $album->song_count }}</td>
        <!--<td class="desktop text-center">{{ $album->comment_count }}</td>-->
        <td>
            <a class="row-button accept {{$album->takedown == 0 ? "hide" : "" }}"  onclick="return confirm('Are you sure want to accept this album?');" href="{{ route('backend.albums.accept', ['id' => $album->id]) }}"><i class="fas fa-fw fa-check"></i></a>
            <a class="row-button takedown"  onclick="return confirm('Are you sure want to takedown this album?');" href="{{ route('backend.albums.takedown', ['id' => $album->id]) }}"><i class="fas fa-fw fa-times"></i></a>
            <a class="row-button export" href="{{ route('backend.albums.export.csv', ['id' => $album->id]) }}"><i class="fas fa-fw fa-file-csv"></i></a>
            <!--<a class="row-button edit" href="{{ route('backend.albums.edit', ['id' => $album->id]) }}"><i class="fas fa-fw fa-edit"></i></a>-->
            <a class="row-button upload" href="{{ route('backend.albums.upload', ['id' => $album->id]) }}"><i class="fas fa-fw fa-upload"></i></a>
            <a class="row-button login-user" href="{{ route('backend.albums.login.user', ['id' => $album->id]) }}"><i class="fas fa-fw fa-sign-in-alt"></i></a>
            <a class="row-button delete" onclick="return confirm('Are you sure want to delete this album?');" href="{{ route('backend.albums.delete', ['id' => $album->id]) }}"><i class="fas fa-fw fa-trash"></i></a>
        </td>
        <!--<td>
            <label class="engine-checkbox">
                <input name="ids[]" class="multi-check-box" type="checkbox" value="{{ $album->id }}">
                <span class="checkmark"></span>
            </label>
        </td>-->
    </tr>
@endforeach