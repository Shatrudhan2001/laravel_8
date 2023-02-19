<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AllreadyMemberLogged
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
        if(Session()->has('userData') && (url('login') == $request->url())){
            return redirect('member-dashboard');
        }
        return $next($request);
    }
}