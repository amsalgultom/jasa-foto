
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('home') }}">Photo Model</a></li>
          <li><a href="{{ route('home') }}">Product</a></li>
        </ul>
        <div class="d-flex login">
          <a href="{{ route('login') }}">Login</a>
          <a href="{{ route('register') }}">Register</a>
        </div>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      

      <div class="logo text-center"><a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a></div>

    </div>
  </header><!-- End Header -->