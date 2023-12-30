<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->withPivot(['quantity', 'coupon_id'])
            ->withTimestamps()
            ->using(OrderItem::class);
    }

    public function total()
    {
        return $this->items->sum(fn ($item) => $item->pivot->cost());
    }
}
