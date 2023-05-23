@extends('layouts.app')


@section('content')


<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
        <h2>Detail User</h2>
        <a class="btn btn-success ml-auto" href="{{ route('users.index') }}">Back</a>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
  </div>
</div>

@endsection