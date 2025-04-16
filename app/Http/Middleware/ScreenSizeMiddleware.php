<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ScreenSizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user mencoba mengakses langsung halaman peringatan
        if ($request->route()->getName() === 'screen.warning') {
            return abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
