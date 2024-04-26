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
        'total',
        'status',
        'snap_token'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transaksiItem() {
        return $this->hasMany(TransaksiItem::class);
    }
}
