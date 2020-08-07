<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;
use App\Post;
use App\Blog;
use Session;

class CommentsController extends Controller
{
    public function __costruct()
    {
        $this->middleware('auth', ['except'=> 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {

        $this->validate($request, array(
                'name'      => 'required|min:5|max:255',
                'email'     => 'required|min:5|max:255',
                'comment'   => 'required|min:5|max:2500'
            ));

        $post = Post::find($post_id);
        $comment = new Comment();
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->approved = true;
        $comment->comment = $request->input('comment');
        // Comment against specific post
        $comment->post()->associate($post);
        $comment->save();
        Session::flash('success', 'Comment has successfully been saved!');
        return redirect()->route('blog.single', [$post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment', $comment));
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
        $comment = Comment::find($id);
        $this->validate($request, array(
            'comment' => 'required'
        ));
        $comment->comment = $request->comment;
        $comment->save();
        Session::flash('success', 'Comment has successfully been updated!');
        return redirect()->route('posts.show', $comment->post->id);
    }
    /**
     * Displays the view of delete page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments.delete', compact('comment', $comment));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;
        $comment->delete();
        Session::flash('success', 'Comment deleted successfully!');
        return redirect()->route('posts.show', $post_id);
    }
}
