@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <h2>Edit Role <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a></h2>
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


<form method="POST" action="{{ route('roles-update') }}">
@csrf
<input type="hidden" name="id" value="{{ $role->id }}">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
			<input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" placeholder="Name" required>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
			<br/>
            @foreach($permission as $value)
			<input type="checkbox" name="permission[]" class="name" value="{{ $value->name }}" @if(in_array($value->id, $rolePermissions)) checked @endif> {{ $value->name }}
			<br/>
			@endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>

@endsection