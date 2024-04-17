<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'kategori' => $this->kategori->nama_kategori,
            'kategori_id' => $this->kategori->id,
            'deskripsi' => $this->deskripsi,
            'gambar' => $this->gambar,
            'status' => $this->status,
        ];
    }
}
