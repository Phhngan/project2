<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //add to cart
    function addCart($prd_id)
    {
        $user = Auth::user();
        $carts = DB::table('Carts')
            ->where('Carts.prd_id', $prd_id)
            ->get();
        $number = count($carts);
        // dd($number);
        if ($number == 1) {
            foreach ($carts as $cart) {
                DB::table('Carts')->where('prd_id', $prd_id)
                    ->update([
                        'car_quantity' => $cart->car_quantity + 1
                    ]);
            }
        } else {
            DB::table('Carts')->insert(
                [
                    'use_id' => $user->id, 'prd_id' => $prd_id, 'car_quantity' => 1, 'pro_id' => $user->pro_id,
                    'sal_district' => $user->use_district, 'sal_town' => $user->use_town, 'sal_detailAddress' => $user->use_detailAddress,
                ]
            );
            DB::table('Carts')->where('use_id', $user->id)->update([
                'pro_id' => $user->pro_id, 'sal_district' => $user->use_district, 'sal_town' => $user->use_town, 'sal_detailAddress' => $user->use_detailAddress,
            ]);
        }
        return back();
    }

    //show cart
    function showCart()
    {
        $user = Auth::user();
        // dd($user->id);
        $products = DB::table('Carts')
            ->join('Products', 'Carts.prd_id', '=', 'Products.prd_id')
            ->join('Images', 'Carts.prd_id', '=', 'Images.prd_id')
            ->select('Products.*', 'Carts.*', 'Images.img_url')
            // ->select('Products.*','Carts.*')
            ->where('Carts.use_id', $user->id)
            ->where('Images.img_role', 1)
            // ->distinct('pro_id', 'sal_district', 'sal_town', 'sal_detailAddress')
            ->orderByDesc('Carts.car_id')
            ->get();
        $addresses = DB::table('Carts')
            ->join('Provinces', 'Carts.pro_id', '=', 'Provinces.pro_id')
            ->distinct()
            ->select('Carts.pro_id', 'Carts.sal_district', 'Carts.sal_town', 'Carts.sal_detailAddress', 'Provinces.pro_name')
            ->where('Carts.use_id', $user->id)

            ->get();
        // dd($addresses);
        return view('user/cart', ['addresses' => $addresses], ['products' => $products]);
    }

    //update số lượng
    function update(Request $request, $car_id)
    {
        $car_quantity = $request->get('quantity');
        // dd($request->get('quantity'));
        DB::table('Carts')->where('car_id', $car_id)
            ->update([
                'car_quantity' => $car_quantity,
            ]);
        return redirect('/cart');
    }

    //xóa khỏi cart
    function delete($car_id)
    {
        DB::table('Carts')->where('car_id', $car_id)->delete();
        return redirect('/cart');
    }

    //update address
    function updateAddress(Request $request)
    {
        $user = Auth::user();
        $pro_id = $request->get('province');
        $sal_district = $request->get('district');
        $sal_town = $request->get('town');
        $sal_detailAddress = $request->get('detailAddress');
        DB::table('Carts')->where('use_id', $user->id)->update([
            'pro_id' => $pro_id, 'sal_district' => $sal_district, 'sal_town' => $sal_town, 'sal_detailAddress' => $sal_detailAddress,
        ]);
        return redirect('/cart');
    }

    //show check out
    function showCheckOut()
    {
        $user = Auth::user();
        $products = DB::table('Carts')
            ->join('Products', 'Carts.prd_id', '=', 'Products.prd_id')
            ->join('Images', 'Carts.prd_id', '=', 'Images.prd_id')
            ->select('Products.*', 'Carts.*', 'Images.img_url')
            ->where('Carts.use_id', $user->id)
            ->where('Images.img_role', 1)
            ->orderByDesc('Carts.car_id')
            ->get();
        $locations = DB::table('Carts')
            ->join('Provinces', 'Carts.pro_id', '=', 'Provinces.pro_id')
            ->select('Provinces.pro_name', 'Carts.sal_district', 'Carts.sal_town', 'Carts.sal_detailAddress')
            ->where('Carts.use_id', $user->id)
            ->distinct()
            ->get();
        // dd($locations);
        return view('user/checkout', ['products' => $products], ['locations' => $locations]);
    }

    function success()
    {
        $user = Auth::user();
        $products = DB::table('Carts')
            ->join('Products', 'Carts.prd_id', '=', 'Products.prd_id')
            ->join('Images', 'Carts.prd_id', '=', 'Images.prd_id')
            ->select('Products.*', 'Carts.*', 'Images.img_url')
            ->where('Carts.use_id', $user->id)
            ->where('Images.img_role', 1)
            ->orderByDesc('Carts.car_id')
            ->get();
        $locations = DB::table('Carts')
            ->select('Carts.pro_id', 'Carts.sal_district', 'Carts.sal_town', 'Carts.sal_detailAddress')
            ->where('Carts.use_id', $user->id)
            ->distinct()
            ->get();
        $price = 0;
        $pro_id = 0;
        $weigh = 0;
        foreach ($products as $product) {
            $pro_id = $product->pro_id;
            $price = $price + (($product->prd_price * (100 - $product->prd_discount) / 100) * $product->car_quantity);
            $weigh = $weigh + ($product->prd_weigh * $product->car_quantity);
        }
        $ships = DB::table('Provinces')
            ->join('Regions', 'Provinces.reg_id', '=', 'Regions.reg_id')
            ->select('Regions.*')
            ->where('Provinces.pro_id', $pro_id)
            ->get();
        $shipMoney = 0;
        foreach ($ships as $ship) {
            if ($weigh <= 2000) {
                $shipMoney = $ship->reg_ship;
            } else {
                $weighDiffer = $weigh - 2000;
                $shipMoney = $ship->reg_ship + $ship->reg_ship_extra * ($weighDiffer / 200);
            }
        }
        // $today = getdate();
        $today = date('Y-m-d');
        foreach ($locations as $location) {
            DB::table('SalesInvoices')->insert(
                [
                    'use_id' => $user->id, 'sal_date' => $today, 'sal_total' => $price + $shipMoney, 'pro_id' => $location->pro_id,
                    'sal_district' => $location->sal_district, 'sal_town' => $location->sal_town, 'sal_detailAddress' => $location->sal_detailAddress,
                    'sal_status_id' => 1
                ]
            );
        }
        $invoices = DB::table('SalesInvoices')
            ->orderByDesc('sal_id')
            ->where('use_id', $user->id)
            ->take(1)
            ->get();
        foreach ($invoices as $invoice) {
            foreach ($products as $product) {
                DB::table('SalesInvoiceDetails')->insert(
                    [
                        'sal_id' => $invoice->sal_id, 'prd_id' => $product->prd_id, 'sal_quantity' => $product->car_quantity,
                        'sal_price' => $product->prd_price * ((100 - $product->prd_discount) / 100)
                    ]
                );
            }
        }
        DB::table('Carts')->where('use_id', $user->id)->delete();
        return view('user.thank');
    }
}
