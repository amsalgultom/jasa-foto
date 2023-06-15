
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
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <nav id="navbar-auth" class="navbar navbar-auth">
        <ul>
          <li><a href="">Login</a></li>
          <li><a href="">Register</a></li>   
        </ul>
        
        <i class="bi bi-person mobile-nav-auth-toggle"></i>
      </nav><!-- .navbar -->

      <div class="logo text-center"><a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a></div>

    </div>
  </header><!-- End Header -->