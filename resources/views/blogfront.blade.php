@extends('app.layout')

@section('content')

      <h1 style="padding-bottom: 10px;"> All Blogs </h1>
      @foreach( $allblogs as $blog )
        <article class="media">
          <div class="media-content">
            <div class="content">

              <p>
                  <a href="/blogs/{{ $blog->id }}"><strong>{{ $blog->title }}</strong></a>
              </p>
              
            </div>
          </div>
        </article>
      @endforeach

@endsection
