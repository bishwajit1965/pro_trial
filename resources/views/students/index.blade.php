@extends('master')
@section('title', ' | Student Index')

@section('content')

	<div class="dropdown">
	  <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	    Export
	    <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	    <li id="export-to-pdf"><a href=" {{ URL::to('getPDF') }} ">Export to PDF</a></li>
	    <li><a href="#">Another action</a></li>
	    <li><a href="#">Something else here</a></li>
	    <li role="separator" class="divider"></li>
	    <li><a href="#">Separated link</a></li>
	  </ul>
	</div>

	<h2>All Students' Data
	<a href=" {{ action('StudentsController@create') }} " class="btn btn-primary btn-sm pull-right button_bottom " data-toggle="tooltip" data-placement="top" title="Create student!"> Create new student</a></h2>
	<div class="row">
		<div class="col-md-12">
		{{-- <h2>Search student data</h2> --}}
			<table class="table table-responsive table-bordered table-hover">

				{!! Form::open(['route' => 'students.index', 'method' => 'GET', 'class' => 'class-name']) !!}
					{{--
					{{ Form::label('phone', 'Phone:') }}
					{{ Form::text('phone', null, ['class' => 'form-control' , 'placeholder' => 'Search by Phone No']) }} --}}

					{{ Form::label('f_name', 'F_name:') }}
					{{ Form::text('f_name', null, ['class' => 'form-control ', 'placeholder' => 'Search by F_name']) }}

					{{ Form::submit('Search', ['class' => 'btn btn-primary btn-block button-top button_bottom pull-right']) }}

				{!! Form::close() !!}

				<thead>
					<tr>
						<th>#</th>
						<th>Roll</th>
						<th>F_name</th>
						<th>L_name</th>
						<th>Class</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Image</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($students as $student)
						<tr>
							<td> {{ $student->id 			}} </td>
							<td> {{ $student->roll 		}} </td>
							<td> {{ $student->f_name 	}} </td>
							<td> {{ $student->l_name 	}} </td>
							<td> {{ $student->class 	}} </td>
							<td> {{ $student->address }} </td>
							<td> {{ $student->phone 	}} </td>
							<td>
								 <img src="{{asset('s_images/' . $student->image)}}" alt=""
									style="width:60px; height:60px; background-color:#FFF; border:1px solid#ABABAB; padding:2px; border-radius: 15%;">
							</td>
							<td>
								<a href="{{ action('StudentsController@show', $student->id) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="View data!"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"> </span></a>

								<a href="{{ action('StudentsController@edit', $student->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit data!"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span></a>

								<a href="{{ action('StudentsController@delete', $student->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete!"><span class="glyphicon glyphicon-trash" aria-hidden="true"> </span></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center"> <!-- Pagination  -->
        {{ $students->links() }}
      </div>
		</div>
	</div>
	<!--Javascript code for tooltip follows -->
	<script>
	$(document).ready(function(){
	  $('[data-toggle = "tooltip"]').tooltip();
	});
	</script>
@endsection
