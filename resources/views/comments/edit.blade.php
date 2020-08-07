@extends('master')
@section('title', '| Comments Edit')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2>Edit comment</h2> <hr>
		{!! Form::model($comment,['route' => ['comments.update', $comment->id], 'method' => 'PUT' ]) !!}
			
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', null , ['class' => 'form-control', 'disabled' => '']) }}
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email', null , ['class' => 'form-control', 'disabled' => '']) }}
			{{ Form::label('comment', 'Comment:') }}
			{{ Form::textarea('comment', null , ['class' => 'form-control', 'rows=5' ]) }}
			{{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success button-top']) }}

		{!! Form::close() !!}
	</div>
</div>
@endsection