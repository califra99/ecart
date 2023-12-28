<?php

namespace App\Rules;

use App\Models\Coupon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCouponFor implements ValidationRule
{
    protected $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $coupon = Coupon::whereCode($value)->first();

        if (!$coupon) return;

        $cartTotal = auth()->user()->cart->total();

        if ($coupon->min_price > $cartTotal || $coupon->max_price < $cartTotal) $fail('Coupon invalid');

        if (!$coupon->active) $fail('Coupon disabled');

        if (!$this->product->coupons->contains($coupon)) $fail('Coupon invalid');
    }
}
