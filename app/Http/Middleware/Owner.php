<?php

namespace App\Http\Middleware;

use Closure;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $question_id
     * @return mixed
     */
    public function handle($request, Closure $next, $question_id)
    {
//        dd($question_id);
        if($request->id == 1)    {
            return $next($request);
        }   else    {
            return redirect()->route('teacher');
        }
    }
}
