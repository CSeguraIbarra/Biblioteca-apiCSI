<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            
            $autorizacion = $request->header('Authorization');
            if (!$autorizacion || !str_starts_with($autorizacion, 'Bearer ')) {
                return response()->json(['status' => 'No autorizado: token faltante'], 401);
            }
            $jwt = substr($autorizacion, 7);
            $key = env('JWT_SECRET', env('APP_KEY'));
            $algoritmo = env('JWT_ALGORITHM', 'HS256');
            
            $datos = JWT::decode($jwt,  new Key($key, $algoritmo));
           
            $request->attributes->add(['usuario' => $datos->usuario,
                                        'rol' => $datos->rol,
                                        'nombre' => $datos->nombre]);   
           
        }
        catch (\Exception $e) {

            return response()->json(['status' => 'No autorizado'.$e->getMessage()], 401);   
            
        } 
        return $next($request);

        
    }
}
