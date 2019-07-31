@extends('app.layout')

@section('content')

      <div class="columns">
        <div class="column">
          <h1 style="padding-bottom: 10px;"> All of {{ strtoupper( Auth::user()->name ) }}&#39;s Blogs </h1>
        </div>
        <div class="column has-text-right">
          <a class="button is-text" href="/blog/create">New Blog</a>
        </div>
      </div>
      @foreach( $myblogs as $blog )
        <article class="media">
          <div class="media-content">
            <div class="content">

              <p>
                  <a href="/blogs/{{ $blog->id }}"><strong>{{ $blog->title }}</strong></a>
              </p>

            </div>

          </div>
          <div class="media-right">
            <a class="icon" href="/blog/delete/{{ $blog->id }}" style="color:red;"><i class="fas fa-trash-alt"></i></a>
          </div>
        </article>
      @endforeach

@endsection
