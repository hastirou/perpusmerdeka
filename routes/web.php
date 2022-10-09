<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

#Router Frontend
Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('index');

    #Router Frontend Data Buku & Pinjam Buku
    Route::get('/detailbuku/{id}', [App\Http\Controllers\Frontend\DatabukuController::class, 'detail'])->name('detail');
    Route::get('/databuku/pinjambuku/{id}', [App\Http\Controllers\Frontend\DatabukuController::class, 'pinjambuku'])->name('pinjambuku')->middleware('auth');
    Route::post('/databuku/pinjambuku/store', [App\Http\Controllers\Frontend\DatabukuController::class, 'store'])->name('pinjambuku.store');
    Route::get('/datapinjamanuser', [App\Http\Controllers\Frontend\DatabukuController::class, 'datapinjamanuser'])->name('datapinjamanuser')->middleware('auth');
    Route::get('/datapinjamanuser/detail/{id}', [App\Http\Controllers\Frontend\DatabukuController::class, 'detailpinjaman'])->name('detailpinjaman');

Auth::routes();

#Router Backend
Route::group(['middleware'=>['hakakses:pegawai'],'prefix'=>'admin'],function() {

    Route::get('/', [App\Http\Controllers\Backend\PanelController::class, 'index'])->name('index'); 
    
    #Backend Master (Kategori)
    Route::get('/master/kategori', [App\Http\Controllers\Backend\Master\KategoriController::class, 'index'])->name('index');
    Route::get('/master/kategori/create', [App\Http\Controllers\Backend\Master\KategoriController::class, 'create'])->name('create');
    Route::post('/master/kategori/store', [App\Http\Controllers\Backend\Master\KategoriController::class, 'store'])->name('masterkategori.store');
    Route::get('/master/kategori/edit/{id}', [App\Http\Controllers\Backend\Master\KategoriController::class, 'edit'])->name('edit');
    Route::post('/master/kategori/update', [App\Http\Controllers\Backend\Master\KategoriController::class, 'update'])->name('masterkategori.update');
    Route::get('/master/kategori/hapus/{id}', [App\Http\Controllers\Backend\Master\KategoriController::class, 'hapus'])->name('hapus');

    #Backend Data Buku
    Route::get('/databuku', [App\Http\Controllers\Backend\DatabukuController::class, 'index'])->name('index');
    Route::get('/databuku/create', [App\Http\Controllers\Backend\DatabukuController::class, 'create'])->name('create');
    Route::post('/databuku/store', [App\Http\Controllers\Backend\DatabukuController::class, 'store'])->name('databuku.store');
    Route::get('/databuku/edit/{id}', [App\Http\Controllers\Backend\DatabukuController::class, 'edit'])->name('edit');
    Route::post('/databuku/update', [App\Http\Controllers\Backend\DatabukuController::class, 'update'])->name('databuku.update');
    Route::get('/databuku/hapus/{id}', [App\Http\Controllers\Backend\DatabukuController::class, 'hapus'])->name('hapus');
    Route::get('/databuku/detail/{id}', [App\Http\Controllers\Backend\DatabukuController::class, 'detail'])->name('detail');

    #Backend Data Pinjaman
    Route::get('/datapinjaman', [App\Http\Controllers\Backend\DatapinjamanController::class, 'index'])->name('index');
    Route::get('/datapinjaman/detail/{id}', [App\Http\Controllers\Backend\DatapinjamanController::class, 'detail'])->name('detail');
    Route::get('/datapinjaman/tolak/{id}', [App\Http\Controllers\Backend\DatapinjamanController::class, 'tolak'])->name('tolak');
    Route::get('/datapinjaman/terima/{id}', [App\Http\Controllers\Backend\DatapinjamanController::class, 'terima'])->name('terima');
    Route::get('/datapinjaman/diterima/selesai/{id}', [App\Http\Controllers\Backend\DatapinjamanController::class, 'prosesselesai'])->name('prosesselesai');
    Route::get('/datapinjaman/diterima/selesai', [App\Http\Controllers\Backend\DatapinjamanController::class, 'selesai'])->name('selesai');
    Route::get('/datapinjaman/diterima', [App\Http\Controllers\Backend\DatapinjamanController::class, 'diterima'])->name('diterima');
    Route::get('/datapinjaman/ditolak', [App\Http\Controllers\Backend\DatapinjamanController::class, 'diterima'])->name('diterima');

    #Backend Manajemen User
    Route::get('/manajemenuser', [App\Http\Controllers\Backend\ManajemenuserController::class, 'index'])->name('index');
    Route::get('/manajemenuser/create/', [App\Http\Controllers\Backend\ManajemenUserController::class, 'create'])->name('create');
    Route::post('/manajemenuser/store', [App\Http\Controllers\Backend\ManajemenUserController::class, 'store'])->name('manajemenuser.store');
    Route::get('/manajemenuser/edit/{id}', [App\Http\Controllers\Backend\ManajemenUserController::class, 'edit'])->name('edit');
    Route::post('/manajemenuser/update', [App\Http\Controllers\Backend\ManajemenUserController::class, 'update'])->name('manajemenuser.update');
    Route::get('/manajemenuser/hapus/{id}', [App\Http\Controllers\Backend\ManajemenUserController::class, 'hapus'])->name('hapus');

});
