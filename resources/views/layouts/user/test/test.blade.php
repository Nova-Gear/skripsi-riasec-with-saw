@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('RIASEC Test') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('test.submit') }}">
                @csrf

                @foreach ($questions as $question)
                    <div class="form-group row">
                        <label for="{{ $question->id }}"
                            class="col-md-4 col-form-label text-md-left">{{ $question->soal }}</label>

                        <div class="col-md-6">
                            <select id="{{ $question->id }}" name="answer[]"
                                class="form-control @error('answer.' . $loop->index) is-invalid @enderror" required>
                                <option value="" selected disabled>{{ __('Choose an option') }}</option>
                                <option value="{{ $question->type }}">{{ __('Setuju') }}</option>
                                <option value="X">{{ __('Tidak Setuju') }}</option>
                            </select>

                            @error('answer.' . $loop->index)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a class="btn btn-danger" href="{{ route('home') }}"> Cancel </a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
