<?php

namespace App\Http\Middleware;

use App\Utils\FetchService;
use Closure;
use Illuminate\Support\Facades\Auth;

class InstaTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $token = FetchService::getToken();
        if (strlen($token) > 0)
            return $next($request);
        else
            return redirect()->to('/');
    }
}
