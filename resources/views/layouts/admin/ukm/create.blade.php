@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Create New Ukm</h2>
        </div>
        <div class="card-body">
            {!! Form::open([
                'route' => 'ukm.store',
                'method' => 'POST',
                'enctype' => 'multipart/form-data',
                'id' => 'uploadForm',
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
                        <input type="file" name="image" class="form-control" id="imageUpload">
                        <img src="" id="imagePreview" alt="Image preview"
                            style="display: none; max-width: 100%; margin-top: 10px;">
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
        // Preview the image before submission
        const imageUpload = document.getElementById('imageUpload');
        const imagePreview = document.getElementById('imagePreview');

        imageUpload.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    imagePreview.src = reader.result;
                    imagePreview.style.display = 'block';
                });
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
            }
        });
    </script>
@endsection
