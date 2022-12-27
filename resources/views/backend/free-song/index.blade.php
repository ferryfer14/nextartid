@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Create and Manage Free Song</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('backend.free.song.add') }}">Add new free song</a>
            <button type="submit" class="btn btn-primary mt-4 mb-4">Save sort order</button>
            <form method="get" action="">
                <div class="input-group mb-3">
                    <input type="text" name="term" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <a href="{{ route('backend.free.song') }}" class="btn btn-warning" id="button-addon1">Clear Filter</a>
                        <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
                    </div>
                </div>
            </form>
            <form method="post" action="{{ route('backend.free.song.sort.post') }}">
                @csrf
                <table class="mt-4 table table-striped table-sortable">
                    <thead>
                    <tr>
                        <th class="th-handle"></th>
                        <th class="th-priority">Priority</th>
                        <th>Name</th>
                        <th>Min Song</th>
                        <th>Free</th>
                        <th class="th-2action">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($free_song as $index => $free)
                        <tr>
                            <td><i class="handle fas fa-fw fa-arrows-alt"></i></td>
                            <td><input type="hidden" name="freeIds[]" value="{{ $free->id }}"></td>
                            <td><a href="{{ route('backend.free.song.edit', ['id' => $free->id]) }}">{{ $free->name }}</a></td>
                            <td>{{ $free->min }}</a></td>
                            <td>{{ $free->free }}</a></td>
                            <td>
                                <a href="{{ route('backend.free.song.edit', ['id' => $free->id]) }}" class="row-button edit"><i class="fas fa-fw fa-edit"></i></a>
                                <a href="{{ route('backend.free.song.delete', ['id' => $free->id]) }}}" onclick="return confirm('Are you sure?')" class="row-button delete"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-4 mb-4">Save sort order</button>
            </form>
            {{ $free_song->appends(request()->input())->links() }}
        </div>
    </div>
@endsection