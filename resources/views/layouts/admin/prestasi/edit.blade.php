@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Prestasi</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::model($prestasi, ['method' => 'PATCH', 'route' => ['prestasi.update', $prestasi->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User ID:</strong>
                        {!! Form::number('user_id', null, ['placeholder' => 'User ID', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {!! Form::textarea('description', null, [
                            'placeholder' => 'Description',
                            'class' => 'form-control',
                            'style' => 'height:150px',
                        ]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-danger" href="{{ route('prestasi.index') }}"> Cancel </a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
