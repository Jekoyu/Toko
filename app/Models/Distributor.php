<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'alamat', 'telepon'];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'distributor_id');
    }
}
