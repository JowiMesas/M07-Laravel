<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validateUrl = $request->route('validateUrl');
        if(!filter_var($validateUrl, FILTER_VALIDATE_URL)) {
            return redirect('/');
        }
        return $next($request);
    }
}
