<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'produk_id',
        'user_id',
        'jumlah',
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
