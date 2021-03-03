<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAPIKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        $key =$request->header("key");
        if ($key == "123"){
            return    $next($request) ;
        }else{
           return response()->json(["message"=>"Invalid Key" ] , 403);
        }
    }

    //https://spatie.be/docs/laravel-permission/v3/basic-usage/middleware

    // public function terminate($request, $response)
    // {
    //     echo "good bye<br>";

    // }
}
