<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use App\Notice;
use Image;
use Storage;
use Session;
use Purifier;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts', $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|min:5|max:255',
            'writer'=> 'required|min:3|max:255',
            'featured_image'=>'sometimes|image',
            'body'=>'required',
            'slug' =>' required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer'
        ));

        $post = new Post();
        $post->title = $request->title;
        $post->writer = $request->writer;
        $post->body = Purifier::clean($request->body);
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        if ($request->hasfile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image = $filename;
        }
        $post->save();
        $post->tag()->sync($request->tags, false);
        Session::flash('success', 'Data has been saved successfully!');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post', $post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request, array(
            'title' => 'required|max:255',
            'writer'=> 'required|max:255',
            'featured_image'=> 'image',
            'body' =>  'required|max:3000',
            'slug' =>  "required|alpha_dash|min:5|max:255|unique:posts,slug, $id ",
            'category_id' => 'required|integer'
        ));
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->writer= $request->input('writer');
        $post->body = Purifier::clean($request->input('body'));
        $post->slug =$request->input('slug');
        $post->category_id = $request->input('category_id');

        //Add new featured image
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $post->image;
            //Update the featured image
            $post->image = $filename;
            //Delete the old image
            Storage::delete($oldFilename);
        }
        $post->save();
        //Problem in updating a post because tags get deleted but new tag/tags are not inserted
        if (isset($request->tags)) {
            $post->tag()->sync($request->tags);
        } else {
            $post->tag()->sync(array());
        }
        Session::flash('success', 'The post has successfully been updated!');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tag()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success', 'Data has been deleted successfully!');
        return redirect()->route('posts.index');
    }

    /**
     * [delete description]
     * @param  [type] $id [search by id]
     * @return [type]     [posts/delete blade will be loaded against named route in the route.php]
     */
    public function delete($id)
    {
        $post = Post::find($id);
        return view('posts.delete', compact('post', $post));
    }
}
