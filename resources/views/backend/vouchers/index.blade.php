@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Vouchers</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 py-3 border-left-info">
                <div class="card-body">
                    Create and edit vouchers code
                </div>
            </div>
            <a href="{{ route('backend.vouchers.add') }}" class="btn btn-primary">Add new voucher</a>
            <table class="mt-4 table table-striped">
                <thead>
                <tr>
                    <th class="th-wide-image"></th>
                    <th>Code</th>
                    <th class="desktop">Spesific User</th>
                    <th class="desktop">Type</th>
                    <th class="desktop">Discount amount</th>
                    <th class="desktop">Used</th>
                    <th class="desktop">Expired at</th>
                    <th class="desktop">Created at</th>
                    <th class="desktop">Is active</th>
                    <th class="th-3action">Action</th>
                </tr>
                </thead>
                @foreach ($vouchers as $index => $voucher)
                    <tr><td><img src="{{ $voucher->artwork_url }}"></td>
                        <td><a href="{{ route('backend.vouchers.edit', ['id' => $voucher->id]) }}">{{ $voucher->code }}</a></td>
                        <td class="desktop">
                            @if($voucher->user != null)
                                @foreach (\App\Models\User::whereIn('id', explode(",", $voucher->user))->get() as $index => $user)
                                    {{ $user->name }}@if(!$loop->last), @endif
                                @endforeach 
                            @endif
                        </td>
                        <td class="desktop">{{ $voucher->type }}</td>
                        <td class="desktop">{{ $voucher->amount }}</td>
                        <td class="desktop">{{ $voucher->use_count }}</td>
                        <td class="desktop">
                            @if($voucher->expired_at)
                                {{ $voucher->expired_at }}
                            @else
                                <span class="badge badge-info badge-pill">never</span>
                            @endif
                        </td>
                        <td class="desktop">{{ timeElapsedString($voucher->created_at) }}</td>
                        <td class="desktop">
                            @if($voucher->approved)
                                <span class="badge badge-success badge-pill">active</span>
                            @else
                                <span class="badge badge-danger badge-pill">in-active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('backend.vouchers.edit', ['id' => $voucher->id]) }}" class="row-button edit"><i class="fas fa-fw fa-edit"></i></a>
                            <a href="{{ route('backend.vouchers.delete', ['id' => $voucher->id]) }}" class="row-button delete" onclick="return confirm('Are you sure to delete this page page?')"><i class="fas fa-fw fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection