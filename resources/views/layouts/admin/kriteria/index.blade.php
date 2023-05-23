@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <h2>Kriteria Management</h2>
    </div>
    <div class="card-body">
      <a class="btn btn-success float-left mb-2" href="{{ route('kriteria.create') }}">Create New Kriteria</a>
      <table class="table table-bordered">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Weight</th>
          <th width="280px">Action</th>
        </tr>
        @foreach ($data as $kriteria)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $kriteria->name }}</td>
          <td>{{ $kriteria->weight }}</td>
          <td>
            <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
              <a class="btn btn-primary" href="{{ route('kriteria.edit', $kriteria->id) }}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this kriteria?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
      {!! $data->render() !!}
    </div>
  </div>
@endsection
