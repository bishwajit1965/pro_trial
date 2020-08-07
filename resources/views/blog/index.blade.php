@extends('master')
@section('title', '| Archive')
@section('content')
	<h2>Blog Archive </h2>
	@foreach($posts as $post)
	    <h2>{{ $post->title }}</h2>
	    <p><strong><i>Written by:</strong>  {{ $post->writer }}</i></p>
	    <a href="{{ action('PagesController@getIndex')}}"><img src="{{asset('images/' . $post->image)}}" alt="" style="width:80px; height:80px; float:left; margin-right:10px; background-color:#FFF; border:2px solid#ABABAB; padding:3px;"></a>
	    <p>{{ substr(Strip_tags($post->body), 0 , 300) }} {{ strlen(Strip_tags($post->body)) > 300 ? "..." : "" }}
	    </p>
	    <p>
	    	<strong> Posted on:</strong> {{ $post->created_at }} <strong> || Updated at:</strong> {{ $post->updated_at }}
	    	<a href="{{url('blog/' . $post->slug)}}" class="btn btn-primary btn-xs pull-right shadow">Read More</a>
		</p>
	    <hr>
	@endforeach
<div class="text-center">
    {{ $posts->links() }}
</div>
@endsection




