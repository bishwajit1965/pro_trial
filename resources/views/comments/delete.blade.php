@extends('master')
@section('title', '|Delete Comment')
@section('content')
	<div class="row">
		<div class="col-md-12 col-md-offset-">

			 <span style="color:#C9302C; text-align: center; "><h2 style="color:#C9302C;">DO YOU REALLY WANT TO DELEETE THIS COMMENT ? </h2> </span> <hr>
			 
			  <table class="table table-bordered table-responsive table-hover">
				  <thead>
					 	<tr>
							<th>
								#
							</th>
					 		<th>
					 			Name
					 		</th>
							<th>
								Email
							</th>
							<th>
								Comment
							</th>
					 	</tr>
				  </thead>
				 	<tbody>
					 	<tr>
							<td>
								<p>	<strong>{{ $comment->id   }} </strong> <p>
							</td>
					 		<td>
								<p>	<strong>{{ $comment->name   }} </strong> <p>
					 		</td>
							<td>
								<p> <strong>{{ $comment->email  }} </strong> <p>
							</td>
							<td>
								<p> <strong>{{ $comment->comment}} </strong> </p>
							</td>
					 	</tr>
				 	</tbody>
			  </table>

				<div class="row">
				<div class="col-md-6">
					{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}

						{{ Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-sm btn-block btn-danger button-top ']) }}
						 
					{!! Form::close() !!}
				</div>
				<div class="col-md-6">
					<a href=" {{ action('PostController@index')}} " class="btn btn-sm btn-block btn-primary button-top">NO GO BACK</a>
				</div>
				</div>	
		    
		</div>
	</div>
@endsection
