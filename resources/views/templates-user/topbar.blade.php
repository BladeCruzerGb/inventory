<div class="collapse navbar-collapse order-3" id="navbarCollapse">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="{{ route('rtu') }}" class="nav-link {{ Request::is('user/rtu') ? 'active' : '' }}">Stock</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('intool.index') }}" class="nav-link {{ Request::is('user/intool*') ? 'active' : '' }}">Input Tool</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('bat.index') }}" class="nav-link {{ Request::is('user/bat*') ? 'active' : '' }}">BAT</a>
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