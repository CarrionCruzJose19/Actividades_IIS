<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Si es una solicitud OPTIONS, devuelve una respuesta vacía
        if ($request->getMethod() == "OPTIONS") {
            return response()->json([], 200)
                ->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
                ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization');
        }

        $response = $next($request);

        // Agregar encabezados CORS
        $response->headers->set('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization');

        return $response;
    }
}
