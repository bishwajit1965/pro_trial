@extends('master')

@section('title', '| Show Post')

@section('content')

<div class="row">
		<div class="col-md-8">
			<img src="{{asset('images/' . $post->image)}}" style="border:3px solid#DDD; background:#778991; padding:3px; border-radius:1%; " height="308" width="600" float="left" alt="Image">
		</div>
		<div class="col-md-4">
			<div class="well">
				<div class="row">

					<dl class="dl-horizontal">
						<p><label>Url: </label></p>
						<a href="{{ url( 'blog/' .  $post->slug ) }}"> {{ url('blog/' . $post->slug ) }} </a>
					</dl>

					<dl class="dl-horizontal">
					<p><label>Created At:</label>
						{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
					</dl>

					<dl class="dl-horizontal">
						<p><label>Last Updated:</label>
						{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
					</dl> <hr>

					<div class="col-md-6">
						<a href=" {{route('posts.edit',[$post->id])}} " class="btn btn-primary btn-block">Edit</a>
					</div>

					<div class="col-md-6">
						{{-- {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}	  --}}
						{!! Form::open(['route' => ['posts.delete', $post->id], 'method' => 'get']) !!}
							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block glyphicon glyphicon-trash']) }}
						{!! Form::close() !!}
					</div>

					<div class="col-md-12">
						<a href="{{ route('posts.index')}}"class="btn btn-block btn-primary button-top"><< See All Pots</a>
					</div>

				</div>
			</div>
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
	<div class="col-md-12"> <hr>
    <div id="back_end_comments">
    	<h3>Total Comments <small>{{ $post->comments->count()}}</small></h3>

				<table class="table table-bordered table-responsive table-hover table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="80px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($post->comments as $comment)
							<tr>
								<td>{{  $comment->id }}</td>
								<td>{{  $comment->name }}</td>
								<td>{{  $comment->email }}</td>
								<td>{{  $comment->comment }}</td>
								<td>
									<a href= "{{ route('comments.edit', $comment->id)}}" data-toggle="tooltip" data-placement="top" title="Edit data!" class="btn btn-xs btn-primary" ><span class="glyphicon glyphicon-pencil"></span></a>

									<a href="{{ route('comments.delete', $comment->id) }}" data-toggle="tooltip" data-placement="top" title="Delete data!" class="btn btn-xs btn-danger" ><span class="glyphicon glyphicon-trash"></span></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
    </div>
		</div>
</div>
<script>
	$(document).ready(function(){
	$('[data-toggle = "tooltip"]').tooltip();
});
</script>
@endsection
