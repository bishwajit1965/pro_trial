@extends('master')
@section('title', '| Edit Post')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>
  		tinymce.init({
  			selector:'textarea',
  			plugins: "link code",
  		});
  	</script>

@endsection


@section('content')

<div class="row">
	<div class="col-md-8">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PATCH' , 'files' => 'true']) !!}
			
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class'=> 'form-control']) }}

			{{ Form::label('writer', 'Writer:') }}
			{{ Form::text('writer', null, ['class' => 'form-control' ]) }}

			{{ Form::label('slug', 'Slug:', ['class'=>'form-spacing-top']) }}
			{{ Form::text('slug', null, array('class' => 'form-control ')) }}

			{{ Form::label('featured_image', 'Update Featured Image:') }}
			{{ Form::file('featured_image') }}

			{{ Form::label('category_id', 'Category:') }}
			{{ Form::select('category_id', $categories, null, array('class' => 'form-control')) }}

			{{ Form::label('tags' , 'Tags:') }}
			{{ Form::select('tags[]', $tags , null, ['class' => 'select2-multi  form-control', 'multiple' =>'multiple' ]) }}

			{{ Form::label('body', 'Body:') }}
			{{ Form::textarea('body', null, ['class' => 'form-control', 'rows=5']) }}
	</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<p><label>Created At:</label>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
					</dl>

					<dl class="dl-horizontal">
						<p><label>Last Updated:</label>{{ date('M j, Y h:ia', strtotime($post->updated_at))}}</p>
					</dl>
					<hr>
				
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class' => 'btn btn-block btn-danger'] ) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
						</div> 
					</div> 
				</div>
			</div>
		{!! Form::close() !!}
</div>
@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script>
		$('.select2-multi').select2();
		$('.select2-multi').select2().val( {!! json_encode($post->tag()->getRelatedIds()) !!} ).trigger('change');
	</script>
@endsection
 