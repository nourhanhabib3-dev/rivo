<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Rivo Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<body>
  <!-- Loading Animation -->
  <div id="rivoLoader" class="rivo-loader">
    <div class="rivo-loader__spinner"></div>
    <span class="rivo-loader__text">Loading Rivo...</span>
  </div>

  <div class="rivo-app">
    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebarOverlay" class="rivo-sidebar__overlay"></div>

    <!-- ========== SIDEBAR ========== -->
    <aside id="rivoSidebar" class="rivo-sidebar">
      <div class="rivo-sidebar__brand">
        <div class="rivo-sidebar__logo">R</div>
        <span class="rivo-sidebar__title">Rivo</span>
      </div>
      <nav class="rivo-sidebar__nav">
        <p class="rivo-sidebar__section-title">Main Menu</p>
        <ul class="rivo-nav__list">
          <li class="rivo-nav__item-dash">
            <a href="index.html" class="rivo-nav__link active">
              <i class="bi bi-grid-1x2-fill"></i>
              <span class="rivo-nav__text-dash">Dashboard</span>
            </a>
          </li>
          <li class="rivo-nav__item">
            <a href="{{route('dash.users.index')}}" class="rivo-nav__link {{request()->routeIs('dash.users.*') ? 'active' : ''}}">
              <i class="bi bi-people-fill"></i>
              <span class="rivo-nav__text">Users</span>
            </a>
          </li>
          <li class="rivo-nav__item">
            <a href="{{route('cat.index')}}" class="rivo-nav__link {{request()->routeIs('cat.*') ? 'active' : ''}}">
              <i class="bi bi-box-seam-fill"></i>
              <span class="rivo-nav__text">Category</span>
            </a>
          </li>
          <li class="rivo-nav__item">
            <a href="{{route('product.index')}}" class="rivo-nav__link {{request()->routeIs('product.*') ? 'active' : ''}}">
              <i class="bi bi-box-seam-fill"></i>
              <span class="rivo-nav__text">Products</span>
            </a>
          </li>
          <li class="rivo-nav__item">
            <a href="{{route('admin.index')}}" class="rivo-nav__link {{request()->routeIs('admin.*') ? 'active' : ''}}">
              <i class="bi bi-shield-lock-fill"></i>
              <span class="rivo-nav__text">Admins</span>
            </a>
          </li>
          <li class="rivo-nav__item">
            <a href="messages.html" class="rivo-nav__link">
              <i class="bi bi-chat-dots-fill"></i>
              <span class="rivo-nav__text">Messages</span>
            </a>
          </li>
          <li class="rivo-nav__item">
            <a href="orders.html" class="rivo-nav__link">
              <i class="bi bi-cart-check-fill"></i>
              <span class="rivo-nav__text">Orders</span>
            </a>
          </li>
        </ul>
        <p class="rivo-sidebar__section-title">Account</p>
        <ul class="rivo-nav__list">
          <li class="rivo-nav__item">
            <a href="login.html" class="rivo-nav__link logout-link">
              <i class="bi bi-box-arrow-right"></i>
              <span class="rivo-nav__text">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
