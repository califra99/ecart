<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Inertia\Inertia;

class ProductsController extends Controller
{
    public function index() {
        return Inertia::render('Products/Index', [
            'products' => ProductResource::collection(
                Product::active()->get()
            )
        ]);
    }
}
