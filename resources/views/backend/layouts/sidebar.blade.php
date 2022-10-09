<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item {{ (request()->segment(2) == 'user') ? 'show menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/master/kategori" class="nav-link {{ Request::is('admin/master/kategori') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>     
              
              {{-- <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li> --}}
            </ul>
          </li>

          <li class="nav-item">
            <a href="/admin/databuku" class="nav-link {{ Request::is('admin/databuku') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Buku
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/datapinjaman" class="nav-link {{ Request::is('admin/datapinjaman') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Pinjaman Masuk
              </p>
            </a>
          </li>

        <li class="nav-item">
          <a href="/admin/manajemenuser" class="nav-link {{ Request::is('admin/manajemenuser') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Manajemen User
            </p>
          </a>
        </li>
        
        {{-- @if(Auth::user()->roleId == '3')
        <li class="nav-item">
          <a href="/admin/userbackend" class="nav-link {{ Request::is('admin/userbackend') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              User Backend
            </p>
          </a>
        </li>
        @endif --}}