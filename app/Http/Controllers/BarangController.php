<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Distributor;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BarangController extends Controller
{
    // Menampilkan daftar semua barang beserta kategori dan distributor
    public function index()
    {
        $data = Barang::with(['kategori', 'distributor'])->get(); // Mengambil data barang dengan relasi kategori dan distributor
        return view('barang.index', ['data' => $data]); // Mengembalikan view dengan data barang
    }


    // Menampilkan form untuk menambah barang baru
    public function create()
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori
        $distributor = Distributor::all(); // Mengambil semua distributor
        return view('barang.create', ['kategoris' => $kategoris, 'distributors' => $distributor]); // Mengembalikan view dengan kategori dan distributor
    }


    // Menyimpan data barang baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
            'distributor_id' => 'required|exists:distributors,id',
        ]);

        // Membuat barang baru dengan data dari request
        Barang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'distributor_id' => $request->distributor_id,
        ]);

        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }


    // Menampilkan detail barang tertentu berdasarkan ID yang telah dienkripsi
    public function show(string $id)
    {
        $edid = Crypt::decrypt($id); // Mendekripsi ID barang

        // Temukan barang berdasarkan ID yang telah didekripsi
        $data = Barang::findOrFail($edid); // Mengambil data barang atau gagal jika tidak ditemukan

        // Kembalikan view dengan data barang
        return view('barang.show', compact('data'));
    }


    // Menampilkan form untuk mengedit barang yang sudah ada
    public function edit(string $id)
    {
        $edid = Crypt::decrypt($id); // Mendekripsi ID barang

        // Ambil data barang berdasarkan ID yang telah didekripsi
        $data = Barang::findOrFail($edid); // Mengambil data barang atau gagal jika tidak ditemukan

        // Ambil semua kategori dan distributor
        $kategoris = Kategori::all(); // Mengambil semua kategori
        $distributors = Distributor::all(); // Mengambil semua distributor

        // Kembalikan view dengan data barang, kategori, dan distributor
        return view('barang.edit', compact('data', 'kategoris', 'distributors'));
    }


    // Memperbarui data barang yang sudah ada
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
            'distributor_id' => 'required|exists:distributors,id',
        ]);

        // Temukan barang berdasarkan ID yang telah didekripsi
        $data = Barang::findOrFail($id); // Mengambil data barang atau gagal jika tidak ditemukan

        // Perbarui data barang
        $data->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'distributor_id' => $request->distributor_id,
        ]);

        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus barang berdasarkan ID yang telah dienkripsi
    public function destroy(string $id)
    {
        $edid = Crypt::decrypt($id); // Mendekripsi ID barang
        $data = Barang::findOrFail($edid); // Mengambil data barang atau gagal jika tidak ditemukan
        $data->delete(); // Menghapus data barang

        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
