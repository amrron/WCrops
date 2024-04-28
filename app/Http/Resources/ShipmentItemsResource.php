<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $items = [];

        foreach ($this->transaksiItem as $item) {
            array_push($items, [
                'name' => $item->produk->nama,
                'value' => $item->produk->nama,
                'quantity' => $item->jumlah,
                'weight' => $item->produk->berat
            ]);
        }

        return $items;
    }
}
