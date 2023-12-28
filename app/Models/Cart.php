<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(Product::class, 'cart_items')
            ->withPivot(['quantity'])
            ->withTimestamps()
            ->using(CartItem::class);
    }

    public function total()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->price * $item->pivot->quantity;
        }

        return $total;
    }
}
