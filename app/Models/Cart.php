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
            ->withPivot(['quantity', 'coupon_id'])
            ->withTimestamps()
            ->using(CartItem::class);
    }

    public function total()
    {
        return $this->items->sum(fn ($item) => $item->pivot->cost());
    }

    public function toOrder()
    {
        $order = $this->replicate(['id'])->setTable('orders');

        $order->save();

        foreach ($this->items as $item) {
            $item->pivot->toOrderItem($order->id);
        }

        $this->delete();
    }
}
