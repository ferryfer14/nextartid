@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">User Contract ({{ $user->total() }})</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form mothod="GET" action="">
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="q" value="{{ $term }}" placeholder="Enter name user">
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
                    <th>User Name</th>
                    <th class="desktop">Email</th>
                    <th class="desktop">For NextArt</th>
                    <th class="desktop">For User</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach ($user as $index => $u )
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->charge_admin }}%</td>
                        <td>{{ 100-$u->charge_admin }}%</td>
                        <td>
                            <a href="{{ route('backend.user.contract.edit', ['id' => $u->id]) }}" class="row-button edit"><i class="fas fa-fw fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="pagination pagination-right">
                {{ $user->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection