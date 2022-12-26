<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    //Do man
    function doMan()
    {
        // Lay du lieu
        // $products = DB::table('Products')->get();
        $products = DB::table('Products')
            ->where('prd_type_id', 1)
            ->get();

        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
        return view('admin/product.index', ['products' => $products]);
    }

    //Do ngot
    function doNgot()
    {
        // Lay du lieu
        // $products = DB::table('Products')->get();
        $products = DB::table('Products')
            ->where('prd_type_id', 2)
            ->get();

        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
        return view('admin/product.index', ['products' => $products]);
    }

    //Do man
    function doUong()
    {
        // Lay du lieu
        // $products = DB::table('Products')->get();
        $products = DB::table('Products')
            ->where('prd_type_id', 3)
            ->get();

        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
        return view('admin/product.index', ['products' => $products]);
    }
}
