
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('/')}}" class="brand-link">
      <img src="{{asset('assets/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KitSet by Lenymode</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('/')}}" class="d-block">{{auth()->user()->name}}</a>
        </div>
        <x:notify-messages />
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                {{-- dashboard --}}
            <li class="nav-header">DASHBOARD</li>
            <li class="nav-item">
              <a href="{{route('dashboard.index')}}" class="nav-link {{ (request()->is('admin/dashboard*') ? 'active' : '') }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-header">MANAGEMENTS</li>
            <li class="nav-item has-treeview {{ (request()->is('admin/user*') ? 'menu-open' : '') }}">
              <a href="#" class="nav-link {{ (request()->is('admin/user*') ? 'active' : '') }}">
                <i class="nav-icon fa-regular fa-user"></i>
                  <p>User Managemnet<i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('users.index')}}" class="nav-link {{ (request()->is('admin/users*') ? 'active' : '') }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Users</p>
                      </a>
                  </li>
              </ul>
            </li>
            
            <li class="nav-item has-treeview {{ (request()->is('admin/acl*') ? 'menu-open' : '') }}">
              <a href="#" class="nav-link {{ (request()->is('admin/acl*') ? 'active' : '') }}">
                <i class=" nav-icon fa-solid fa-user-shield"></i>
                  <p>ACL Managemnet<i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('permissions.index')}}" class="nav-link {{ (request()->is('admin/acl/permissions*') ? 'active' : '') }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Manage Permissions</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('roles.index')}}" class="nav-link {{ (request()->is('admin/acl/roles*') ? 'active' : '') }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Manage Role</p>
                      </a>
                  </li>
              </ul>
            </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>