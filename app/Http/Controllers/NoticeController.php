<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Notice;

use Session;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::latest()->paginate(10);
        return view('notice.index')->with('notices', $notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.create');
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
                'body'  =>'required|min:5|max:3000'
            ));

        $notice = new Notice();
        $notice->title = $request->input('title');
        $notice->body = $request->input('body');
        $notice->save();

        Session::flash('success', 'Notice has been saved successfully!');
        return redirect()->route('notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::find($id);
        return view('notice.show')->with('notice', $notice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::find($id);
        return view('notice.edit')->with('notice', $notice);
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
        $notice = Notice::find($id);
        $this->validate($request, [
            'title' => 'required|min:5|max:255',
            'body'  => 'required|min:5|max:3000'
        ]);
        $notice->title = $request->input('title');
        $notice->body = $request->input('body');
        $notice->save();

        Session::flash('success', 'Notice has updated successfully!');
        return redirect()->route('notice.show', $notice->id);
    }

    public function delete($id)
    {
        $notice = Notice::find($id);
        return view('notice.delete')->with('notice', $notice);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        $notice->delete();

        Session::flash('success', 'Notice has been deleted successfully');
        return redirect()->route('notice.index');
    }
}
