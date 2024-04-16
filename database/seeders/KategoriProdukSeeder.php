<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\KategoriProduk::create([
            'nama_kategori' => 'Olahan'
        ]);

        \App\Models\KategoriProduk::create([
            'nama_kategori' => 'Mentah'
        ]);

        \App\Models\KategoriProduk::create([
            'nama_kategori' => 'Frozzen'
        ]);
    }
}
