<?php

namespace App\Http\Controllers;

use App\Models\Producttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    //Hien thi toan bo 
    function index()
    {
        $productTypes = Producttype::get();
        return view('admin/productType.index', ['productTypes' => $productTypes]);
    }

    //Tao moi
    function create()
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 3) {
            return view('admin/productType.create');
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }
    function save(Request $request)
    {
        $prd_type = $request->get('productTypeName');
        DB::table('ProductTypes')->insert(
            ['prd_type' => $prd_type]
        );
        return redirect('admin/productType');
    }

    //Sua
    function edit($prd_type_id)
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 3) {
            $productType = Producttype::findOrFail($prd_type_id);
            if ($productType == null) {
                return redirect()->route('error');
            }
            return view('admin/productType.edit', ['productType' => $productType]);
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }
    function update(Request $request, $prd_type_id)
    {
        $prd_type = $request->get('productTypeName');
        DB::table('ProductTypes')->where('prd_type_id', $prd_type_id)
            ->update(['prd_type' => $prd_type]);
        return redirect('admin/productType');
    }

    // Xoa 1 sp theo id
    // function delete($prd_type_id)
    // {
    //     DB::table('ProductTypes')->where('prd_type_id', $prd_type_id)->delete();
    //     return redirect('admin/productType');
    // }
}
