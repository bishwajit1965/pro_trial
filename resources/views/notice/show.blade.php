@extends('master')
@section('title', '| Show Notice')

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
 <h2>Notice</h2> <hr>

	 <a href="{{ action('NoticeController@index') }}">
	 <h3>{{ $notice->title }}</h3></a> 
   <p>{{ $notice->body }}</p>
   <p><strong> Published on: </strong> {{ $notice->created_at }} </p>

@endsection
