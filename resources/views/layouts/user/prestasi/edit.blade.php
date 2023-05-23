@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Prestasi
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::model($prestasi, ['method' => 'PATCH', 'route' => ['mahasiswa.prestasi.update', $prestasi->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {!! Form::text('title', null, ['placeholder' => 'Nama', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi:</strong>
                        {!! Form::textarea('description', null, [
                            'placeholder' => 'Deskripsi',
                            'class' => 'form-control',
                            'style' => 'height:150px',
                        ]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-danger" href="{{ route('mahasiswa.prestasi.index') }}"> Cancel </a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
