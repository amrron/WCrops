<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'nilai',
        'ulasan',
    ];

    public function produk() {
        return $this->belongsTo(Produk::class);
    }

    public function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }
}
