<?php

namespace App\Http\Controllers;

use App\Models\Producttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    //Hien thi toan bo 
    function index(){
        $productType = Producttype::get();
        return view('admin/productType.index', ['productType' => $productType]);
    }

    //Tao moi
    function create(){
        return view('admin/product-type.create');
    }
    function save(Request $request){
        $prd_type = $request->get('productTypeName');
        DB::table('ProductTypes')->insert(
            ['prd_type' => $prd_type]
        );
        return redirect('admin/product-type');
    }

    //Sua
    function edit($prd_type_id){
        $productType = Producttype::findOrFail($prd_type_id);
        if ($productType == null){
            return redirect()->route('error');
        }
        return view('admin/product-type.edit', ['product-type' => $productType]);
    }
    function update(Request $request, $prd_type_id){
        $prd_type = $request->get('productTypeName');
        DB::table('ProductTypes')->where('prd_type_id', $prd_type_id)
            ->update(['prd_type' => $prd_type]);
        return redirect('admin/product-type');
    }
}
