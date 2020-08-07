<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Students' notices</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		h1,h2,h3,h4,h5,p{
			text-align:center;
			line-height: 0.5em;
		}
		.date{
			text-align: right;
		}
	</style>
</head>
<body>

<h2>Noapara Mahila College</h2>
	<h3>Students' Notice </h3>
	<h4>Class:Eleven</h4>
	<h5>Session:2016-17</h5>
	  <table class="table table-responsive table-condensed ">
			<thead>
				
			</thead> 	 
		  <tbody>
	 		@foreach($notices as $key => $notice)
	 			<tr>
	 				<td> {{ $notice->id }} Memo No: &nbsp; {{ $notice->title }}</td>  <td class="date"> Date: {{ $notice->created_at }} </td>	 
	 			</tr>
	 			<tr> 
	 				<td> {{ $notice->body }} </td>
	 			</tr>	  	 
	 		@endforeach
	  	</tbody>
	 	</table>
	 <div class="text-center">
	 	{{ $notices->links() }}
	 </div>
</body>
</html>