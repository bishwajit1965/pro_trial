@extends('master')
@section('title', 'Category Index')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="col-md-8">
				<h2>Categories for the posts</h2>
				<table class="table table-bordered table-responsive table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Category Name</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
							<tr>
								<td> {{ $category->id }} </td>
								<td> {{ $category->name }} </td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-4 col-md-offset-">
				<h2>Add new category:</h2>
				<div class="well">
					
					{!! Form::open(['route' => 'categories.store']) !!}
						{{ Form::label('name', 'Category Name:') }}
						{{ Form::text('name', null, [ 'class' =>'form-control']) }}
						{{  Form::submit('Add Category', ['class'=> 'btn btn-primary btn-block button-top'])}}
					{!! Form::close() !!}
				</div>
			</div>	 
		</div>
	</div>

@endsection
