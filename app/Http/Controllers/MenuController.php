<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    //Do man
    function doMan()
    {
        $products = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('prd_type_id', 1)->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')
            ->get();
        return view('user/doMan', ['products' => $products]);
    }

    //Do ngot
    function doNgot()
    {
        $products = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('prd_type_id', 2)->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')
            ->get();
        return view('user/doNgot', ['products' => $products]);
    }

    //Do man
    function doUong()
    {
        $products = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('prd_type_id', 3)->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')
            ->get();
        return view('user/doUong', ['products' => $products]);
    }

    //All
    function allProducts()
    {
        $products = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')->get();
        return view('user/allProducts', ['products' => $products]);
    }

    //Chi tiet san pham
    function show($prd_id)
    {
        $products = DB::table('Products')
            ->join('ProductTypes', 'Products.prd_type_id', '=', 'ProductTypes.prd_type_id')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->select('Products.*', 'ProductTypes.prd_type', 'Images.img_url')
            ->where('Products.prd_id', $prd_id)
            ->get();
        // dd($product);
        return view('user/productDetails', ['products' => $products]);
    }
}
