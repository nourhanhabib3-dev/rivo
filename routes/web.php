<?php

use App\Http\Controllers\AdminAuthcontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ecomController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\ecomAuth;
use Illuminate\Support\Facades\Route;


// Route::middleware(ecomAuth::class)->prefix('ecom')->group(function(){
    Route::get('/' , [ecomController::class , "index"])->name('index');
    Route::get('/home' , [ecomController::class , "home"])->name('home');
    Route::get('product_details/{id}' , [ecomController::class , "product_details"])->name('product.details');
    Route::get('/content' , [ecomController::class , "content"])->name('content');
    Route::get('/register-form' , [ecomController::class , "register_form"])->name('register.form');
    Route::post('/register_store' , [ecomController::class , "register_store"])->name('register.store');
    Route::get('/user_login_form' , [ecomController::class , "login_form"])->name('user.login.form');
    Route::post('/user_login_check' , [ecomController::class , "login_check"])->name('user.login.check');
    Route::get('/user_logout' , [ecomController::class , "logout"])->name('user.logout');
    Route::post('/cart' ,[ecomController::class , "add_to_cart"])->name('add.cart');
    Route::delete('/delete{id}' , [ecomController::class , 'delete_to_cart'])->name('delete.to.cart');



// });


Route::middleware(AdminAuth::class)->prefix("dash")->group(function(){
    Route::get('/', function () {
        return view('dashboard.pages.index');
    })->name('dash.index');
    Route::resource("admin" , AdminController::class);
    Route::resource("cat" , CatController::class );
    Route::resource("product" , ProductController::class );


   // logout
   Route::get("logout/admin" , [AdminAuthcontroller::class , "logout"])->name("logout.admin");

});

// Auth

// show_form
Route::get("login/admin/form" ,[AdminAuthcontroller::class , "show_form"])->name("login.admin.form");

// check_login
Route::post("login/admin/check" ,[AdminAuthcontroller::class , "check_login"])->name("login.admin.check");