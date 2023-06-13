<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //add to cart
    function addCart($prd_id)
    {
        $user = Auth::user();
        // dd($user);
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            $carts = DB::table('Carts')
                ->where('Carts.prd_id', $prd_id)
                ->where('Carts.use_id', $user->id)
                ->get();
            $number = count($carts);
            // dd($number);
            if ($number == 1) {
                foreach ($carts as $cart) {
                    DB::table('Carts')->where('prd_id', $prd_id)->where('Carts.use_id', $user->id)
                        ->update([
                            'car_quantity' => $cart->car_quantity + 1
                        ]);
                }
            } else {
                DB::table('Carts')->insert(
                    [
                        'use_id' => $user->id, 'prd_id' => $prd_id, 'car_quantity' => 1
                    ]
                );
                DB::table('Carts')->where('Carts.use_id', $user->id)
                    ->update([
                        'ship_id' => null, 'car_detailAddress' => null, 'car_town' => null, 'car_district' => null, 'car_province' => null
                    ]);
            }
            return back();
        }
    }

    //show cart
    function showCart()
    {
        $user = Auth::user();
        $checks = DB::table('Carts')
            ->select('Carts.*')
            ->where('Carts.use_id', $user->id)
            ->get();
        foreach ($checks as $check) {
            $quantity = DB::table('ImportInvoiceDetails')->where('prd_id', $check->prd_id)
                ->where('prd_status_id', '<', 3)
                ->sum('ImportInvoiceDetails.imp_quantity_left');
            if ($quantity == 0) {
                DB::table('Carts')->where('car_id', $check->car_id)->delete();
            }
        }
        $products = DB::table('Carts')
            ->join('Products', 'Carts.prd_id', '=', 'Products.prd_id')
            ->join('Images', 'Carts.prd_id', '=', 'Images.prd_id')
            ->select('Products.*', 'Carts.*', 'Images.img_url')
            ->where('Carts.use_id', $user->id)
            ->where('Images.img_role', 1)
            ->orderByDesc('Carts.car_id')
            ->get();
        $addresses = DB::table('Carts')
            ->distinct()
            ->select('Carts.car_province', 'Carts.car_district', 'Carts.car_town', 'Carts.car_detailAddress')
            ->where('Carts.use_id', $user->id)
            ->get();
        return view('user/cart', ['products' => $products], ['addresses' => $addresses]);
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
        $car_province = $request->get('province');
        $car_district = $request->get('district');
        $car_town = $request->get('town');
        $car_detailAddress = $request->get('detailAddress');
        $url = 'https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json';
        $regions = json_decode(file_get_contents($url));
        $id = 0;
        foreach ($regions as $region) {
            if ($car_province == $region->Name) {
                $id = $region->Id;
            }
        }
        if ($id == 1) $ship = 1;
        if ($id >= 2 && $id <= 38) $ship = 2;
        if ($id >= 39 && $id <= 46) $ship = 3;
        if ($id >= 48 && $id <= 96) $ship = 4;
        DB::table('Carts')->where('use_id', $user->id)->update([
            'car_detailAddress' => $car_detailAddress, 'car_province' => $car_province, 'car_district' => $car_district, 'car_town' => $car_town,
            'ship_id' => $ship
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
            ->select('Carts.car_province', 'Carts.car_district', 'Carts.car_town', 'Carts.car_detailAddress',)
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
            ->select('Carts.car_province', 'Carts.car_district', 'Carts.car_town', 'Carts.car_detailAddress')
            ->where('Carts.use_id', $user->id)
            ->distinct()
            ->get();
        $price = 0;
        $ship_id = 0;
        $weigh = 0;
        foreach ($products as $product) {
            $ship_id = $product->ship_id;
            $price = $price + (($product->prd_price * (100 - $product->prd_discount) / 100) * $product->car_quantity);
            $weigh = $weigh + ($product->prd_weigh * $product->car_quantity);
        }
        $ships = DB::table('Ships')
            ->select('Ships.*')
            ->where('Ships.ship_id', $ship_id)
            ->get();
        $shipMoney = 0;
        foreach ($ships as $ship) {
            if ($weigh <= 2000) {
                $shipMoney = $ship->ship_price;
            } else {
                $weighDiffer = $weigh - 2000;
                $shipMoney = $ship->ship_price + $ship->ship_extra * ($weighDiffer / 200);
            }
        }
        // $today = getdate();
        $today = date('Y-m-d');
        foreach ($locations as $location) {
            DB::table('SalesInvoices')->insert(
                [
                    'use_id' => $user->id, 'sal_date' => $today, 'sal_total' => $price + $shipMoney, 'ship_id' => $ship_id, 'sal_province' => $location->car_province,
                    'sal_district' => $location->car_district, 'sal_town' => $location->car_town, 'sal_detailAddress' => $location->car_detailAddress,
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
                $imports = DB::table('ImportInvoiceDetails')
                    ->join('ImportInvoices', 'ImportInvoiceDetails.imp_id', '=', 'ImportInvoices.imp_id')
                    ->select('ImportInvoiceDetails.*')
                    ->where('prd_status_id', '<', 3)
                    ->where('imp_quantity_left', '>', 0)
                    ->where('prd_id', $product->prd_id)
                    ->orderBy('id')
                    ->take(1)
                    ->get();
                foreach ($imports as $import) {
                    DB::table('SalesInvoiceDetails')->insert(
                        [
                            'sal_id' => $invoice->sal_id, 'prd_id' => $product->prd_id, 'sal_quantity' => $product->car_quantity,
                            'sal_price' => $product->prd_price * ((100 - $product->prd_discount) / 100), 'imp_price' => $import->imp_price
                        ]
                    );
                }
            }
        }
        DB::table('Carts')->where('use_id', $user->id)->delete();
        return view('user.thank');
    }
}
