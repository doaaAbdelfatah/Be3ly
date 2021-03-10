<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingCompanyController;
use App\Http\Controllers\ShippingCompanyPriceController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProductPropertyController;
use App\Http\Controllers\PurchasingOrderController;
use App\Http\Controllers\SellingOrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\StoreExpenseController;
use App\Http\Controllers\WelcomeMailController;
use App\Http\Middleware\CheckRole;
use App\Http\Resources\CategoryResourceCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Http\Resources\UserResourceCollection;
use App\Models\Category;
use App\Models\PurchasingOrder;
use App\Models\Location;
use App\Models\Product;
use App\Models\ShippingCompany;
use App\Models\Store;
use App\Models\StoreExpense;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::middleware(['auth:sanctum', 'verified'])->get('/test', function () {
//     return view('dashboard');
// })->name('test');

Route::prefix("/home")->middleware([])->group(function(){
    Route::get('/', function () {
        return view('home');
    })->name('dashboard');


    Route::get('/cart/{product}/add',[CartController::class ,"add"]);
    Route::get('/cart/{product}/remove',[CartController::class ,"remove"]);
    Route::get('/cart',[CartController::class ,"index"]);

    Route::get('/order',[SellingOrderController::class ,"index"])->middleware(['auth:sanctum', 'verified']);
    Route::get('/report',[CartController::class ,"report"])->middleware(['auth:sanctum', 'verified']);

});

Route::get('/dashboard', function () {

    if (auth()->user()->role=="customer") return redirect("/home");
    else    return view('dashboard');

})->name('dashboard')->middleware(['auth:sanctum', 'verified' ]);

Route::prefix("/dashboard")->middleware(['auth:sanctum', 'verified' ,'check_role'])->group(function(){

    Route::get('/store', [StoreController::class , "index"])->name("store.index");
    Route::get('/expense', [StoreExpenseController::class , "index"])->name("storeexpense.index");
    Route::get('/expense/{store}', [StoreExpenseController::class , "show"])->name("storeexpense.show");

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
        Route::get('/', [ProductController::class , "index"])->name("product.index");
        Route::get('/property', [ProductPropertyController::class , "index"])->name("productproperty.index");
        Route::get('/property/{product}', [ProductPropertyController::class , "show"])->name("productproperty.show");
    });

    Route::prefix("/expenses")->group(function(){
        Route::get('/', [ExpenseController::class , "index"])->name("expenses.index");

   });

   Route::prefix("/units")->group(function(){
    Route::get('/', [UnitController::class , "index"])->name("units.index");

    });

    Route::prefix("/suppliers")->group(function(){
        Route::get('/', [SupplierController::class , "index"])->name("suppliers.index");

    });
    Route::prefix("/purchasing")->group(function(){
        Route::prefix("/order")->group(function(){
            Route::get('/', [PurchasingOrderController::class , "index"])->name("purchasingorder.index");
            Route::get('/{purchasingOrder}', [PurchasingOrderController::class , "show"])->name("purchasingorder.show");

        });

    });
    Route::prefix("/category")->group(function(){
        Route::get('/', [CategoryController::class , "index"])->name("category.index");

    });

    Route::prefix("/location")->group(function(){
        Route::get('/', [LocationController::class , "index"])->name("location.index");

    });
    Route::prefix("/stocks")->group(function () {
        Route::get('/', [StockController::class, "index"])->name("stocks.index");
        // Route::get('/', [StockController::class, "show"])->name("stocks.show");

    });
});


Route::get('/send', [WelcomeMailController::class ,"send"]);

// Route::get("/test" ,function (){

//     return Product::all()->toArray();
// });


// Route::get("/test/{id}" ,function ($id){
//     $product = Product::findOrFail($id);
//     $pr = new ProductResource( $product);
//     return  $pr;
// });

// Route::get("/all" ,function (){
//     $products = Product::all();
//    return  new ProductResourceCollection( $products);

// });

// Route::get("/users" ,function (){
//     $users = User::all();
//    return  new UserResourceCollection( $users);

// });
// Route::get("/cats" ,function (){
//     $cats = Category::all();
//     $obj = new CategoryResourceCollection( $cats);
//     return   $obj->additional(['info' =>[
//         "owner" =>"nh copyrights",
//         'version'=>"0.0.0.1"
//     ]]);

// });
// Route::get("/cats2" ,function (){
//     $cats = Category::all();
//     $obj = new CategoryResourceCollection( $cats);
//     return   $obj;

// });


// Route::resource('category',CategoryController::class);


