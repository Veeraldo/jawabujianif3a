<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DetailPinjamController;





Route::get('/', function () {
    return view('app'); 
})->name('app.blade.php');

Route::resource('anggota', AnggotaController::class);
Route::resource('buku', BukuController::class);
Route::resource('detailpinjam', DetailPinjamController::class);

Route::delete('/detailpinjam/{No_Pinjam}', [DetailPinjamController::class, 'destroy'])->name('detailpinjam.destroy');
// Menampilkan halaman edit dengan parameter No_Pinjam
Route::get('/detailpinjam/{No_Pinjam}/edit', [DetailPinjamController::class, 'edit'])->name('detailpinjam.edit');

// Untuk menyimpan update data
Route::put('/detailpinjam/{No_Pinjam}', [DetailPinjamController::class, 'update'])->name('detailpinjam.update');

Route::get('detailpinjam', [DetailPinjamController::class, 'index'])->name('detailpinjam.index');
Route::get('detailpinjam/create', [DetailPinjamController::class, 'create'])->name('detailpinjam.create');
Route::post('detailpinjam', [DetailPinjamController::class, 'store'])->name('detailpinjam.store');
Route::get('detailpinjam/{No_Pinjam}/edit', [DetailPinjamController::class, 'edit'])->name('detailpinjam.edit');
Route::put('detailpinjam/{No_Pinjam}', [DetailPinjamController::class, 'update'])->name('detailpinjam.update');
Route::delete('detailpinjam/{No_Pinjam}', [DetailPinjamController::class, 'destroy'])->name('detailpinjam.destroy');
Route::resource('detailpinjam', DetailPinjamController::class)->except(['show']);





