@extends('layout.default')

@section('content')
<div>&nbsp;</div>
<div>
    {!! Form::open(array('url' => '/add/appliance', 'method' => 'POST', 'class' => 'form',  'enctype' => 'multipart/form-data')) !!}

    <div class="form-group">
	    <label for="name">Name</label>
	    {!! Form::text('name', '', array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
    	{!! Form::submit('Submit', array('class' => 'btn btn-default')) !!}
    </div>
    {!! Form::close() !!}
</div>

@if (Session::has('success'))
    <div class = "alert alert-success" role = "alert">{!!Session::get('success')!!}</div>
@elseif (Session::has('error'))
    <div class = "alert alert-error" role = "alert"><div>{!!Session::get('error')!!}</div>
@endif
@stop