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

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function scopeCheckout($query) {
        return $query->whereNot('status', 'onhold');
    }

    public function getStatusMessageAttribute(){
        $message = [
            'onhold' => 'Belum dichekout', 
            'capture' => 'Transaksi Sedang diproses', 
            'pending' => 'Transaksi Belum dibayar', 
            'settlement' => 'Menunggu konfirmasi', 
            'expired' => 'Transaksi kadaluarsa', 
            'cancel' => 'Transaksi dibatalkan', 
            'onprocess' => 'Diproses', 
            'ondelivery' => 'Dalam pengiriman', 
            'arrive' => 'Tiba di tujuan', 
            'finished' => 'Selesai'
        ];

        return $message[$this->status];
    }

    public function getHasReviewAttribute(){
        return $this->ulasan->count() > 0;
    }

    public function getCreatedDateAttribute() {
        return \Carbon\Carbon::parse($this->created_at)->translatedFormat('j F Y');
    }

    public function getStatusColorAttribute(){
        $color = [
            'onhold' => [
                'text' => '#ff6b00',
                'background' => '#ffd3aa'
            ], 
            'capture' => [
                'text' => '#ff6b00',
                'background' => '#ffd3aa'
            ],
            'pending' => [
                'text' => '#ff6b00',
                'background' => '#ffd3aa'
            ], 
            'settlement' => [
                'text' => '#ff6b00',
                'background' => '#ffd3aa'
            ], 
            'expired' => [
                'text' => '#ff6b00',
                'background' => '#ffd3aa'
            ],
            'cancel' => [
                'text' => '#FF0000',
                'background' => '#FFA2A2'
            ],
            'onprocess' => [
                'text' => '#ff6b00',
                'background' => '#ffd3aa'
            ], 
            'ondelivery' => [
                'text' => '#ff6b00',
                'background' => '#ffd3aa'
            ],
            'arrive' => [
                'text' => '#1c5b1b',
                'background' => '#89e188'
            ],
            'finished' => [
                'text' => '#1c5b1b',
                'background' => '#89e188'
            ],
        ];

        return $color[$this->status];
    }
}

