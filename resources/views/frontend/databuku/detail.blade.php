@extends('frontend.layouts.index')
@section('content')

@foreach ($databuku as $dat) 
<div class="card text-center" style="margin: 50px 100px;">
    <div class="card-header">
        <h1>{{ $dat->JudulBuku }}</h1>
    </div>
    <br/>
    <img src="{{ asset('/data_buku/'.$dat->File)}}" style="width:100%; max-width:300px;" class="rounded mx-auto d-block" alt="Gambar Buku">
    <div class="card-body">
        <p class="card-text">{{ $dat->TentangBuku }}</p>
        <a href="{{ url('/databuku/pinjambuku/'.$dat->KodeBuku) }}" class="btn btn-primary">Pinjam Buku</a>
    </div>
    <div class="card-footer text-muted">
        Diupload pada {{ $dat->created_at }}
    </div>
</div>
@endforeach

@endsection