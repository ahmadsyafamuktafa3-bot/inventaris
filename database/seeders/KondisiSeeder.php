<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kondisi;
class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Baik', 'Rusak Ringan', 'Rusak Berat'];

        foreach ($data as $nama) {
            Kondisi::create(['nama' => $nama]);
        }
    }
}
