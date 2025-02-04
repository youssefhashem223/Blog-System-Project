<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>nav</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('posts.index') }}">Youssef's Blog System</a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="{{ route('posts.index') }}">All Posts</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#">{{ Auth::user()->name }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger fw-semibold" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="{{ route('register') }}">Register</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>


  <!-- ================================== -->
  <!-- <nav class="navbar navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="{{ route('posts.index') }}">Youssef's Blog System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}">All Posts</a></li>
          @auth
          <li class="nav-item"><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
          @else
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
          @endauth
        </ul>
      </div>
    </div>
  </nav> -->
</body>

</html>