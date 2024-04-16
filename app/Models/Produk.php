<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'status',
    ];

    public function kategori(){
        return $this->belongsTo(KategoriProduk::class);
    }
}
