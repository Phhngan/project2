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
    return view('welcome');
});
// ADMIN
//admin dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
});

//
Route::get('/home', function () {
    return view('user.home');
});

//login 
Route::get('/login', function () {
    return view('user.login');
});
// 
Route::get('/register', function () {
    return view('user.register');
});