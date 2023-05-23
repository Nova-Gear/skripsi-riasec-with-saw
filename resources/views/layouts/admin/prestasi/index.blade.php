@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <h2>Prestasi Management</h2>
    </div>
    <div class="card-body">
      <a class="btn btn-success float-left mb-2" href="{{ route('prestasi.create') }}">Create New Prestasi</a>
      <table class="table table-bordered">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Title</th>
          <th>Description</th>
          <th width="280px">Action</th>
        </tr>
        @foreach ($data as $prestasi)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $prestasi->user_id }}</td>
          <td>{{ $prestasi->title }}</td>
          <td>{{ $prestasi->description }}</td>
          <td>
            <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST">
              <a class="btn btn-info" href="{{ route('prestasi.show', $prestasi->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('prestasi.edit', $prestasi->id) }}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this prestasi?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
      {!! $data->render() !!}
    </div>
  </div>
@endsection
