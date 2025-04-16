<?php


namespace App\Http\Middleware;


use Closure;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;



class Usermiddleware
{
    public function someMethod()
    {
        $cargo = auth()->user() && auth()->user()->cargo;

        return view('admin', compact('cargo'));
    }
    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @return \Symfony\Component\HttpFoundation\Response

     */

     public function handle(Request $request, Closure $next)

     {

         if (!Auth::check()) {
             return redirect()->route('login');
         }

         $user = Auth::user();

         $userCargo = $user->cargo;

         if ($userCargo == 3) {
             return $next($request);
         }

         return redirect()->route('dashboardindex');

     }

 }

