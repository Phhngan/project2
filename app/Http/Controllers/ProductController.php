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
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $products = DB::table('Products')
                // ->join('ImportInvoiceDetails', 'Products.prd_id', '=', 'ImportInvoiceDetails.prd_id')
                ->select('Products.*')
                ->distinct()
                // ->where('ImportInvoiceDetails.prd_status_id', '<', 5)
                ->orderByDesc('prd_id')
                ->get();
            return view('admin/product.index', ['products' => $products]);
        }
    }

    // View: Tao san pham
    function create()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2 || $user->pos_id == 3) {
                return view('admin/product.create');
            } else {
                return view('error/khong-co-quyen-admin');
            }
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
        $prd_image = $request->file('productImage')->store('public');

        // Insert
        DB::table('Products')->insert(
            [
                'prd_code' => $prd_code, 'prd_name' => $prd_name, 'prd_type_id' => $prd_type_id, 'prd_weigh' => $prd_weigh, 'prd_source' => $prd_source,
                'prd_price' => $prd_price, 'prd_discount' => $prd_discount, 'prd_description' => $prd_description, 'prd_image' => $prd_image
            ]
        );

        // Chuyen huong ve trang home
        return redirect('admin/products');
    }

    //Xem chi tiết sản phẩm
    function show($prd_id)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $product = Product::findOrFail($prd_id);
            return view('admin/product.detail', ['product' => $product]);
        }
    }

    // Sửa sản phẩm
    function edit($prd_id)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2 || $user->pos_id == 3) {
                $product = Product::findOrFail($prd_id);
                if ($product == null) {
                    return redirect()->route('error');
                }
                return view('admin/product.edit', ['product' => $product]);
            } else {
                return view('error/khong-co-quyen-admin');
            }
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
        $image = $request->file('image');
        if ($image != null) {
            $prd_image = $request->file('image')->store('public');
            DB::table('Products')->where('prd_id', $prd_id)
                ->update([
                    'prd_code' => $prd_code, 'prd_name' => $prd_name, 'prd_type_id' => $prd_type_id, 'prd_weigh' => $prd_weigh, 'prd_source' => $prd_source,
                    'prd_price' => $prd_price, 'prd_discount' => $prd_discount, 'prd_description' => $prd_description, 'prd_image' => $prd_image
                ]);
        } else {
            DB::table('Products')->where('prd_id', $prd_id)
                ->update([
                    'prd_code' => $prd_code, 'prd_name' => $prd_name, 'prd_type_id' => $prd_type_id, 'prd_weigh' => $prd_weigh, 'prd_source' => $prd_source,
                    'prd_price' => $prd_price, 'prd_discount' => $prd_discount, 'prd_description' => $prd_description
                ]);
        }
        return redirect('admin/products');
    }
}
