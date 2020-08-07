@extends('master')
@section('title', ' | Delete Student')

@section('content')

	<span style="color:#C9302C; text-align: center; "><h2 style="color:#C9302C;">DO YOU REALLY WANT TO DELEETE THIS POST ? </h2> </span><hr>

	<div class="row">
	 	<div class="col-md-12">
	 		
	 		<table class="table table-responsive table-hover table-bordered">
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
					</tr>
	 			</thead>
	 			<tbody>
	 				<tr>
 						<td> {{ $student->id 			}} </td>
						<td> {{ $student->roll 		}} </td>
						<td> {{ $student->f_name 	}} </td>
						<td> {{ $student->l_name 	}} </td>
						<td> {{ $student->class 	}} </td>
						<td> {{ $student->address }} </td>
						<td> {{ $student->phone 	}} </td>
						<td>
								<img src="{{asset('s_images/' . $student->image)}}" alt="Student Image"
								style="width:60px; height:60px; float:left; margin-right:px;
								background-color:#FFF; border:1px solid#ABABAB; padding:2px; border-radius: 15%;">
						</td>	 
	 				</tr>
	 			</tbody>
	 		</table>

			<div class="row">
		 		<div class="col-md-6">
		 			{!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'DELETE']) !!}

						{{ Form::button('<span class="glyphicon glyphicon-trash"> YES , DELETE STUDENT DATA </span>',['class'=>'btn btn-danger btn-block button-top', 'type'=>'submit' ]) }}

					{!! Form::close() !!}	
		 		</div>
		 		<div class="col-md-6">
		 			{!! Form::open(['route' => ['students.index', $student->id], 'method' => 'GET']) !!}

						{{ Form::button('<span class="glyphicon glyphicon glyphicon-fast-backward"> NO , CANCEL AND GO BACK </span>',['class'=>'btn btn-primary btn-block button-top', 'type'=>'submit' ]) }}

					{!! Form::close() !!}	
		 		</div>
	 		</div>
	 	</div>
	</div>

@endsection