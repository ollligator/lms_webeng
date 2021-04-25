<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">LMS Main</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @if(!Auth::check())
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/contact">Contact</a>
            </li>
            @elseif(Auth::user()->is_teacher)
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/subjects">My subjects</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('subjects.create')}}">New subject</a>
              </li>
            @else
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/subjects">My subjects</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('subjects.take')}}">Take a subject</a>
              </li>
            @endif
        </ul>
      </div>
    </div>
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @if(!Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        @else
        <li class="navbar-nav ml-auto">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>
        @endif
  </nav>

@guest
    <div class="jumbotron">
        <h1 class="display-4">Learning Management System</h1>
        <p class="lead">System for communication between teachers and students.</p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login &raquo;</a>
        <a class="btn btn-secondary btn-lg" href="{{ route('register') }}" role="button">Registration</a>
    </div>
@else
    <div class="container">
        @yield('content')
    </div>
@endguest


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
