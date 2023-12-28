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

    public function destroy(Product $product)
    {
        $cart = auth()->user()->cart()->firstOrFail();

        // Check if the relationship exists
        if ($cart->items->contains($product)) {
            // If it exists, decrease the quantity
            $cart->items()->updateExistingPivot($product, ['quantity' => DB::raw('quantity - 1')]);

            // Remove from the cart if quantity is 0
            $cart->items()->wherePivot('quantity', 0)->detach();
        }

        return back()->with('message', 'Prodotto rimosso dal carrello');
    }
}
