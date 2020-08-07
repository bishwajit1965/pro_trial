<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    public function getIndex()
    {
        $posts = Post::latest()->paginate(5);
        return view('blog.index', compact('posts', $posts));
    }

    public function getSingle($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('blog.single')->withPost($post);
    }
}
