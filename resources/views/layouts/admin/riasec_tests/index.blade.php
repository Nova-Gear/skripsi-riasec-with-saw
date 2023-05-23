@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Riasec Tests</h2>
            <div class="card-tools">
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-success float-left mb-2" href="{{ route('riasec_tests.create') }}"> Create New Riasec Test </a>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Soal</th>
                    <th>Tipe</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($riasecTests as $key => $test)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $test->soal }}</td>
                        <td>{{ $test->type }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('riasec_tests.edit', $test->id) }}">Edit</a>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['riasec_tests.destroy', $test->id],
                                'style' => 'display:inline',
                            ]) !!}
                            {!! Form::submit('Delete', [
                                'class' => 'btn btn-danger',
                                'onclick' => 'return confirm("Are you sure you want to delete this riasec test?")',
                            ]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $riasecTests->render() !!}
        </div>
    </div>
@endsection
