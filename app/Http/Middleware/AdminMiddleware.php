<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {
       
            return $next($request);
        }

       
        return redirect('/home')->with('error', 'Sizda admin panelga kirish huquqi yo‘q');
    }
    
}
