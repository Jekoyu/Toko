<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'stok'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
