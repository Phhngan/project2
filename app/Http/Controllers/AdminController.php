<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function viewHome()
    {
        return view('admin/home');
    }

    function viewAllProduct()
    {
        return view('admin/product/index');
    }

}
