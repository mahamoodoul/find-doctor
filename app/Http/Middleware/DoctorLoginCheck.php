<?php

namespace App\Http\Middleware;

use Closure;

class DoctorLoginCheck
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



        $data = $request->session()->all();
        // var_dump($data);
        // die();
        if($request->session()->has('doctorId')){
            return $next($request);
        }else{
            return redirect('doctor');
        }
       
    }
}
