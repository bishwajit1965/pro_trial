<!--

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Live Search</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	{{-- <script sec="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> --}}

	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Blog Post Info</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<input type="text" class="form-control" id="search" name="search" placeholder=" Write Post Id or any letter of Author's name or Post title"></input>
					</div>
						<table class="table table-responsive table-hover table-bordered">
							<thead>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Author</th>
									<th>Body</th>
									<th>Published on</th>
								</tr>
							</thead>
							<tbody>

								 
							</tbody>
						</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#search').on('keyup', function(){
			 // alert('test');
			$value = $(this).val();
			$.ajax({
				type: 'get',
				{{-- url : '{{ URL::to('search') }}', --}}
				data: {'search':$value},
				success: function(data){
						$('tbody').html(data);
					}
			});
		});
	</script>	
</body>
</html>
--> 
@extends('master')
@section('title',' | Search Posts')
@section('content')
	<h1>Live Search Page</h1>

	<div class="form-group">
		<input type="text" class="form-control" id="search" name="search" placeholder=" Write Post Id or any letter of Author's name or Post title"></input>
	</div>
		<table class="table table-responsive table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Author</th>
					<th>Body</th>
					<th>Published on</th>
				</tr>
			</thead>
			<tbody>

				 
			</tbody>
		</table>

		<script type="text/javascript">
			$('#search').on('keyup', function(){
				 // alert('test');
				$value = $(this).val();
				$.ajax({
					type: 'get',
					url : '{{ URL::to('search') }}',
					data: {'search':$value},
					success: function(data){
							 $('tbody').html(data);
						}
				});
			});
		</script>	


@endsection