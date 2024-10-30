<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = ['nama', 'alamat', 'telepon'];

    /**
     * Relasi ke model Barang.
     * Setiap distributor dapat memiliki banyak barang.
     * Menggunakan foreign key 'distributor_id' di tabel barang untuk menghubungkan distributor dengan barang.
     */
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'distributor_id');
    }
}
