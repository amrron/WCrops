<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Produk::create([
            'kategori_id' => KategoriProduk::where('nama_kategori', 'Mentah')->first()->id,
            'slug' => 'jamur-tiram',
            'nama' => 'Jamur Tiram',
            'deskripsi'=> 'Jamur tiram ya jamur tiram',
            'harga'=> 30000,
            'stok'=> 300,
            'berat'=> 1000,
            'status'=> 1,
            'gambar' => 'upload/oeGy1SjA9WLSJlYhzkdUotUvfdvAOrzkZC0yVWSB.jpg',
        ]);

        \App\Models\Produk::create([
            'kategori_id' => KategoriProduk::where('nama_kategori', 'Olahan')->first()->id,
            'slug' => 'jamur-krispi',
            'nama' => 'Jamur Krispi',
            'deskripsi'=> 'Jamur Krispi ya jamur krispi',
            'harga'=> 24000,
            'stok'=> 300,
            'berat'=> 500,
            'status'=> 1,
            'gambar' => 'upload/k2jyD5HlgmLR9aM3XmBJSCnPaszWLtg2GIQtCKYN.jpg',
        ]);
    }
}
