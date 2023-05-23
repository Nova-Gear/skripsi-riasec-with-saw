@extends('layouts.app')


@section('content')

<div class="card">
  <div class="card-header">
    <h2>Users Management</h2>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
      <a class="btn btn-success float-left mb-2" href="{{ route('users.create') }}"> Create New User </a>
    <table class="table table-bordered">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Roles</th>
      <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $user)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
              <label class="badge badge-success">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        <td>
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete this user?")']) !!}
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
    </table>
    {!! $data->render() !!}

  </div>
</div>

@endsection
