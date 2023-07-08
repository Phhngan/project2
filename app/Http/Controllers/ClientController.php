<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //profile admin
    function profile()
    {
        $user = Auth::user();
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            $users = DB::table('Users')
                ->select('Users.*')
                ->where('Users.id', $user->id)
                ->get();
            return view('user.clientInfo.profile', ['users' => $users]);
        }
    }

    //update profile
    function edit()
    {
        $user = Auth::user();
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            $users = DB::table('Users')
                ->select('Users.*')
                ->where('Users.id', $user->id)
                ->get();
            return view('user/clientInfo.edit', ['users' => $users]);
        }
    }
    function update(Request $request)
    {
        $use_lastName = $request->get('lastName');
        $name = $request->get('firstName');
        $use_gender = $request->get('gender');
        $use_phone = $request->get('phone');
        $province = $request->get('province');
        $district = $request->get('district');
        $town = $request->get('town');
        $detailAddress = $request->get('detailAddress');
        $use_detailAddress = $detailAddress . ' - ' . $town . ' - ' . $district . ' - ' . $province;
        $user = Auth::user();
        DB::table('Users')->where('id', $user->id)
            ->update([
                'use_lastName' => $use_lastName, 'name' => $name, 'use_gender' => $use_gender, 'use_phone' => $use_phone,
                'use_detailAddress' => $use_detailAddress
            ]);
        return redirect('client');
    }

    //change pass
    function changePass()
    {
        $user = Auth::user();
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            return view('user/clientInfo.changePass', ['error' => '']);
        }
    }
    function updatePass(Request $request)
    {
        $user = Auth::user();
        $oldPass = $request->get('oldPass');
        $newPass1 = $request->get('newPass1');
        $newPass2 = $request->get('newPass2');
        if (Hash::check($oldPass, $user->password)) {
            if ($newPass1 == $newPass2) {
                DB::table('Users')->where('id', $user->id)->update(['password' => Hash::make($newPass1)]);
                Auth::logout();
                return redirect('login');
            } else {
                return view('user/clientInfo.changePass', ['error' => 'Mật khẩu mới không trùng nhau']);
            }
        } else {
            return view('user/clientInfo.changePass', ['error' => 'Mật khẩu không chính xác']);
        }
    }

    //invoices
    function invoices()
    {
        $user = Auth::user();
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            $invoices =  DB::table('SalesInvoices')
                // ->join('Provinces', 'SalesInvoices.pro_id', '=', 'Provinces.pro_id')
                ->select('SalesInvoices.*')
                ->where('SalesInvoices.use_id', $user->id)
                ->where('SalesInvoices.sal_status_id', '<', 5)
                ->orderBy('SalesInvoices.sal_status_id')
                ->orderByDesc('SalesInvoices.sal_id')
                ->paginate(7);
            return view('user/clientInfo.invoices', ['invoices' => $invoices]);
        }
    }
    function details($sal_id)
    {
        $invoiceDetails =  DB::table('SalesInvoiceDetails')
            ->join('Products', 'SalesInvoiceDetails.prd_id', '=', 'Products.prd_id')
            ->select('SalesInvoiceDetails.*', 'Products.*')
            ->where('SalesInvoiceDetails.sal_id', $sal_id)
            ->orderBy('SalesInvoiceDetails.id')
            ->get();
        return view('user/clientInfo.invoicesDetails', ['invoiceDetails' => $invoiceDetails]);
    }

    //Huy don
    function cancel($sal_id)
    {
        $user = Auth::user();
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            $invoices = DB::table('SalesInvoices')->where('sal_id', $sal_id)->select('SalesInvoices.*')->get();
            $products = DB::table('SalesInvoiceDetails')
                ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                ->join('Products', 'SalesInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->where('SalesInvoiceDetails.sal_id', $sal_id)
                ->select('SalesInvoiceDetails.*', 'Products.*')->get();
            $price = 0;
            $weigh = 0;
            foreach ($products as $product) {
                $price = $price + ($product->sal_price * $product->sal_quantity);
                $weigh = $weigh + ($product->prd_weigh * $product->sal_quantity);
            }
            foreach ($invoices as $invoice) {
                $ships = DB::table('Ships')
                    ->select('Ships.*')
                    ->where('Ships.ship_id', $invoice->ship_id)
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
                if ($invoice->vou_id != null) {
                    $vouchers = DB::table('Vouchers')
                        ->select('Vouchers.*')
                        ->where('Vouchers.vou_id', $invoice->vou_id)
                        ->get();
                    foreach ($vouchers as $voucher) {
                        $discount = $voucher->vou_discount;
                    }
                } else {
                    $discount = 0;
                }
                $gold = $price + $shipMoney - $invoice->sal_total - $discount;
            }
            // dd($gold);
            foreach ($invoices as $invoice) {
                if ($invoice->sal_status_id == 1) {
                    DB::table('Users')->where('id', $user->id)
                        ->update(['use_gold' => $user->use_gold + $gold]);
                    DB::table('SalesInvoices')->where('sal_id', $sal_id)
                        ->update(['sal_status_id' => 5]);
                    return redirect('client/invoices');
                } else {
                    return view('error/don-huy');
                }
            }
        }
    }
}
