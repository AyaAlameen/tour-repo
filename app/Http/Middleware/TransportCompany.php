<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TransportCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user=\Auth::user();
        if($user){
            if($user->is_employee == 1){ 

                foreach ($user->permissions as $permission) {
                    if($permission->code == 'admin' || $permission->code == 'transport_company'){
                        return $next($request);
                    }
                }
                

            }
        }
            
        return redirect()->back();
    }
}
