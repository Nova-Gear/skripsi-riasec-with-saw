@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Kriteria</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::model($kriteria, ['method' => 'PATCH', 'route' => ['kriteria.update', $kriteria->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Weight:</strong>
                            {!! Form::number('weight', null, array('placeholder' => '0.10','class' => 'form-control', 'step' => '0.01', 'min' => '0.10', 'max' => '1.0')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-danger" href="{{ route('kriteria.index') }}">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
