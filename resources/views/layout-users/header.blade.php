<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">


    <!-- Uncomment below if you prefer to use an image logo -->
    <nav id="navbar-user" class="navbar-user">
      <ul>
        <li><a class="active" href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('home') }}">Photo Model</a></li>
        <li><a href="{{ route('home') }}">Product</a></li>
        <li><a href="{{ route('ourservices') }}">Our Services</a></li>
        <hr>
        @if (Auth::user())
        <div class="d-flex w-100 justify-content-right none-dflex-mobile">
          <li><a href="{{ route('order.service') }}">Buat Order</a></li>
          <li><a href="/myorderservices/{{ Auth::user()->id }}">Order Saya</a></li>   
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>   
          <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
          @csrf
          </form>
        </div>

        </ul>
        @else
        <div class="d-flex w-100 justify-content-right none-dflex-mobile">
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>   
        </div>
      </ul>
      @endif
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    

    <nav id="navbar-auth" class="navbar navbar-auth">
        @if (Auth::user() && Auth::user()->role == 'client')

        <ul>
          <li><a href="{{ route('order.service') }}">Buat Order</a></li>
          <li><a href="/myorderservices/{{ Auth::user()->id }}">Order Saya</a></li>   
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>   
          <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
          @csrf
          </form>
        </ul>
      
        @elseif(Auth::user() && Auth::user()->role == 'admin')
        <ul>
          <li><a href="{{ route('dashboard') }}">My Admin</a></li>
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>   
          <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
          @csrf
          </form>
        </ul>
        @else

        <ul>
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>   
        </ul>
        @endif
        <i class="bi bi-person mobile-nav-auth-toggle"></i>
      </nav>.navbar -->

    <div class="logo text-center"><a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a></div>

  </div>
</header><!-- End Header -->

