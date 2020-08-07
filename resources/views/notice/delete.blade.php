@extends('master')

@section('title', ' | Delete Notice')

@section('content')

<span style="color:#C9302C; text-align: center; "><h2 style="color:#C9302C;"> DO YOU REALLY WANT TO DELEETE THIS NOTICE ? </h2> </span> <hr>
	<table class="table table-responsive table-bordered table-hover">
		<tbody>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td> {{ $notice->id }} </td>
				<td> <strong> {{ $notice->title }} </strong> </td>
				<td><p>{{ $notice->body }}</p></td>
			</tr>
		</tbody>
	</table>

	<div class="row">
	 	<div class="col-md-6">
			{!! Form::open(['route' => ['notice.destroy', $notice->id], 'method' => 'DELETE']) !!}	

	 			{{  Form::submit(' YES , DELETE THIS POST', ['CLASS' => 'btn btn-danger btn-block btn-sm ']) }}

	 		{!! Form::close() !!}
	 	</div>
	 	<div class="col-md-6">
	 		{!! Form::open(['route' => ['notice.index', $notice->id], 'method' => 'get' ]) !!}

	 			{{ Form::submit(' NO , GO BACK', ['class' => 'btn btn-primary btn-block btn-sm']) }}

	 		{!! Form::close() !!}
	 	</div>
	</div>

	
	


@endsection