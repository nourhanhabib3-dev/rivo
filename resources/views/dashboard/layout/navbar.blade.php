
    <!-- ========== MAIN ========== -->
    <div class="rivo-main">
      <!-- Navbar -->
      <header class="rivo-navbar">
        <button id="sidebarToggle" class="rivo-navbar__toggle" type="button" aria-label="Toggle sidebar">
          <i class="bi bi-list"></i>
        </button>
        <div class="rivo-navbar__search">
          <i class="bi bi-search"></i>
          <input type="search" placeholder="Search anything..." aria-label="Search">
        </div>
        <div class="rivo-navbar__actions">
          <div class="dropdown">
            <button class="rivo-navbar__btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-bell"></i>
              <span class="rivo-navbar__badge"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end rivo-dropdown-menu">
              <li><h6 class="dropdown-header">Notifications</h6></li>
              <li>
                <a class="dropdown-item rivo-notification" href="#">
                  <div class="rivo-notification__icon success"><i class="bi bi-check-circle"></i></div>
                  <div>
                    <div class="rivo-notification__title">New order received</div>
                    <div class="rivo-notification__time">2 minutes ago</div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item rivo-notification" href="#">
                  <div class="rivo-notification__icon warning"><i class="bi bi-exclamation-triangle"></i></div>
                  <div>
                    <div class="rivo-notification__title">Low stock alert</div>
                    <div class="rivo-notification__time">1 hour ago</div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item rivo-notification" href="#">
                  <div class="rivo-notification__icon info"><i class="bi bi-person-plus"></i></div>
                  <div>
                    <div class="rivo-notification__title">New user registered</div>
                    <div class="rivo-notification__time">3 hours ago</div>
                  </div>
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-center small" href="#">View all notifications</a></li>
            </ul>
          </div>
          <div class="dropdown">
            <button class="rivo-navbar__profile dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{asset("storage/".Auth::guard('dash')->user()->img)}}" alt="Admin">
              <div class="rivo-navbar__profile-info">
                <div class="rivo-navbar__profile-name">{{Auth::guard('dash')->user()->name}}</div>
                <div class="rivo-navbar__profile-role">{{Auth::guard('dash')->user()->role}}</div>
              </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end rivo-dropdown-menu">
              <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>My Profile</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('logout.admin')}}"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
            </ul>
          </div>
        </div>
      </header>
