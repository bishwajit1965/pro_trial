@extends('master')
@section('title', ' | Confirm Delete ')

@section('content')

	<div class="row">
	  <div class="col-md-12">
	 	  <img src="{{asset('images/' . $post->image)}}" style="border:3px solid#DDD; background:#778991; padding:3px; border-radius:2%; " height="300" width="890" float="left" alt="Image">
	  </div>
	</div>
	<span style="color:#C9302C; text-align: center; "><h2 style="color:#C9302C;">DO YOU REALLY WANT TO DELEETE THIS POST ? </h2> </span> <hr>
		<table class="table table-responsive table-bordered table-hover">
			<tbody>
				<tr><td><strong>Id:  &nbsp; {{ $post->id }} </strong> </td></tr>
				<tr><td><strong>Title:  &nbsp; {{ $post->title }}</strong>  </td></tr>
				<tr><td><strong> Writer:  &nbsp;{{ $post->writer }}</strong>  </td></tr>
				<tr><td><strong> Body: &nbsp; </strong>{!! $post->body !!} </td></tr>
				<tr><td>
						<div class="tags"><strong>Tags:  &nbsp;</strong>
								@foreach($post->tag as $tag)
									<span class="label label-default">{{  $tag->name  }}</span>
								@endforeach
						</div>
					</td></tr>
				<tr><td><strong>Category: &nbsp;{{ $post->category->name }}</strong>  </td></tr>
				<tr><td><strong> Created on:&nbsp;{{ $post->created_at }}</strong>  </tr>
			</tbody>
		</table>

		<div class="row">
		 	<div class="col-md-6">
				{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

		 			{{  Form::submit(' YES , DELETE THIS POST', ['CLASS' => 'btn btn-danger btn-block btn-sm ']) }}

		 		{!! Form::close() !!}
		 	</div>
		 	<div class="col-md-6">
		 		{!! Form::open(['route' => ['posts.show', $post->id], 'method' => 'get' ]) !!}

		 			{{ Form::submit(' NO , GO BACK', ['class' => 'btn btn-primary btn-block btn-sm']) }}

		 		{!! Form::close() !!}
		 	</div>
		</div>
@endsection
