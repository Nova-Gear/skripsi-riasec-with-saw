@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    <h2>Edit Ekstra</h2>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    {!! Form::model($ekstra, ['method' => 'PATCH','route' => ['ekstra.update', $ekstra->id]]) !!}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <a class="btn btn-danger" href="{{ route('ekstra.index') }}"> Cancel </a>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection