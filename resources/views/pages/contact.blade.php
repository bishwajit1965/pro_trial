@extends('master')

@section('title','| Contact Page')

@section('content')

	<div class="row">
	    <div class="col-md-6 col-md-offset-3">
	        <h1>Contact Me</h1>
	        <form action=" {{ url('contact') }}" method="POST" >
            {{ csrf_field() }}
	            <div class="form-group">
	                <label for="Email">Email:</label>
	                <input type="text" id="email" name="email" class="form-control">
	            </div>

	            <div class="form-group">
	                <label for="subject">Subject:</label>
	                <input type="text" id="subject" name="subject" class="form-control">
	            </div>

	            <div class="form-group">
	                <label for="message">Message:</label>
	                <textarea type="text" id="subject" name="message" class="form-control"></textarea>
	            </div>
	            <input type="submit" value="Send Message" class="btn btn-primary btn-sm " >
	        </form>
	    </div>
    </div>

@endsection
