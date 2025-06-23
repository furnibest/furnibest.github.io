<nav class="navbar navbar-expand-lg navbar-dark" style="background:#6c757d; box-shadow:0 2px 8px 0 rgba(0,0,0,0.04);">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:32px; margin-right:8px;"> Admin Panel
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="adminNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}"><i class="bi bi-box-seam"></i> Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}"><i class="bi bi-receipt"></i> Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"><i class="bi bi-people"></i> User</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="adminUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminUserDropdown">
            <li><a class="dropdown-item" href="{{ route('home') }}">Lihat Website</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item" type="submit">Logout</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> 