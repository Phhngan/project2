<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Util\Html5EntityDecoder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

//SITE home
    Route::get('/home', function () {
        return view('user.home');
    });

//SITE all products


// ADMIN
//admin home
    Route::get('/admin/home', [AdminController::class, 'viewHome']);

// //quan li san pham
//     Route::get('/admin/products', [AdminController::class, 'viewAllProduct']);

// Xem toan bo SP
    Route::get("/admin/products", [ProductController::class, 'index']);

// Them 1 san pham: view
    Route::get("/admin/products/create", [ProductController::class, 'create']);
    // Them sp: xu ly => ko co giao dien
    Route::post("/admin/products/create", [ProductController::class, 'save']);

// Xem 1 san pham
    Route::get("/admin/products/{prd_id}", [ProductController::class, 'show']);

// Sua 1 san pham: view
    Route::get("/admin/products/{prd_id}/edit", [ProductController::class, 'edit']);
    // Cap nhat sp => ko co giao dien
    Route::put("admin/product/{prd_id}/edit", [ProductController::class, 'update']);

// Xoa 1 san pham
    Route::delete("admin/products/{prd_id}/delete", [ProductController::class, 'delete']);

//login 
    Route::get('/login',[LoginController::class,'viewLogin']);
    Route::post('/login',[LoginController::class,'login']);
    Route::post('/logout',[LoginController::class,'logout']);

//register 
    Route::get('/register', function () {
        return view('user.register');
    });
