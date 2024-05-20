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
        'slug',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'berat',
        'gambar',
        'status',
    ];

    public function kategori(){
        return $this->belongsTo(KategoriProduk::class, 'kategori_id');
    }

    public function keranjang() {
        return $this->hasMany(Keranjang::class);
    }

    public function transaksiItems() {
        return $this->hasMany(TransaksiItem::class);
    }

    public function ulasans() {
        return $this->hasMany(Ulasan::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            return $query->where('kategori_id', $kategori);
        });
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function getIsInWishlistAttribute() {
        return Wishlist::where('user_id', auth()->id())
                       ->where('produk_id', $this->id)
                       ->exists();
    }

    public function getTerjualAttribute() {
        return $this->transaksiItems()->count();
    }

    public function getTotalPenjualanAttribute() {
        return $this->harga * $this->transaksiItems->sum('jumlah');
    }

    public function getRatingAttribute() {
        return number_format($this->ulasans()->avg('nilai'), 1);
    }
}
