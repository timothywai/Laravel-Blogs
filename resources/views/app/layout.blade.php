<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>My Blog Site</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
            <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
            <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>

    </head>
    <body>
      <nav class="navbar" role="navigation" aria-label="main navigation">


        @guest
          <div class="navbar-end">
            <a class="navbar-item" href="{{ url('/blog/create') }}">
                New Blog
            </a>
            <a class="navbar-item" href="{{ url('login') }}">
                Login
            </a>
              @if (Route::has('register'))
                <a class="navbar-item" href="{{ url('register') }}">
                    Register
                </a>
              @endif
            </div>
        @else
          <div class="navbar-end">
              <div class="navbar-item has-dropdown is-hoverable" style="padding: 0 50px 0 0;">
                  <a class="navbar-link">
                      {{ Auth::user()->name }}
                  </a>

                  <div class="navbar-dropdown">
                    <a class="navbar-item" href="{{ url('/blogs') }}">All Blogs</a>
                    <a class="navbar-item" href="{{ url('/blog/myblogs') }}">My Blogs</a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                    </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </div>
          </div>
        @endguest


      </nav>
      <section class="section">

              @yield('content')

      </section>
    </body>
</html>
