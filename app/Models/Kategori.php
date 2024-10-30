<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = ['nama'];

    /**
     * Relasi ke model Barang.
     * Setiap kategori dapat memiliki banyak barang.
     * Menggunakan foreign key 'kategori_id' di tabel barang untuk menghubungkan kategori dengan barang yang termasuk dalam kategori tersebut.
     */
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
