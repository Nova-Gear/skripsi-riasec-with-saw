@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
        <h2>Detail UKM</h2>
        <a class="btn btn-success ml-auto" href="{{ route('ukm.index') }}">Back</a>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="row mb-3">
                <div class="col-md-3">
                    <strong>Name:</strong>
                </div>
                <div class="col-md-9">
                    {{ $ukm->name }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <strong>Image:</strong>
                </div>
                <div class="col-md-9">
                    <img src="{{ url('images/ukm/' . $ukm->image) }}" alt="{{ $ukm->name }}" width="200">
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection
