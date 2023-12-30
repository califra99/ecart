<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StripeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // questo funziona solo se anche l'ambiente di sviluppo è in https quindi lo tengo commentato
        // if (url()->previous() != 'https://checkout.stripe.com/') abort(403);

        return $next($request);
    }
}
