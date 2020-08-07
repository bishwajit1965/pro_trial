@extends('master')

@section('title', '| Create New Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css')!!}
	{!! Html::style('css/select2.min.css') !!}

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>
  		tinymce.init({
  			selector:'textarea',
  			plugins:"link code image",
  		});
  	</script>

@endsection

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>Create a new post</h1><hr>

			{!! Form::open(array('route' => 'posts.store','data-parsley-validte' => '', 'files' => 'true')) !!}

				{{  Form::label('title', 'Title:') }}
				{{  Form::text('title', null, array( 'class'=>'form-control','required' =>'' )) }}

				{{  Form::label('writer', 'Writer:') }}
				{{  Form::text('writer', null, array( 'class'=>'form-control','required' =>'' )) }}

				{{  Form::label('slug', 'Slug:') }}
				{{  Form::text('slug',null,array('class' => 'form-control' , 'required' => ''  )) }}

				{{  Form::label('category_id', 'Category:') }}
					<select class="form-control" name="category_id">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>

				{{  Form::label('tags', 'Tags:') }}
					<select class="form-control select2-multi" name=" tags[] " multiple="multiple">
						@foreach($tags as $tag)
							<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>

				{{  Form::label('featured_image', 'Upload Featured Image:') }}
				{{  Form::file('featured_image')  }}

				{{  Form::label('body', 'Body:') }}
				{!! Form::textarea('body', null , array( 'class' => 'form-control', 'rows=5')) !!} <!-- Tinymce will not work if required field is added here -->

				{{  Form::submit('Create Post', array('class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top:15px;')) }}

			{!!  Form::close() !!}
		</div>

	</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.js') !!}
	{!! Html::script('js/select2.min.js') !!}
	<script>
		$('.select2-multi').select2();
	</script>
@endsection
