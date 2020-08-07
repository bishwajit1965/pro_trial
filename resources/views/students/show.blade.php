 @extends('master')
 @section('title', ' | Show Student')

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
	<h2>Student's Particulars</h2>
	<table class="table table-striped table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Roll</th>
				<th>F_Name</th>
				<th>L_Name</th>
				<th>Class</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td> {{ $student->id 			}}	</td>
				<td> {{ $student->roll 		}}	</td>
				<td> {{ $student->f_name 	}}	</td>
				<td> {{ $student->l_name 	}}	</td>
				<td> {{ $student->class 	}}	</td>
				<td> {{ $student->address }}	</td>
				<td> {{ $student->phone 	}}	</td>
				<td>
						<center><img src="{{asset('s_images/' . $student->image)}}" alt="Image"
						style="width:80px; height:80px;background-color:#FFF; border:1px solid#ABABAB; padding:2px; border-radius: 5%;"></center>
				</td>
			</tr>
		</tbody>
	</table>

	<div class="row">
		<div class="col-md-6">
			{!! Form::open(['route' => ['students.index', $student->id], 'method' => 'GET']) !!}

			{{ Form::button('<span class="glyphicon glyphicon glyphicon-fast-backward"> GO BACK </span>',['class'=>'btn btn-primary btn-block button-top', 'type'=>'submit' ]) }}	 
		{!! Form::close() !!}	
		</div>
		<div class="col-md-6">
			{!! Form::open(['route' => ['students.index', $student->id], 'method' => 'GET']) !!}

			{{ Form::button('<span class="glyphicon glyphicon glyphicon-fast-backward"> GO BACK </span>',['class'=>'btn btn-primary btn-block button-top', 'type'=>'submit' ]) }}	 
		{!! Form::close() !!}	
		</div>
	</div>

@endsection

