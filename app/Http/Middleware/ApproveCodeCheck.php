<?php

namespace App\Http\Middleware;

use Closure;

use \App\Approve;
use \App\User;
use Illuminate\Support\Facades\Auth;

class ApproveCodeCheck
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
        //check if the user is active or not
        $getUserActive = User::where('active','no')->where('id',Auth::id())->get();
        if(count($getUserActive) == 1){
            return redirect('/user/active');
        }



        return $next($request);
    }
}
