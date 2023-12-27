<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupons_products')->withTimestamps();
    }

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }
}
