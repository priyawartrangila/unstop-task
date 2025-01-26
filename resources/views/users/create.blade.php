@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <h2>Add New User <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a></h2>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


<form method="POST" action="{{ route('users.store') }}">
@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
			<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
			<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
			<input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
			<input type="password" class="form-control" name="confirm-password" id="confirm-password" value="" placeholder="Confirm Password">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
			<select class="form-control" name="roles" id="roles" required>
			<option value=""> -Select- </option>
			@foreach($roles as $key => $value)
			<option value="{{ $value }}">{{ $value }}</option>
			@endforeach
			</select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>

@endsection