<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'label',
        'lengkap',
        'penerima',
        'hp_penerima',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'selected',
        'kode_pos'
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
