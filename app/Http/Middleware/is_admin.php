<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class is_admin
{
 
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_admin == 1)
        {
            return $next($request);
        }

        toastr()->warning('you dont have access for such action');
        return redirect()->back();
    }
}
