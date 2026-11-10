<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Gudang A', 'Gudang B', 'Ruang Server', 'Kantor'  
        ];

        foreach ($data as $nama) {
            Lokasi::create(['nama' => $nama]);
        }
    }
}
