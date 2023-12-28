<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock_qty' => $this->stock_qty,
            'pivot' => [
                'qty' => $this->whenPivotLoaded('cart_items', function () {
                    return $this->pivot->quantity;
                }),
            ],
            'paths' => [
                'addToCart' => '/carts/' . $this->id . '/add',
                'deleteFromCart' => '/carts/' . $this->id . '/remove'
            ]
        ];
    }
}
