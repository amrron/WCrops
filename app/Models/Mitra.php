<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama',
        'nama_usaha',
        'alamat_usaha',
        'no_hp',
        'email'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'LIKE', '%' . $search . '%');
        });
    }
}
