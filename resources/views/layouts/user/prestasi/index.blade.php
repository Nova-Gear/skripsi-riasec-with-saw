@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      Prestasi Management
    </div>
    <div class="card-body">
      <a class="btn btn-success float-left mb-2" href="{{ route('mahasiswa.prestasi.create') }}">Create New Prestasi</a>
      <table class="table table-bordered">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Tanggal</th>
          <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $prestasi)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $prestasi->title }}</td>
          <td>{{ $prestasi->description }}</td>
          <td>{{ $prestasi->created_at }}</td>
          <td>
            <form action="{{ route('mahasiswa.prestasi.destroy', $prestasi->id) }}" method="POST">
              <a class="btn btn-primary" href="{{ route('mahasiswa.prestasi.edit', $prestasi->id) }}">Edit</a>
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
