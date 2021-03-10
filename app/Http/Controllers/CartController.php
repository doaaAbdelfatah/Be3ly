<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PDF;
class CartController extends Controller
{
    function add (Product $product){
        if (session()->has("cart")){
            $products = session()->get("cart");
            $products->push($product);
            session()->put("cart" ,$products );

        }else{
            $products = collect();
            $products->push($product);
            session()->put("cart" ,$products );
        }
        return redirect()->back();

    }
    function remove (Product $product){
        if (session()->has("cart")){
            $products = session()->get("cart");
           foreach($products as $key =>$prod){
               if ($prod->id == $product->id){
                   $products->pull($key);

               }
           }
            session()->put("cart" ,$products );
        }
        return redirect()->back();

    }

    function index(){
        return view("cart");
    }

    function report(){
        $products  = session()->get("cart");
        $pdf = PDF::loadView('reports.cart', ["products"=>$products] );
		return $pdf->stream('document.pdf');
    }
}
