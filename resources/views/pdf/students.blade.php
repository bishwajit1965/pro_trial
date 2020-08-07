<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Students' list</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		h1,h2,h3,h4,h5,p{
			text-align:center;
			line-height: 0.5em;
		}
	</style>
</head>
<body>
<h2>Noapara Mahila College</h2>
	<h3>List of students </h3>
	<h4>Class:Eleven</h4>
	<h5>Session:2016-17</h5>
	 <table class="table table-responsive table-bordered table-condensed table-hover">
	 	<thead>
	 		<tr>
		 		<th>#</th>
		 		<th>Roll</th>
		 		<th>F_name</th>
		 		<th>L_name</th>
		 		<th>class</th>
		 		<th>Address</th>
		 		<th>Phone</th>
		 		<th>Photo</th>
		 	</tr>
	 	</thead>
	 	<tbody>
	 		@foreach($students as $student)
	 			<tr>
	 				<td> {{ $student->id }} </td>
	 				<td> {{ $student->roll }} </td>
	 				<td> {{ $student->f_name }} </td>
	 				<td> {{ $student->l_name }} </td>
	 				<td> {{ $student->class }} </td>
	 				<td> {{ $student->address }} </td>
	 				<td> {{ $student->phone }} </td>
	 				<td><center> <img src="{{asset('s_images/' . $student->image)}}" alt="Image"
						style="width:50px; height:50px;background-color:#FFF; border:1px solid#ABABAB; padding:2px; border-radius: 5%;"> </center> </td>
	 			</tr>
	 		@endforeach
	 	</tbody>
	 </table>
	 <div class="text-center">
	 	{{ $students->links() }}
	 </div>
</body>
</html>


