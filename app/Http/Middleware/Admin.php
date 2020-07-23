<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (Auth::check() && Auth::user()->role == 1) {
            return redirect()->route('student');
        }
        elseif (Auth::check() && Auth::user()->role == 2) {
            return redirect()->route('teacher');
        }
        elseif (Auth::check() && Auth::user()->role == 3) {
            return redirect()->route('parents');
        }
        elseif (Auth::check() && Auth::user()->role == 4) {
            return redirect()->route('tutor');
        }
        elseif (Auth::check() && Auth::user()->role == 5) {
            return $next($request);
        }
        else {
            return redirect()->route('login');
        }
    }
}
