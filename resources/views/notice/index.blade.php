@extends('master')

@section('title', ' | Notice Index')

@section('content')
	<div class="dropdown">
	  <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	    Export
	    <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	    <li id="export-to-pdf"><a href=" {{ URL::to('getNPDF') }} ">Export to PDF</a></li>
	    <li><a href="#">Another action</a></li>
	    <li><a href="#">Something else here</a></li>
	    <li role="separator" class="divider"></li>
	    <li><a href="#">Separated link</a></li>
	  </ul>
	</div>
	<h3>Notice Index Page
	<a href=" {{ action('NoticeController@create' )}} " class="btn btn-primary btn-sm pull-right button_bottom"> Create New Notice </a></h3> <hr>
	<table class="table table-responsive table-bordered table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($notices as $notice)
				<tr>
				    <td>
						  {{ $notice->id }}
				    </td>
					<td>
						  {{ substr(Strip_tags($notice->title), 0 , 50) }} {{ strlen(Strip_tags($notice->title)) > 50 ? "..." : "" }}
				    </td>
				    <td>
					   {{ substr(Strip_tags($notice->body), 0 , 60) }} {{ strlen(Strip_tags($notice->body)) > 60 ? "..." : "" }}
					</td>
					<td>
						<a href=" {{ route('notice.show', [$notice->id])}} " data-toggle="tooltip" data-placement="top" title="View data!" class="btn btn-primary btn-xs"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true" > </span> </a>

						<a href=" {{ route('notice.edit', [$notice->id])}} " data-toggle="tooltip" data-placement="top" title="Edit data!" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-pencil" aria-hidden="true" > </span> </a>

						<a href=" {{ route('notice.delete', [$notice->id])}}" data-toggle="tooltip" data-placement="top" title="Delete data!" class="btn btn-danger btn-xs" > <span class="glyphicon glyphicon-trash" aria-hidden="true" > </span> </a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script>
		$(document).ready(function(){
		$('[data-toggle = "tooltip"]').tooltip();
	});
	</script>
@endsection
