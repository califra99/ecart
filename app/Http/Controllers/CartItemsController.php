<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartItemsController extends Controller
{
    public function store(Product $product)
    {
        $cart = auth()->user()->cart()->firstOrCreate();

        // Check if the relationship exists
        if ($cart->items->contains($product)) {
            // If it exists, increment the quantity
            $cart->items()->updateExistingPivot($product, ['quantity' => DB::raw('quantity + 1')]);
        } else {
            // If it doesn't exist, create the relationship with the given quantity
            $cart->items()->attach($product, ['quantity' => 1]);
        }

        return back()->with('message', 'Prodotto aggiunto al carrello');
    }
}
