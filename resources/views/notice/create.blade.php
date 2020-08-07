@extends('master')

@section('title', ' | Create Notice')

@section('content')

	<h2>Create Notice</h2> <hr>

	{!! Form::open(array('route' => 'notice.store' )) !!}

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control']) }}

		{{ Form::label('body', 'Body:') }}
		{{ Form::textarea('body', null, ['class' => 'form-control' , 'rows=5']) }}

		{{ Form::submit('Create Notice', ['class' => 'btn btn-primary btn-block button-top']) }}

	{!! Form::close() !!}

@endsection
