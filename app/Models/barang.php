<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kode_barang',
        'nama',
        'kategori_id',
        'lokasi_id',
        'kondisi_id',
        'jumlah',
        'satuan',
        'keterangan',
    ];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(lokasi::class);
    }

    public function kondisi()
    {
        return $this->belongsTo(kondisi::class);
    }

    public function barangmasuk()
    {
        return $this->hasMany(barangmasuk::class);
    }

    public function barangkeluar()
    {
        return $this->hasMany(barangkeluar::class);
    }

    public function riwayatinventaris()
    {
        return $this->hasMany(riwayatinventaris::class);
    }
}
