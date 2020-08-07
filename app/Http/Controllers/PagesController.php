<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Notice;
use App\Tag;
use App\Comment;
use Image;
use Storage;
use Session;
use DB;
use Mail;

Class PagesController extends Controller{

    /**
     * [getIndex description]
     * @return [type] [description]
     */
		public function getIndex(){
    		$posts 	= Post::latest()->paginate(5);
			$notices = Notice::latest()->paginate(3);
            $tags    = Tag::all();
	    return view('pages.welcome')->with('posts', $posts)->with('notices', $notices)->with('tags', $tags);
		}

    /**
     * [getAbout description]
     * @return \Illuminate\Http\Response
     */
		public function getAbout(){

			return view('pages.about');
		}

    /**
     * [getContact description]
     * @return [type] [description]
     */
	public function getContact(){
		return view('pages.contact');
	}
    /**
     * [gettagPost description]
     * @return [type] [description]
     */
    public function gettagPost(){
        $tags = Tag::all();
        return view('pages.tagPost')->with('tags', $tags);
    }
    /**
     * [gettagPostShow description]
     * @return [type] [description]
     */
    public function gettagPostShow($id){
        $tag = Tag::find($id);
        $posts = Post::all();
        return view('pages.tagPostShow')->with('tag', $tag)->with('posts', $posts);
    }

    public function gettagSingle($id){
        $tag = Tag::find($id);
        $post = Post::find($id);
        return view('pages.tagSingle')->with('tag', $tag)->with('post', $post);
    }

    /**
     * [postContact description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postContact(Request $request){
        $this->validate($request,[
                'subject' =>'min:3',
                'email' => 'required|email',
                'message'=>'required|min:10|max:1000'
        ]);

        $data = array(
              'email' => $request->email,
              'subject' => $request->subject,
              'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
              $message->from($data['email']);
              $message->to('paul.bishwajit09@gmail.com');
              $message->subject($data['subject']);
        });
        Session::flash('success', 'Your email has been sent successfully!');
        return redirect()->action('PagesController@getIndex');
    }

    /**
     * [getNotice description]
     * @return [type] [description]
     */

	public function getNotice()
	{
		return view('notice.show');
	}

	/**
	 * [The following code will search desired post]
	 * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
	 */

	public function search(Request $request)
    {
        if($request->ajax())
        {
        $output = "";
        $posts = DB::table('posts')
                ->where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('writer', 'LIKE', '%' . $request->search . '%')->get();
        if($posts)
            {
              foreach($posts as $key => $post)
                {
                  $output .=
                    '<tr>'.
                        '<td>' .$post->id. '</td>'.
                        '<td>' .$post->title. '</td>'.
                        '<td>' .$post->writer. '</td>'.
                        '<td>' .$post->body. '</td>'.
                        '<td>' .$post->created_at. '</td>'.
                    '</tr>';
                }
                return Response($output);
            }
        }
    }

}
