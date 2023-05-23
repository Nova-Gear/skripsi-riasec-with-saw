@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <h2>Ekstra Management</h2>
    </div>
    <div class="card-body">
      <a class="btn btn-success float-left mb-2" href="{{ route('ekstra.create') }}">Create New Ekstra</a>
      <table class="table table-bordered">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th width="280px">Action</th>
        </tr>
        @foreach ($data as $ekstra)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $ekstra->name }}</td>
          <td>
            <form action="{{ route('ekstra.destroy', $ekstra->id) }}" method="POST">
              <a class="btn btn-info" href="{{ route('ekstra.show', $ekstra->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('ekstra.edit', $ekstra->id) }}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ekstra?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
      {!! $data->render() !!}
    </div>
  </div>
@endsection
