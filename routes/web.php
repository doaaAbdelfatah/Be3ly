<?php

use App\Http\Controllers\StoreController;
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
});
