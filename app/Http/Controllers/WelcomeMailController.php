<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WelcomeMailController extends Controller
{
    function send(){
        $p =Product::find(1);
        Mail::to("doaa@gmail.com")->send(new WelcomeMail($p));
    }
}
