<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"> {{Auth::user()->Username}}</i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          {{-- <a href="/admin/tentangakun" class="dropdown-item">
            <i class="fa fa-user mr-2"></i> Tentang Akun</a>
          </a> --}}
          <form action="{{ route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">
            <i class="fa fa-door-open mr-2"></i> Keluar
          </button>
          </form>
          <div class="dropdown-divider"></div>
        </div>
      </li>

      
    </ul>
  </nav>
  <!-- /.navbar -->