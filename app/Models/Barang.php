<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = ['nama', 'harga', 'stok', 'kategori_id', 'distributor_id'];

    /**
     * Relasi ke model Kategori.
     * Setiap barang memiliki satu kategori.
     * Menggunakan foreign key 'kategori_id' untuk menghubungkan tabel barang dengan tabel kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Relasi ke model Distributor.
     * Setiap barang memiliki satu distributor.
     * Menggunakan foreign key 'distributor_id' untuk menghubungkan tabel barang dengan tabel distributor.
     */
    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'distributor_id');
    }

    /**
     * Relasi ke model Stok.
     * Setiap barang memiliki satu data stok yang terkait.
     * Menggunakan foreign key 'barang_id' di tabel stok untuk menghubungkan stok dengan barang.
     */
    public function stok()
    {
        return $this->hasOne(Stok::class, 'barang_id');
    }
}
