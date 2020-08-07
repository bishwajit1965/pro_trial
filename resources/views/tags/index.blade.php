@extends('master')
@section('title', 'Tags Index')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="col-md-8">
				<h2>Tags for the posts</h2>
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
			</div>
			<div class="col-md-4">
				<h2>Add new tag:</h2>
				<div class="well">
					{!! Form::open(['route' => 'tags.store']) !!}
						{{ Form::label('name', 'Tag Name:') }}
						{{ Form::text('name', null, [ 'class' =>'form-control']) }}
						{{ Form::submit('Add Tag', ['class'=> 'btn btn-primary btn-block button-top'])}}
					{!! Form::close() !!}
				</div>
			</div>	 
		</div>
	</div>

@endsection
