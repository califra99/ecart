<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Inertia\Inertia;

class OrdersController extends Controller
{
    public function index()
    {
        return Inertia::render('Orders/Index', [
            'orders' => OrderResource::collection(
                auth()->user()->orders()->latest()->get()
            )
        ]);
    }
}
