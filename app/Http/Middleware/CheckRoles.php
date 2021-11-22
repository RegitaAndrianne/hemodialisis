<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRoles
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
        $allowedRoles=func_get_args();
        $user_role=Auth::user()->role;
        if(!in_array($user_role,$allowedRoles,true)){       //cek di array terdapat rolenya atau tidak
           if (Auth::user()->role == 'patient'){
            return redirect('machine-for-patient');
           }
            return redirect('/');
        }
        return $next($request);
    }
}
