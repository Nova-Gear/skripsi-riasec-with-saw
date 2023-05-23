@extends('layouts.app')


@section('content')

<div class="card">
  <div class="card-header">
        <h2>Create New Role</h2>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br>
                <div style="height: 200px; overflow-y: auto;">
                    <div class="row">
                        @foreach($permission as $value)
                            <div class="col-md-3">
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <a class="btn btn-danger" href="{{ route('roles.index') }}"> Cancel </a>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>


@endsection

