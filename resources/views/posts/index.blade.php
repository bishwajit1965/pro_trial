@extends('master')
@section('title', '| All Posts')
@section('content')
	<h2>All posts count: <small>{{ $posts->count() }}</small>
	<a href="{{ route('posts.create') }}"class="btn btn-sm btn-primary pull-right button_bottom"> Create New Post </a> </h2>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-responsive table-bordered table-hover" >
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Photo</th>
						<th>Body</th>
						<th>Created At</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<td> {{ $post->id }} </td>
							<td> {{ substr(Strip_tags($post->title), 0 , 40) }} {{ strlen(Strip_tags($post->title)) > 40 ? "..." : "" }} </td>
							<td> <img src="{{asset('images/' . $post->image)}}" alt=""
									style="width:40px; height:40px; background-color:#FFF; border:1px solid#ABABAB; padding:2px;"> </td>

							<td> {{ substr(Strip_tags($post->body), 0 , 40) }} {{ strlen(Strip_tags($post->body)) > 40 ? "..." : "" }} </td>

							<td> {{ date('M j, Y', strtotime( $post->created_at)) }} </td>
							<td>
								<a href=" {{ route('posts.show', [$post->id]) }} " data-toggle="tooltip" data-placement="top" title="View data!" class="btn btn-xs btn-primary " ><span class="glyphicon glyphicon-eye-open"> </span> </a>

								<a href=" {{ route('posts.edit', [$post->id]) }} " data-toggle="tooltip" data-placement="top" title="Edit data!" class="btn btn-xs btn-success  "><span class="glyphicon glyphicon-pencil"></span> </a>

              					<a href=" {{ route('posts.delete', [$post->id]) }} " data-toggle="tooltip" data-placement="top" title="Delete!" class="btn btn-xs btn-danger  "><span class="glyphicon glyphicon-trash"></span>
              					</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $posts->links() }}
			</div>
		</div>
	</div>
  	<script>
  	$(document).ready(function(){
  		$('[data-toggle = "tooltip"]').tooltip();
  	});
	</script>
@endsection
