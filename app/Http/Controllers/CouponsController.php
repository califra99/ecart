<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use App\Rules\ValidCouponFor;

class CouponsController extends Controller
{
    public function apply(Product $product)
    {
        $attributes = request()->validate([
            'code' => ['required', 'exists:coupons,code', new ValidCouponFor($product)]
        ]);

        $cart = auth()->user()->cart()->firstOrFail();

        // Check if the relationship exists
        if ($cart->items->contains($product)) {
            // If it exists, apply the coupon
            $cart->items()->updateExistingPivot($product, ['coupon_id' => Coupon::whereCode($attributes['code'])->first()->id]);
        }

        return back()->with('message', 'Coupon applied');
    }
}
