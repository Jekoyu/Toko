<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DistributorController extends Controller
{
    /**
     * Menampilkan daftar semua distributor.
     */
    public function index()
    {
        $data = Distributor::all(); // Mengambil semua data distributor
        return view('distributor.index', compact('data')); // Mengembalikan view dengan data distributor
    }

    /**
     * Menampilkan form untuk menambah distributor baru.
     */
    public function create()
    {
        return view('distributor.create'); // Mengembalikan view untuk menambah distributor baru
    }

    /**
     * Menyimpan distributor baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $this->validate($request, [
            'nama'     => 'required|min:3',
            'alamat'   => 'required|min:3',
            'telepon'  => 'required|numeric'
        ]);

        // Membuat distributor baru dengan data dari request
        Distributor::create([
            'nama'   => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);

        // Redirect ke halaman daftar distributor dengan pesan sukses
        return redirect()->route('distributor.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }



    /**
     * Menampilkan form untuk mengedit distributor yang sudah ada.
     */
    public function edit(string $id)
    {
        $edid = Crypt::decrypt($id); // Mendekripsi ID distributor
        $data = Distributor::findOrFail($edid); // Mengambil data distributor atau gagal jika tidak ditemukan
        return view('distributor.edit', compact('data')); // Mengembalikan view dengan data distributor
    }

    /**
     * Memperbarui data distributor yang sudah ada.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari request
        $this->validate($request, [
            'nama'     => 'required|min:3',
            'alamat'   => 'required|min:3',
            'telepon'  => 'required|numeric'
        ]);

        // Temukan distributor berdasarkan ID yang telah didekripsi
        $data = Distributor::findOrFail($id); // Mengambil data distributor atau gagal jika tidak ditemukan
        $data->update([
            'nama'   => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);

        // Redirect ke halaman daftar distributor dengan pesan sukses
        return redirect()->route('distributor.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Menghapus distributor berdasarkan ID yang telah dienkripsi.
     */
    public function destroy(string $id)
    {
        $edid = Crypt::decrypt($id); // Mendekripsi ID distributor
        $data = Distributor::findOrFail($edid); // Mengambil data distributor atau gagal jika tidak ditemukan
        $data->delete(); // Menghapus data distributor

        // Redirect ke halaman daftar distributor dengan pesan sukses
        return redirect()->route('distributor.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
