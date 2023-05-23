@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h2>Detail Prestasi</h2>
            <a class="btn btn-success ml-auto" href="{{ route('prestasi.index') }}">Back</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User ID:</strong>
                    {{ $prestasi->user_id }}
                </div>
                <div class="form-group">
                    <strong>Title:</strong>
                    {{ $prestasi->title }}
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $prestasi->description }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
