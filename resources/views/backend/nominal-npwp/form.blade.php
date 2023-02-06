@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/nominal-npwp/edit/1') }}">Nominal NPWP</a></li>
        <li class="breadcrumb-item active">{{ 'Edit NPWP price'}}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Without Npwp %</label>
                    <input class="form-control" type="number" name="without_npwp" value="{{ isset($nominal_npwp) && ! old('without_npwp') ? $nominal_npwp->without_npwp : old('without_npwp') }}" required>
                </div>
                <div class="form-group">
                    <label>Individual %</label>
                    <input class="form-control" type="number" name="individual" value="{{ isset($nominal_npwp) && ! old('individual') ? $nominal_npwp->individual : old('individual') }}" required>
                </div>
                <div class="form-group">
                    <label>Organization %</label>
                    <input class="form-control" type="number" step='any' name="organization" value="{{ isset($nominal_npwp) && ! old('organization') ? $nominal_npwp->organization : old('organization') }}" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="submit">
                </div>
            </form>
        </div>
    </div>
@endsection