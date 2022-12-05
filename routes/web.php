<?php

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
    return view('/home');
});

// ADMIN
//admin home
Route::get('/admin/home', function () {
    return view('admin/home');
});
Route::get('/admin/home', [\App\Http\Controllers\AdminController::class, 'viewHome']);

//site home
Route::get('/home', function () {
    return view('user.home');
});

//login 
Route::get('/login', function () {
    return view('user.login');
});

//register 
Route::get('/register', function () {
    return view('user.register');
});