@extends('master')
@section('title', ' | dashboard')
@section('content')
	<div class="row">
		<div class="col-md-12 panel">
			<div class="left-menu ">
				<div class="col-md-3 items">
					<h2 style="background-color:#ababab;">Admin Panel</h2>
					<div class="menus ">
						<div id="flip">Posts Management <span class="caret"></span></div>
						<div id="panel">
						    <li><a href="">Bangladesh</a></li>
						 	<li><a href="">Pakistan</a></li>
						 	<li><a href="">India</a></li>
						 	<li><a href="">Nepal</a></li>
						 	<li><a href="">Bhutan</a></li>
						 	<li><a href="">Indonesia</a></li>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 middle_column">
				<h2>Middle</h2>


			</div>
			<div class="col-md-3">
					<h2>Right</h2>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
		    $("#flip").click(function(){
		    $("#panel").slideToggle("slow");
			});
		});
	</script>
@endsection
