@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Ukm</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::model($ukm, [
                'method' => 'PATCH',
                'route' => ['ukm.update', $ukm->id],
                'enctype' => 'multipart/form-data',
            ]) !!}

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        {!! Form::text('detail', null, ['placeholder' => 'Detail', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <br>
                        @if ($ukm->image)
                            <img src="{{ url('images/ukm/' . $ukm->image) }}" alt="{{ $ukm->name }}" width="100"
                                id="previewImage">
                        @endif
                        <br><br>
                        {!! Form::file('image', ['class' => 'form-control', 'id' => 'imageInput']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-danger" href="{{ route('ukm.index') }}"> Cancel </a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#imageInput').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
