<?php
use App\Http\Controllers\Anggota_Controller;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\detail_peminjaman_controller;
use Illuminate\Support\Facades\Route;

// Menambahkan route untuk halaman utama yang menggunakan app.blade.php
Route::get('/', function () {
    return view('app');  // Pastikan Anda memiliki view 'app.blade.php'
})->name('app');

// Resource routes untuk anggota, buku, dan detail peminjaman
Route::resource('anggota', Anggota_Controller::class);
Route::resource('buku', BukuController::class);
Route::resource('detailpeminjaman', detail_peminjaman_controller::class);
