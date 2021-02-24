<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\ShippingCompanyController;
use App\Http\Controllers\ShippingCompanyPriceController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProductPropertyController;
use App\Models\ShippingCompany;
use App\Models\Store;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/test', function () {
    return view('dashboard');
})->name('test');


Route::prefix("/dashboard")->middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/store', [StoreController::class , "index"])->name("store.index");
    Route::post('/store', [StoreController::class , "store"])->name("store.store");


    Route::prefix("/branch")->group(function(){
        Route::get('/', [BranchController::class , "index"])->name("branch.index");

    });

    Route::prefix("/shipping")->group(function(){
        Route::get('/', [ShippingCompanyController::class , "index"])->name("shipping.index");
        Route::get('/prices', [ShippingCompanyPriceController::class , "index"])->name("shippingprices.index");

    });

    Route::prefix("/property")->group(function(){
        Route::get('/', [PropertyController::class , "index"])->name("property.index");
    });

    Route::prefix("/product")->group(function(){
        Route::get('/property', [ProductPropertyController::class , "index"])->name("productproperty.index");
    });
});
