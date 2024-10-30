<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $data = Kategori::all(); // Mengambil semua data kategori
        return view('kategori.index', compact('data')); // Mengembalikan view dengan data kategori
    }

    /**
     * Menampilkan form untuk menambah kategori baru.
     */
    public function create()
    {
        return view('kategori.create'); // Mengembalikan view untuk menambah kategori baru
    }

    /**
     * Menyimpan kategori baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $this->validate($request, [
            'nama' => 'required|min:3',
        ]);

        // Membuat kategori baru dengan data dari request
        Kategori::create([
            'nama' => $request->nama
        ]);

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Menampilkan form untuk mengedit kategori yang sudah ada.
     */
    public function edit(string $id)
    {
        $edid = Crypt::decrypt($id); // Mendekripsi ID kategori
        $data = Kategori::findOrFail($edid); // Mengambil data kategori atau gagal jika tidak ditemukan
        return view('kategori.edit', compact('data')); // Mengembalikan view dengan data kategori
    }

    /**
     * Memperbarui data kategori yang sudah ada.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari request
        $this->validate($request, [
            'nama' => 'required|min:5',
        ]);

        // Temukan kategori berdasarkan ID yang telah didekripsi
        $data = Kategori::findOrFail($id); // Mengambil data kategori atau gagal jika tidak ditemukan
        $data->update([
            'nama' => $request->nama
        ]);

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Menghapus kategori berdasarkan ID yang telah dienkripsi.
     */
    public function destroy(string $id)
    {
        $edid = Crypt::decrypt($id); // Mendekripsi ID kategori
        $data = Kategori::findOrFail($edid); // Mengambil data kategori atau gagal jika tidak ditemukan
        $data->delete(); // Menghapus data kategori

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
