<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use Inertia\Inertia;

class CartsController extends Controller
{
    public function show()
    {
        return Inertia::render('Cart/Show', [
            'cart' => CartResource::make(
                auth()->user()->cart()->with('items')->firstOrCreate()
            )
        ]);
    }
}
