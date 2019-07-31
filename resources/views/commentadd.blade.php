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

          <article class="media">
            <figure class="media-left">  </figure>
            <div class="media-content">
              <form method="POST" action="/blogs/{{ $blog->id }}/savecomment">
                @csrf
                  <div class="field">
                    <p class="control">
                      <textarea class="textarea @error('new_comment') is-danger @enderror" name="new_comment" placeholder="Add a new comment..." required></textarea>
                    </p>

                    @error('new_comment')
                        <div class="has-text-danger">Need to input some comments</div>
                    @enderror

                  </div>
                  <div class="field">
                    <p class="control">
                      <button type="submit" class="button is-primary">Post comment</button>
                    </p>
                  </div>
              </form>
            </div>
          </article>

        </div>
      </article>

@endsection
