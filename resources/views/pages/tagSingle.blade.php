@extends('master')
@section('title', ' |Tag Single')
@section('content')
<div class="row">
	<div class="col-md-12">
		<img src="{{asset('images/' . $post->image)}}" style="border:3px solid#DDD; background:#778991; padding:3px; border-radius:1%; " height="300" width="890" float="left" alt="Image">
	</div>	 
</div>
<div class="row">
	<div class="col-md-12">
		<a href=" {{action('PagesController@getIndex')}} ">	<h2>{{ $post->title }}</h2></a>
		<div class="writer">
			<span style="margin-right:8px;" class="label label-primary"> Writteb by : </span>
			<span class="label label-default">{{ $post->writer }} </span>
		</div>
		<p>{!! $post->body !!}</p>
		<p><strong>Created at:&nbsp;</strong>{{ $post->created_at }} <strong>Updated at: &nbsp;</strong>  {{ $post->updated_at }}</p>
		<div class="tags">
			<span style="margin-right:8px;" class="label label-primary"> Post Tags:</span>
				@foreach($post->tag as $tag)
					<span class="label label-default">{{  $tag->name  }}</span>
				@endforeach
		</div>
	</div>

	{{-- Comments Index in the Back-end --}}

	</div>
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

<script>
	$(document).ready(function(){
	$('[data-toggle = "tooltip"]').tooltip();
});
</script>
@endsection