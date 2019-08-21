<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{ asset('admin/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Career Doctor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">{{auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('home')}}" class="nav-link {{Request::is('home') ? 'active' : ''}}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <!-- <i class="right fa fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <!-- menu-open -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{Request::is('addIndustry') ? 'active' : ''}}">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Industry
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addIndustry')}}" class="nav-link {{Request::is('addIndustry') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Industry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('industryList')}}" class="nav-link {{Request::is('industryList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Industry List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{Request::is('addCategory') ? 'active' : ''}}">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Category
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addCategory')}}" class="nav-link {{Request::is('addCategory') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categoryList')}}" class="nav-link {{Request::is('categoryList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>