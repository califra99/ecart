<?php

namespace App\Models;

use App\HasItems;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartItem extends Pivot
{
    use HasFactory, HasItems;

    protected $table = 'cart_items';

    public function toOrderItem($orderId)
    {
        $this->order_id = $orderId;

        $this->replicate(['id', 'cart_id'])
            ->setTable('order_items')
            ->save();

        $this->delete();
    }
}
