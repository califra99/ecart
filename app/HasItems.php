<?php

namespace App;

use App\Models\Coupon;
use App\Models\Product;

trait HasItems
{
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
