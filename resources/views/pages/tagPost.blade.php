@extends('master')
@section('title', ' | Tag Post')
@section('content')
	<h2> Tag Post Page </h2>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-8">
				<h2>Tags for the posts</h2>
				<table class="table table-responsive">
					<table class="table table-bordered table-responsive table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Tag Name</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tags as $tag)
								<tr>
									<td> {{ $tag->id }} </td>
									<td> <a href="{{route('tags.show', $tag->id)}}">{{ $tag->name }}</a> </td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</table>						
			</div>
		</div>
	</div>
@endsection
