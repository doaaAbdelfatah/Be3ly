<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // we hav a middlware to validate product key 123
    function login(Request $request){
            // $email = $request->email ;
            // $pw = $request->password ;

            $credentials = $request->only('email', 'password');
           $rslt =  Auth::attempt($credentials);

           $user = User::where("email" ,$request->email )->first();
           $token =$user->createToken("login_token");
           return ['token' => $token->plainTextToken];
    }


    function get_products(Request $request){

        return auth()->user()->purchasing_orders_created_by;
    }
}
