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
