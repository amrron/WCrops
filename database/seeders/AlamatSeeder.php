<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Alamat::create([
            'user_id' => User::where('email', 'admin@gmail.com')->first()->id,
            'label' => 'Rumah',
            'lengkap' => 'Jalan Pondok Rumput 2, No. 5 Kebon Anggrek Lebak',
            'penerima' => 'Ali Imron',
            'hp_penerima' => '085648234754',
            'provinsi' => 'JAWA BARAT',
            'kota' => 'KOTA BOGOR',
            'kecamatan' => 'TANAH SAREAL',
            'kelurahan' => 'KEBON PEDES',
            'selected' => 1,
            'kode_pos' => '16162'
        ]);
    }
}
