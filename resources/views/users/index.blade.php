@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <h2>Users List 
			@can('user-create')
			<a class="btn btn-success pull-right" href="{{ route('users.create') }}"> Add New User</a>
			@endcan
		</h2>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  {{ $message }}
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $row)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $row->name }}</td>
    <td>{{ $row->email }}</td>
    <td>
      @if(!empty($row->getRoleNames()))
        @foreach($row->getRoleNames() as $row2)
           <label class="badge bg-success">{{ $row2 }}</label>
        @endforeach
      @endif
    </td>
    <td>
		@can('user-edit')
		<a class="btn btn-primary" href="{{ route('users.edit',$row->id) }}">Edit</a>
	   @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection