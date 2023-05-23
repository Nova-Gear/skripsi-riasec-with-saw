@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Riasec Test</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::model($riasecTest, ['method' => 'PATCH', 'route' => ['riasec_tests.update', $riasecTest->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Soal:</strong>
                        {!! Form::text('soal', null, ['placeholder' => 'Soal', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tipe Soal :</strong>
                        {!! Form::select('type', ['R' => 'R', 'I' => 'I', 'A' => 'A', 'S' => 'S', 'E' => 'E', 'C' => 'C'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-danger" href="{{ route('riasec_tests.index') }}"> Cancel </a>
                    <button type="submit" class="btn btn-success">Submit</ </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
