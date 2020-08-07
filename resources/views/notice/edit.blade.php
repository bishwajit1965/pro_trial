@extends('master')

@section('title', '| Update Notice')

@section('content')
<h2>Update Notice</h2> <hr>

{!! Form::model($notice,  ['route' => ['notice.update', $notice->id], 'method' => 'PATCH']  ) !!}

		{{ Form::label('id', 'Id:') }}
		{{ Form::text('id', null, ['class' => 'form-control', 'disabled' => '']) }}

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control']) }}

		{{ Form::label('body', 'Body:') }}
		{{ Form::textarea('body', null, ['class' => 'form-control' , 'rows=5']) }}

		{{ Form::submit('Update Notice', ['class' => 'btn btn-primary btn-block button-top']) }}

{!! Form::close() !!}

@endsection