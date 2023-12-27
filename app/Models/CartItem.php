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
}
