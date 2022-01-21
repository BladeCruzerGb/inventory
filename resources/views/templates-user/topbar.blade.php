<div class="collapse navbar-collapse order-3" id="navbarCollapse">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item dropdown {{ Request::is('user/rtu') ? 'active' : '' }}">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"> Stock </a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="{{ route('rtu') }}" class="dropdown-item {{ Request::is('user/rtu') ? 'active' : '' }}">RTU <i class="fas fa-cart-plus float-right"></i></a></li>
          <li><a href="#" class="dropdown-item">Drawer <i class="fas fa-briefcase float-right"></i></a></li>
          <li><a href="#" class="dropdown-item">WAHO <i class="fas fa-warehouse float-right"></i></a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{ route('intool.index') }}" class="nav-link {{ Request::is('user/intool*') ? 'active' : '' }}">Input Tool</a>
      </li>
    
    </ul>
  </div>
  <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
    <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="#" class="dropdown-item"><i class="fas fa-envelope mr-2"></i> Profile </a></li>
          <li><a href="/logout" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> Logout </a></li>
        </ul>
      </li>
  </ul>