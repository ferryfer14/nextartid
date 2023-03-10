@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Log Email</li>
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
                            <form class="search-form" action="{{ route('backend.log.email') }}">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keyword</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="term" class="form-control" placeholder="Enter email" value="{{ request()->input('term') }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Find</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="{{ route('backend.log.email') }}" class="btn btn-secondary">Clear</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped datatables table-hover">
                <thead>
                <tr>
                    <th>Email</th>
                    <th class="desktop">Message</th>
                    <th class="desktop">Date</th>
                </tr>
                </thead>
                @foreach ($log as $index => $l )
                    <tr>
                        <td>{{ $l->email }}</td>
                        <td>{{ $l->message }}</td>
                        <td>{{ \Carbon\Carbon::parse($l->created_at)->format('M j, Y') }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="pagination pagination-right">
                {{ $log->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection