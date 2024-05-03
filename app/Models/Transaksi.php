<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'alamat_id',
        'total_barang',
        'total_ongkir',
        'status',
        'snap_token',
        'kurir',
        'ekspedisi',
        'resi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }

    public function transaksiItems()
    {
        return $this->hasMany(TransaksiItem::class);
    }

    public function scopeCheckout($query) {
        return $query->whereNot('status', 'onhold');
    }
}
