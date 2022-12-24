@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Create and Manage Album Type</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('backend.album.type.add') }}">Add new album type</a>
            <button type="submit" class="btn btn-primary mt-4 mb-4">Save sort order</button>
            <form method="get" action="">
                <div class="input-group mb-3">
                    <input type="text" name="term" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <a href="{{ route('backend.album.type') }}" class="btn btn-warning" id="button-addon1">Clear Filter</a>
                        <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
                    </div>
                </div>
            </form>
            <form method="post" action="{{ route('backend.album.type.sort.post') }}">
                @csrf
                <table class="mt-4 table table-striped table-sortable">
                    <thead>
                    <tr>
                        <th class="th-handle"></th>
                        <th class="th-priority">Priority</th>
                        <th>Name</th>
                        <th class="th-2action">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($album_type as $index => $type)
                        <tr>
                            <td><i class="handle fas fa-fw fa-arrows-alt"></i></td>
                            <td><input type="hidden" name="typeIds[]" value="{{ $type->id }}"></td>
                            <td><a href="{{ route('backend.album.type.edit', ['id' => $type->id]) }}">{{ $type->name }}</a></td>
                            <td>
                                <a href="{{ route('backend.album.type.edit', ['id' => $type->id]) }}" class="row-button edit"><i class="fas fa-fw fa-edit"></i></a>
                                <a href="{{ route('backend.album.type.delete', ['id' => $type->id]) }}}" onclick="return confirm('Are you sure?')" class="row-button delete"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-4 mb-4">Save sort order</button>
            </form>
            {{ $album_type->appends(request()->input())->links() }}
        </div>
    </div>
@endsection