<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Model
{
    protected $fillable = [
        'barang_id',
        'jumlah',
        'tanggal',
        'keterangan',
        'user_id'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
