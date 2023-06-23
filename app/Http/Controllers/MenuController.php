<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    //Do man
    function doMan()
    {
        $products = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('prd_type_id', 1)->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')
            ->paginate(8);
        return view('user/doMan', ['products' => $products]);
    }

    //Do ngot
    function doNgot()
    {
        $products = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('prd_type_id', 2)->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')
            ->paginate(8);
        return view('user/doNgot', ['products' => $products]);
    }

    //Do man
    function doUong()
    {
        $products = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('prd_type_id', 3)->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')
            ->paginate(8);
        return view('user/doUong', ['products' => $products]);
    }

    //All
    function allProducts()
    {
        $products = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')->paginate(8);
        return view('user/allProducts', ['products' => $products]);
    }

    //Chi tiet san pham
    function show($prd_id)
    {
        $products = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->select('Products.*', 'Images.img_url')
            ->where('Products.prd_id', $prd_id)
            ->get();

        //Sản phẩm khác random
        $randomProducts = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')
            ->inRandomOrder()
            ->take(4)
            ->get();
        return view('user/productDetails', ['products' => $products], ['randomProducts' => $randomProducts]);
    }

    //Hiển thị home
    function home()
    {
        //SP mới nhất
        $newProducts = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')
            ->orderByDesc('prd_id')
            ->take(4)
            ->get();

        //SP giảm giá
        $discountProducts = DB::table('Products')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->where('Images.img_role', 1)
            ->select('Products.*', 'Images.img_url')
            // ->where('Products.prd_discount', '>', 0)
            ->orderByDesc('prd_discount')
            ->take(4)
            ->get();
        // dd($discountProducts);
        return view('user.home', ['newProducts' => $newProducts], ['discountProducts' => $discountProducts]);
    }

    //search
    function search(Request $request)
    {
        $search = $request->get('searchText');
        if (!empty($search)) {
            $products = DB::table('Products')
                ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
                ->where('Images.img_role', 1)
                ->where('prd_name', 'like', '%' . $search . '%')
                ->select('Products.*', 'Images.img_url')
                ->paginate(8);
            return view('user/search')->with('products', $products);
        } else {
            return redirect(('products'));
        }
    }

    // add favorite
    function addFavorite($prd_id)
    {
        $user = Auth::user();
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            DB::table('FavoriteProducts')->insert(
                [
                    'use_id' => $user->id, 'prd_id' => $prd_id
                ]
            );
        }
        return back();
    }

    // show favorite
    function showFavorite()
    {
        $user = Auth::user();
        $products = DB::table('FavoriteProducts')
            ->join('Products', 'FavoriteProducts.prd_id', '=', 'Products.prd_id')
            ->join('Images', 'FavoriteProducts.prd_id', '=', 'Images.prd_id')
            ->select('Products.*', 'FavoriteProducts.*', 'Images.img_url')
            ->where('FavoriteProducts.use_id', $user->id)
            ->where('Images.img_role', 1)
            ->orderByDesc('FavoriteProducts.fav_id')
            ->get();
        return view('user/clientInfo.favorite', ['products' => $products]);
    }

    //delete favorite
    function delete($prd_id)
    {
        $user = Auth::user();
        DB::table('FavoriteProducts')->where('prd_id', $prd_id)->where('use_id', $user->id)->delete();
        return back();
    }

    function deleteFavorite($prd_id)
    {
        $user = Auth::user();
        DB::table('FavoriteProducts')->where('prd_id', $prd_id)->where('use_id', $user->id)->delete();
        return back();
    }

    //
}
