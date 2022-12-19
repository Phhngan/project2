<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Hien thi toan bo
    function index(){
        // Lay du lieu
        $products = DB::table('Product')->get();
        // $images = DB::table('Images')->get();
        // $type = DB::table('ProductType')->get(); 

        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
        return view('admin/product.index',['products'=> $products]);
    }

    // Xoa 1 sp theo id
    function delete($prd_id){
        DB::table('Product')->where('prd_id',$prd_id)->delete();
        return redirect('admin/products');
    }

    // View: Tao san pham
    function create(){
        return view('admin/product.create');
    }
    function save(Request $request){
        // Lay du lieu
        $prd_code = $request->get('productCode');
        $prd_name = $request->get('productName');
        $prd_type_id = $request->get('productType');
        $prd_weigh = $request->get('productWeigh');
        $prd_source = $request->get('productSource');
        $prd_price = $request->get('productPrice');
        $prd_discount = $request->get('productDiscount');
        $prd_description = $request->get('productDescription');

        // Insert
        DB::table('Product')->insert(
            ['prd_code' => $prd_code, 'prd_name' => $prd_name, 'prd_type_id' => $prd_type_id, 'prd_weigh' => $prd_weigh, 'prd_source' => $prd_source, 
            'prd_price' => $prd_price, 'prd_discount' => $prd_discount, 'prd_description' => $prd_description,]
        );

        // Chuyen huong ve trang home
        return redirect('admin/products');

    }

    //Xem chi tiết sản phẩm
    function show($prd_id)
    {
        // Lay ra thong tin san pham co thong tin id = $id

        // Neu khong co -> Khong co thong tin san pham
        $product = DB::table('Product')->find($prd_id);
//        dd($product);
        // Tra du lieu ve view
        return view('admin/product.detail', ['product' => $product]);
    }

    // Sửa sản phẩm
    function edit($prd_id)
    {
        // $product = DB::table('Product')->find($prd_id);
        $product = DB::table('Product')->where('prd_id',$prd_id)->get();
        if ($product == null) {
            return redirect()->route('error');
        }
        return view('admin/product.edit', ['product' => $product]);
    }

    function update(Request $request, $prd_id)
    {
        $prd_code = $request->get('productCode');
        $prd_name = $request->get('productName');
        $prd_type_id = $request->get('productType');
        $prd_weigh = $request->get('productWeigh');
        $prd_source = $request->get('productSource');
        $prd_price = $request->get('productPrice');
        $prd_discount = $request->get('productDiscount');
        $prd_description = $request->get('productDescription');

        DB::table('Product')->where('prd_id', $prd_id)
            ->update(['prd_code' => $prd_code, 'prd_name' => $prd_name, 'prd_type_id' => $prd_type_id, 'prd_weigh' => $prd_weigh, 'prd_source' => $prd_source, 
            'prd_price' => $prd_price, 'prd_discount' => $prd_discount, 'prd_description' => $prd_description,]);
        return redirect()->back();
    }
}
