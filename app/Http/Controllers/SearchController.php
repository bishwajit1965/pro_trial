<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.search');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $posts = DB::table('posts')
                ->where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('writer', 'LIKE', '%' . $request->search . '%')->get();
            if ($posts) {
                foreach ($posts as $key => $post) {
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
