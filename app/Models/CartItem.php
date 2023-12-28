<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartItem extends Pivot
{
    use HasFactory;

    protected $table = 'cart_items';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function grossCost()
    {
        return $this->product->price * $this->quantity;
    }

    public function netCost()
    {
        return $this->grossCost() - ($this->product->price * $this->quantity * $this->coupon->value) / 100;
    }

    public function cost()
    {
        return round($this->coupon ? $this->netCost() : $this->grossCost(), 2);
    }
}
