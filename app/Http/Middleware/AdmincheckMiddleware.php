<?php

namespace App\Http\Middleware;

use Closure;

class AdmincheckMiddleware
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

        if ($request->session()->has('admin_id')) {
            return $next($request);
        } else {
            return redirect('/admin/login');
        }
      
    }
}
