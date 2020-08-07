@if(Session::has('success'))
	<div class="alert alert-success" role= "alert">
		<strong>Successful:</strong>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" > &times;</button>
		{{ Session::get('success') }}
	</div>
@endif

@if(count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<strong> Whoops !!! Errors !!! The action failed!!!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true" > &times;</button>
		<ol>
			@foreach($errors->all() as $error)
				<li> {{ $error }} </li>
			@endforeach
		</ol>
	</div>
@endif
