<nav class="navbar navbar-expand-lg tokopedia-green tokopedia-navbar sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:36px; margin-right:8px;"> Cacam Furniture
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTokopedia" aria-controls="navbarTokopedia" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTokopedia">
      <form class="d-flex mx-auto" action="{{ route('products') }}" method="get" style="max-width:400px; width:100%;">
        <input class="form-control me-2 tokopedia-search" type="search" name="q" placeholder="Cari produk, kategori..." aria-label="Search">
        <button class="btn btn-light" type="submit" style="color:#03ac0e;">Cari</button>
      </form>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
        <li class="nav-item me-2">
          <a class="nav-link" href="{{ route('products') }}">Produk</a>
        </li>
        <li class="nav-item me-2">
          <a class="nav-link" href="{{ url('/cart') }}">
            <i class="bi bi-cart3" style="font-size:1.3rem;"></i> Keranjang
          </a>
        </li>
        @if(Auth::check())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
            <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item" type="submit">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Daftar</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
