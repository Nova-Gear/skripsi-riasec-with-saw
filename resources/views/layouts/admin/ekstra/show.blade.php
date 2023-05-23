@extends('layouts.app')


@section('content')


<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
        <h2>Detail Ekstra</h2>
        <a class="btn btn-success ml-auto" href="{{ route('ekstra.index') }}">Back</a>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $ekstra->name }}
            </div>
        </div>
    </div>
  </div>
</div>

@endsection