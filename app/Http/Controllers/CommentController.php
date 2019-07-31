<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);

    }



    public function index(Blog $blog)
    {
      //  $blog = Blog::find($id);

      return view ('commentpage', ['blog' => $blog]);

        // var_dump($blog);

        // dd($blog);
    }

    public function create(Blog $blog)
    {
      // $blog = Blog::find($id);

      return view ('commentadd', ['blog' => $blog]);
    }

    public function store(Blog $blog, Request $request)
    {
      $request->validate([
        'new_comment' => 'required|max:255',
      ]);

      $blog->addComment($request->new_comment);

      return redirect('/blogs/'.$blog->id);

//      $comment = New Comment;
//      $comment->comment = $request->new_comment;

      // dd($blog->id);
//      $comment->blog_id = $blog->id;

//      $comment->save();

//      return redirect('/blogs/'.$blog->id);
    }
}
