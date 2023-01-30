@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">NPWP User's ({{ $user->total() }})</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 border-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-link p-0 m-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h6 class="m-0 font-weight-bold text-primary">Advanced search</h6>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="accordion" id="collapseMetaTags">
                        <div id="collapseOne" class="collapse p-4" aria-labelledby="headingOne" data-parent="#collapseMetaTags">
                            <form class="search-form" action="{{ route('backend.user.npwp') }}">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keyword</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="term" class="form-control" placeholder="Enter album name or transaction id without prefix NEX" value="{{ request()->input('term') }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Find</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="{{ route('backend.user.npwp') }}" class="btn btn-secondary">Clear</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped datatables table-hover">
                <thead>
                <tr>
                    <th>User Name</th>
                    <th class="desktop">Email</th>
                    <th class="desktop">NPWP Variant</th>
                    <th class="desktop">NPWP Number</th>
                    <th class="">NPWP Card</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach ($user as $index => $u )
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->variant_npwp == 1 ? 'Individual' : 'Organization' }}</td>
                        <td>{{ $u->npwp }}</td>
                        <td class="td-image">
                            <div class="play" data-id="{{ $u->id }}" data-type="user">
                                <img src="{{ $u->artwork_npwp_url }}" width="150" height="150"/>
                            </div>
                        </td>
                        <td>
                            @if($u->status_npwp == 2)
                                <span class="badge badge-warning">Need Approval</span>
                            @else
                                <span class="badge badge-success">Success</span>
                            @endif
                        </td>
                        <td class="desktop">
                            <a class="row-button accept" onclick="return confirm('Are you sure want to approve this request?')" href="{{ route('backend.user.npwp.accept', ['id' => $u->id]) }}"><i class="fas fa-fw fa-check text-success"></i></a>
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