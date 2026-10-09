<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BarangController::class, 'index'])->name('barang.index');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah/{barang}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::post('/keranjang/kurang/{barang}', [KeranjangController::class, 'kurang'])->name('keranjang.kurang');
Route::post('/keranjang/hapus/{barang}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
Route::post('/keranjang/kosongkan', [KeranjangController::class, 'kosongkan'])->name('keranjang.kosongkan');