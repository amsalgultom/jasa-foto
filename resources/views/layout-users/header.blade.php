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

      @if (Auth::user())

      <div class="d-flex login">
      <a href="{{ route('order.service') }}">Buat Order</a>
      <a href="/myorderservices/{{ Auth::user()->id }}">Order Saya</a>
      <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
      </div>
      <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
        @csrf
      </form>
      @else
      <div class="d-flex login">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
      </div>
      @endif



      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->


    <div class="logo text-center"><a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a></div>

  </div>
</header><!-- End Header -->