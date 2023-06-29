<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Producttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Hien thi toan bo
    function index()
    {
        // Lay du lieu
        $products = DB::table('Products')
            ->select('Products.*')
            ->orderBy('prd_id')
            ->get();
        // dd($products);
        // Tra ve view -> view se render ra man hinh
        return view('admin/product.index', ['products' => $products]);
    }

    // View: Tao san pham
    function create()
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 3) {
            return view('admin/product.create');
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }
    function save(Request $request)
    {
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
        DB::table('Products')->insert(
            [
                'prd_code' => $prd_code, 'prd_name' => $prd_name, 'prd_type_id' => $prd_type_id, 'prd_weigh' => $prd_weigh, 'prd_source' => $prd_source,
                'prd_price' => $prd_price, 'prd_discount' => $prd_discount, 'prd_description' => $prd_description,
            ]
        );

        // Chuyen huong ve trang home
        return redirect('admin/products');
    }

    //Xem chi tiết sản phẩm
    function show($prd_id)
    {
        $product = Product::findOrFail($prd_id);
        // var_dump($product->prd_image);
        // $url = substr($product->prd_image, 7);
        // dd($url);
        return view('admin/product.detail', ['product' => $product]);
    }

    // Sửa sản phẩm
    function edit($prd_id)
    {
        // $product = DB::table('Product')->find($prd_id);
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 3) {
            $product = Product::findOrFail($prd_id);
            // $product = DB::table('Product')->where('prd_id',$prd_id)->get();
            if ($product == null) {
                return redirect()->route('error');
            }
            return view('admin/product.edit', ['product' => $product]);
        } else {
            return view('error/khong-co-quyen-admin');
        }
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

        DB::table('Products')->where('prd_id', $prd_id)
            ->update([
                'prd_code' => $prd_code, 'prd_name' => $prd_name, 'prd_type_id' => $prd_type_id, 'prd_weigh' => $prd_weigh, 'prd_source' => $prd_source,
                'prd_price' => $prd_price, 'prd_discount' => $prd_discount, 'prd_description' => $prd_description,
            ]);
        return redirect('admin/products');
    }
}
