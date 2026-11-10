<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kondisi extends Model
{
    protected $fillable = [
        'nama'
    ];

    public function barang()
    {
        return $this->hasMany(barang::class);
    }
}
