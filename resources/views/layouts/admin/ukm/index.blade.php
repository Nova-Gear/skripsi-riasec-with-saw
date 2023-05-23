@extends('layouts.app')


@section('content')

<div class="card">
  <div class="card-header">
    <h2>Ukm Management</h2>
    <div class="card-tools">
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
      <a class="btn btn-success float-left mb-2" href="{{ route('ukm.create') }}"> Create New Ukm </a>
      <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $ukm)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $ukm->name }}</td>
                <td>{{ $ukm->detail }}</td>
                <td><img src="{{ url('images/ukm/' . $ukm->image) }}" alt="{{ $ukm->name }}" width="100"></td>
                <td>
                    <a class="btn btn-info" href="{{ route('ukm.show',$ukm->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('ukm.edit',$ukm->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['ukm.destroy', $ukm->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete this user?")']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {!! $data->links() !!}
    </div>
    
  </div>
</div>

@endsection
