<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="{{ route('tool.index') }}" class="nav-link {{ Request::is('admin/tool*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tools"></i>
        <p>
          Tool
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('intool.index') }}" class="nav-link {{ Request::is('admin/intool*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tools"></i>
        <p>
          Input Tool
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/logout" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
</ul>