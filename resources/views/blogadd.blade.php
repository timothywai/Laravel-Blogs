@extends('app.layout')

@section('content')

      <h1 style="padding-bottom: 10px;"> Add New Blog </h1>

      <form method="POST" action="/blog/store">
        @csrf
        <div class="field">
            <label class="label">Blog Title</label>
            <div class="control">
              <input class="input @error('title') is-danger @enderror" name="title" type="text" placeholder="Blog title" value="{{ old('title') }}" required>

              @error('title')
                  <div class="has-text-danger">{{ $message }}</div>
              @enderror

            </div>
        </div>

        <div class="field">
          <label class="label">Content</label>
          <div class="control">
            <textarea class="textarea @error('content') is-danger @enderror" name="content" placeholder="Blog content ...." required>{{ old('content') }}</textarea>

            @error('content')
                <div class="has-text-danger">{{ $message }}</div>
            @enderror

          </div>
        </div>

        <div class="field is-grouped">
          <p class="control">
            <button type="submit" class="button is-primary">Add Blog</button>
          </p>
          <div class="control">
            <a class="button is-text" href="{{ url()->previous() }}">Cancel</a>
          </div>
        </div>
      </form>


@endsection
