<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Booking
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
            if($user->is_employee == 1 || $user->is_employee == 2){ 

                foreach ($user->permissions as $permission) {
                    if($permission->code == 'admin' || $permission->code == 'booking'){
                        return $next($request);
                    }
                }
                

            }
        }
            
        return redirect()->back();
    }
}
