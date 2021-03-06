<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('test/{id}', function ($id) {
    $product = Product::findOrFail($id);
    $pr = new ProductResource( $product);
    return  $pr;
});

Route::apiResource('category', CategoryController::class);
// Route::apiResource('category', CategoryController::class);


Route::post("login" ,[UserController::class ,"login"]);

Route::middleware('auth:sanctum')->get('/user/products', [UserController::class ,"get_products"]);

