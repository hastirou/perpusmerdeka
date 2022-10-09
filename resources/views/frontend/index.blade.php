<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PERPUS UNMER</title>
  </head>
  <body>

    <section style="margin: 50px 20px; text-align:center;">
        <h1 >Perpustakaan Universitas Merdeka Malang</h1>
        </section>

    <div style="margin: 50px 100px 20px 100px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">PERPUS UNMER</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Halaman Utama <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/datapinjamanuser">Data Buku yang Dipinjam </a>
            </li>
            {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kategori
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> --}}
            @if(Auth::user() && Auth::user()->id)
              @if(Auth::user()->roleId != '1')
              <li class="nav-item"><a class="nav-link" href="/admin">Admin Panel </a></li>
              @endif
              <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form></li>
              @else
              <li class="nav-item"><a class="nav-link" href="/login">Masuk </a></li>
              <li class="nav-item"><a class="nav-link" href="/register">Daftar </a></li>
              @endif
              
          </ul>
        </div>
      </nav>
    </div>

    <div class="container">
      <div class="row">
        @foreach($databuku as $dat)
        <div class="col-lg-4 d-flex align-items-stretch" style="margin: 20px 0px;">
            <div class="card" style="width: 18rem;">
        <img src="{{ asset('/data_buku/'.$dat->File)}}" class="card-img-top" alt="Gambar Buku">
        <div class="card-body">
          <h5 class="card-title">{{ $dat->JudulBuku }}</h5>
          <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="card-text">{{ $dat->TentangBuku }}</p>
          <a href={{ url('/detailbuku/'.$dat->KodeBuku) }} class="btn btn-primary">Detail / Pinjam Buku</a>
        </div>
      </div>
    </div>
    @endforeach
    </div>
    </div>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>