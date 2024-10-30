<?php

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Distributor;
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

    $stok = Barang::sum('stok'); // Menghitung total stok barang
    $distributor = Distributor::all()->count(); // Menghitung jumlah distributor
    $barang = Barang::all()->count(); //Minghutungn total jenis barang
    $total = Barang::all()->sum(function ($item) {
        return $item->harga * $item->stok; // Menghitung total nilai semua barang (harga * stok)
    });
    return view('index', ['stok' => $stok, 'distributor' => $distributor, 'barang' => $barang, 'total' => $total]);
    //pasring data ke view
})->name('/');
// Route untuk resource controller
Route::resource('/kategori', 'App\Http\Controllers\KategoriController');
Route::resource('/barang', 'App\Http\Controllers\BarangController');
Route::resource('/distributor', 'App\Http\Controllers\DistributorController');
// Route::resource('/stok', 'App\Http\Controllers\StokController');
