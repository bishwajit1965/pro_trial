@extends('master')
@section('title', ' | Update Student')

@section('content')

	<h2>Update students' data</h2>
	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			{!! Form::model($student, ['route' => ['students.update', $student->id], 'method' => 'PATCH' , 'files' => 'true']) !!}
			
				{{ Form::label('roll', 'Roll:') }}
				{{ Form::text('roll', null, ['class' => 'form-control']) }}

				{{ Form::label('f_name', 'F_name:') }}
				{{ Form::text('f_name', null, ['class' => 'form-control']) }}

				{{ Form::label('l_name', 'L_name:') }}
				{{ Form::text('l_name', null, ['class' => 'form-control']) }}

				{{ Form::label('class', 'Class:') }}
				{{ Form::text('class', null, ['class' => 'form-control']) }}

				{{ Form::label('address', 'Address:') }}
				{{ Form::textarea('address', null, ['class' => 'form-control', 'rows=5']) }}

				{{ Form::label('phone', 'Phone:') }}
				{{ Form::text('phone', null, ['class' => 'form-control']) }}

				{{  Form::label('featured_image', 'Update Image:') }}
				{{  Form::file('featured_image')  }}

				{{ Form::submit('Update Student', ['class' => 'btn btn-primary btn-block button-top']) }}

			{!! Form::close() !!}

		</div>

	</div>

@endsection

