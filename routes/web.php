<?php

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $kategori = Kategori::all()->count();
    $barang = Barang::all()->count();
    return view('index', ['kategori' => $kategori, 'barang' => $barang]);
})->name('/');

Route::resource('/kategori', 'App\Http\Controllers\KategoriController');
Route::resource('/barang', 'App\Http\Controllers\KategoriController');
Route::resource('/distributor', 'App\Http\Controllers\KategoriController');
Route::resource('/stok', 'App\Http\Controllers\KategoriController');
