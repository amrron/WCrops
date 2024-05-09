<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => '123123',
            'no_hp' => '085648345876',
            'tanggal_lahir' => '2004-08-12',
            'jenis_kelamin' => 'Laki-laki',
        ]);

        $this->call([
            KategoriProdukSeeder::class,
            ProdukSeeder::class,
            AlamatSeeder::class,
        ]);
    }
}
