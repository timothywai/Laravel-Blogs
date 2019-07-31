@extends('app.layout')

@section('content')


      <h1 style="padding-bottom: 10px;"> {{ $blog->title }} </h1>


      <article class="media">

        <div class="media-content">
          <div class="content">
            <p>{{ $blog->content }}</p>
          </div>


          @foreach( $blog->comments as $comment)
            <article class="media">
              <figure class="media-left"></figure>
              <div class="media-content">
                <div class="content">
                  <strong>Comment:</strong><br/>
                  {{ $comment->comment }}
                </div>
              </div>
            </article>
          @endforeach
          
          <br />
            <a href="/blogs/{{ $blog->id }}/addcomment" class="button is-link">Add Comment</a>

        </div>
      </article>

@endsection
