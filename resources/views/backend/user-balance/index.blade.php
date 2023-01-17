@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">User Balance</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form mothod="GET" action="">
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="q" value="{{ $term }}" placeholder="Enter user name or email">
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
                        <th>Name</th>
                        <th class="desktop">Email</th>
                        <th class="desktop">Joined</th>
                        <th class="desktop">Last visited</th>
                        <th>Balance Idr</th>
                        <th>Balance Confirm</th>
                        <th>Balance Unconfirm</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr @if(isset($user->group) && isset($user->group->role) &&  ($user->group->role->id == 1 && auth()->user()->group->role->id != 1)) class="overlay-permission" @endif @if($user->ban) class="overlay-banned" @endif>
                            <td class="td-image"><div class="play" data-id="{{ $user->id }}" data-type="user"><img src="{{ $user->artwork_url }}"/></div></td>
                            <td>{{ $user->name }}</td>
                            <td class="desktop"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            <td class="desktop">{{ timeElapsedString($user->created_at) }}</td>
                            @if($user->last_activity)
                                <td class="desktop">
                                    {{ timeElapsedString($user->last_activity) }}
                                </td>
                            @else
                                <td class="desktop">Unknown</td>
                            @endif
                            <td class="text-center desktop">{{ isset($user->artist->balance_idr) ? 'Rp '.number_format((float)($artist->balance_idr), 0, ',', '.') : '0' }}</td>
                            <td class="text-center desktop">${{ isset($user->artist->balance_confirm) ? (round($user->artist->balance_confirm,3)) : '0' }}</td>
                            <td class="text-center desktop">${{ isset($user->artist->balance_unconfirm) ? (round($user->artist->balance_unconfirm,3)) : '0' }}</td>
                            <td class="desktop">
                                <a class="row-button detail" href="{{ route('backend.user.balance.detail', ['id' => $user->id]) }}"><i class="fas fa-fw fa-list"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination pagination-right">
                {{ $users->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection