<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyAuthToken
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');
        \Log::info('Authorization Token: ' . $token);
        $validToken = env('AUTH_TOKEN');


        if ($token !== $validToken) {
            \Log::error('Invalid token: ' . $token);
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
