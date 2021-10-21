<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class token_check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // return response()->json($request->headers->all());
        if ($request->header("API_KEY") != "helloatg") {
            return response()->json(["status" => 0, "message" => "Invalid API key"]);
        }
        return $next($request);
    }
}
