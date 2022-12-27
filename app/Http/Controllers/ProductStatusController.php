<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductStatusController extends Controller
{
    //Con han
    function conHan()
    {
        // Lay du lieu
        $productStatus = DB::table('Products')
            ->join('ProductTypes', 'Products.prd_type_id', '=', 'ProductTypes.prd_type_id')
            ->select('Products.*', 'ProductTypes.prd_type')
            ->get();

        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
        return view('admin/product.index', ['products' => $products]);
    }
}
