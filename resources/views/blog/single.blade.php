@extends('master')
@section('title',   "| $post->slug " )

@section('content')
	<div class="row">
		<div class="col-md-12">

			<h2>{{ $post->title }}</h2>
    	<p><strong><i>Written by:</strong>  {{ $post->writer }}</i></p>

      <a href="{{ action('PagesController@getIndex')}}"><img src="{{asset('images/' . $post->image)}}" alt=""
      				style="width:890px; height:300px; float:left; margin-right:10px; background-color:#FFF; border:2px solid#ABABAB; padding:3px;"></a> &nbsp;

      <p> {!!  $post->body  !!} </p>

      <p><strong>Posted In: </strong> <span style="color:#286090;"> <strong>{{ $post->category->name }}</strong></span> Category</p>

      <p>
      	<strong> Posted on:</strong> {{ $post->created_at }} <strong> || Updated at:</strong> {{ $post->updated_at }}
				<a href="{{ action('BlogController@getSingle', [$post->slug]) }}">
				<strong> || <span class=" glyphicon glyphicon-comment"> </span> {{ $post->comments->count() }}  Comments  </strong> </a>

				<a href="{{ action('BlogController@getIndex') }}" class="btn btn-primary btn-sm pull-right"> Go to Archive Page </a>
      </p><hr>
		</div>
	</div>

	{{-- Comments Counting begins --}}

	<div class="row">
		<div class="col-md-12">
				<h3 class="comments_title"><span class="glyphicon glyphicon-comment"> Comments  </span> <small> {{ $post->comments->count() }} </small> </h3>
			<div class="col-md-10 col-md-offset-1 comment_bottom comment_block">
				@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author_info">
						<div class="author_info">
								<img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) }}" class="author_image" alt="">
								<div class="author_name">
								 	<h4>
									 	{{ $comment->name }}
									</h4>
								 	<p class="author_time">
									 	{{ date( 'F j, Y h:m:s A' . strtotime($comment->created_at)) }}
									</p>
							 	</div>
						</div>
					</div>
					<div class="comment_content">
						{{ $comment->comment }}
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="row">
		<div id="comment-form" class="col-md-10 col-md-offset-1 form-spacing-top">

			{!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST' ]) !!}
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::email('email', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-12">
						{{ Form::label('comment', 'Comment:') }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows=5']) }}

						{{ Form::submit('Add Comment', ['class' => 'btn btn-primary btn-block button-top']) }}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
