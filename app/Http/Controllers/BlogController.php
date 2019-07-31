<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\Comment;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);

    }

    public function index()
    {

        $blogs = Blog::all();

        return view ('blogfront', ['allblogs' => $blogs]);

        // var_dump($blogs);
    }

    public function create()
    {
      return view ('blogadd');
    }

    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required|max:255',
        'content' => 'required|max:255',
      ]);

  //    Blog::create([
  //      'title' => $request->title,
  //      'content' => $request->content,
  //      'user_id' => Auth::id()
  //    ]);

  //    return redirect('/blog/myblogs');

      $blog = new Blog;

      $blog->title = $request->title;
      $blog->content = $request->content;
      $blog->user_id = Auth::id();

      $blog->save();

      return redirect('/blog/myblogs');

    }

    public function search()
    {
        $id = Auth::id();

        $blogs = Blog::where('user_id', $id)->get();

        // $blogs = auth()->user()->Blog;

        return view ('blogview', ['myblogs' => $blogs]);
    }

    public function remove(Blog $blog)
    {
      // $blog = Blog::findOrFail($id);

      $comments = $blog->comments;

      // dd($blog->comments);

      if ( sizeof($comments)){
          $ArrySize = sizeof($comments);
          for ($i = 0 ; $i < $ArrySize; $i++)
          {
            $comments[$i]->where('id', $comments[$i]->id)->delete();
          }

      }

        $blog->delete();
        return redirect('/blog/myblogs');
    }
}
