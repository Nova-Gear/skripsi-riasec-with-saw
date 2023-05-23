@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Create New Prestasi</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open(array('route' => 'prestasi.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User ID:</strong>
                        {!! Form::number('user_id', null, array('placeholder' => 'User ID','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-danger" href="{{ route('prestasi.index') }}">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.card-body -->
    </div>
@endsection
