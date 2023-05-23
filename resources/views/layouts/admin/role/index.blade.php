@extends('layouts.app')


@section('content')

<div class="card">
  <div class="card-header">
    <h2>Role Management</h2>
    <div class="card-tools">
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
      @can('role-create')
        <a class="btn btn-success float-left mb-2" href="{{ route('roles.create') }}"> Create New Role </a>
      @endcan
      <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
      </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                @endcan
                @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete this role?")']) !!}
                    {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </table>

    {!! $roles->render() !!}

  </div>
</div>

@endsection
