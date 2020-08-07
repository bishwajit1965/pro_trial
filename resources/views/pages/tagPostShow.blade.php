@extends('master')
@section('title', ' | Tag Post Show')
@section('content')
	<h2> Tag Post Page </h2>
	<div class="row">
		<div class="col-md-8">
			<h1> {{$tag->name}} Tag  <small>{{ $tag->posts()->count() }} Posts</small> </h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-responsive table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tag</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tag->posts as $post)
						<tr>
							<td> {{ $post->id }} </td>
							<td> {{ $post->title }} </td>
							<td>
								@foreach($post->tag as $tag)
									<span class="label label-default" style="margin-right:3px;"> {{ $tag->name }} </span>
								@endforeach
							</td>
							<td>
								<a href="{{ route('pages.tagSingle', $post->id) }}" class="btn btn-default btn-primary btn-xs">View</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection