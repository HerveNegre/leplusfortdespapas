<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isBan)
        {
            $banned = Auth::user()->isBan == "1";
            Auth::logout();
            
            if ($banned == 1) {
                $message = "Vous avez été banni, contactez l'administrateur pour plus d'informations";
            }
            return redirect()->route('login')
                ->with('status', $message)
                ->withErrors([ 'email' => "Vous avez été banni, contactez l'administrateur pour plus d'informations"])
            ;
        }
        return $next($request);
    }
}
