<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    protected $fillable = [
        'nama',
        'keterangan'
    ];

    public function barang()
    {
        return $this->hasMany(barang::class);
    }
}
