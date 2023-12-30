<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Facades\Barryvdh\DomPDF\PDF;
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

    public function generateInvoice(Order $order)
    {
        $pdf = PDF::loadView('pdf.invoice', ['order' => $order]);

        return $pdf->download(time() . "-invoce-order-{$order->id}.pdf");
    }
}
