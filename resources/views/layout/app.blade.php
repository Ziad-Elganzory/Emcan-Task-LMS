<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    {{-- NavBar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">LMS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('courses.index')}}">All Courses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('user.courses')}}">Enrollments</a>
              </li>
            </ul>
            <form class="d-flex" method="GET" action="{{ route('courses.search') }}">
              <input class="form-control me-2" type="search" name="query" placeholder="Search by ID, Name, or Description" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          @if(Auth::check())
          <div class="btn-group mx-4">
            <button class="btn btn-outlined-secondary btn-md dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu">
              <li>
                <x-dropdown-link :href="route('profile.edit')" style="text-decoration: none ; color:black">
                  {{ __('Profile') }}
              </x-dropdown-link>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-dropdown-link :href="route('logout')" style="text-decoration: none ; color:black"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                      {{ __('Log Out') }}
                  </x-dropdown-link>
              </form>
              </li>
            </ul>
          </div>
          @else
            <div class="mx-3">
              <a href="{{route('login')}}">             
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
              </a>
              <a href="{{route('register')}}">
                <button type="button" class="btn btn-outline-primary">Register</button>
              </a>
            </div>
          @endif
          </div>
        </div>
      </nav>

      <div class="container mt-4">
        @yield('content')
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
  </html>