<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class riwayatinventaris extends Model
{
    protected $fillable = [
        'barang_id',
        'tipe',
        'jumlah',
        'stok_awal',
        'stok_akhir',
        'tanggal',
        'keterangan',
        'user_id'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
