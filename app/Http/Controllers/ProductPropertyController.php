<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("productproparty.index" ,["product" =>null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductProperty  $productProperty
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view("productproparty.index" ,["product" =>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductProperty  $productProperty
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductProperty $productProperty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductProperty  $productProperty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductProperty $productProperty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductProperty  $productProperty
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductProperty $productProperty)
    {
        //
    }
}
