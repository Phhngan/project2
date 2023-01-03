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
        $userAuth = Auth::user();
        $users = DB::table('Users')
            ->join('PositionTypes', 'Users.pos_id', '=', 'PositionTypes.pos_id')
            ->join('Provinces', 'Users.pro_id', '=', 'Provinces.pro_id')
            ->select('Users.*', 'Provinces.pro_name')
            ->where('Users.id', $userAuth->id)
            ->get();
        return view('user.clientInfo.profile', ['users' => $users]);
    }

    //update profile
    function edit()
    {
        // $user = DB::table('Users')
        //     ->select('Users.*')
        //     ->where('Users.id', $id)
        //     ->get();
        $user = Auth::user();
        return view('user/clientInfo.edit', ['user' => $user]);
    }
    function update(Request $request)
    {
        $use_lastName = $request->get('lastName');
        $name = $request->get('firstName');
        $use_birth = $request->get('birth');
        $use_gender = $request->get('gender');
        $use_phone = $request->get('phone');
        $pro_id = $request->get('province');
        $use_district = $request->get('district');
        $use_town = $request->get('town');
        $use_detailAddress = $request->get('detailAddress');
        $user = Auth::user();
        DB::table('Users')->where('id', $user->id)
            ->update([
                'use_lastName' => $use_lastName, 'name' => $name, 'use_birth' => $use_birth, 'use_gender' => $use_gender, 'use_phone' => $use_phone,
                'pro_id' => $pro_id, 'use_district' => $use_district, 'use_town' => $use_town, 'use_detailAddress' => $use_detailAddress
            ]);
        return redirect('client');
    }

    //change pass
    function changePass()
    {
        $user = Auth::user();
        return view('user/clientInfo.changPass', ['user' => $user], ['error' => '']);
    }
    function updatePass(Request $request, $id)
    {
        $user = Auth::user();
        $oldPass = $request->get('oldPass');
        $newPass1 = $request->get('newPass1');
        $newPass2 = $request->get('newPass2');
        if ($oldPass == $user->password) {
            if ($newPass1 == $newPass2) {
                DB::table('Users')->where('id', $id)->update(['password' => Hash::make($newPass1)]);
                return redirect('login');
            } else {
                return view('user/clientInfo.changPass', ['user' => $user], ['error' => 'Mật khẩu mới không trùng nhau']);
            }
        } else {
            return view('user/clientInfo.changPass', ['user' => $user], ['error' => 'Mật khẩu không chính xác']);
        }
    }

    //invoices
    function invoices()
    {
        $user = Auth::user();
        $invoices =  DB::table('SalesInvoices')
            ->join('SalesInvoiceStatuss', 'SalesInvoices.sal_status_id', '=', 'SalesInvoiceStatuss.sal_status_id')
            ->join('Provinces', 'SalesInvoices.pro_id', '=', 'Provinces.pro_id')
            ->select('SalesInvoices.*', 'SalesInvoiceStatuss.sal_status', 'Provinces.pro_name')
            ->where('SalesInvoices.use_id', $user->id)
            ->orderBy('SalesInvoices.sal_status_id')
            ->get();
        return view('user/clientInfo.invoices', ['invoices' => $invoices]);
    }
    function details($sal_id)
    {
        $invoiceDetails =  DB::table('SalesInvoiceDetails')
            ->join('Products', 'SalesInvoiceDetails.prd_id', '=', 'Products.prd_id')
            ->select('SalesInvoices.*', 'Products.prd_name', 'Products.prd_code', 'Products.prd_weigh')
            ->where('SalesInvoiceDetails.sal_id', $sal_id)
            ->orderByDesc('SalesInvoiceDetails.id')
            ->get();
        return view('user.', ['invoiceDetails' => $invoiceDetails]);
    }

    //Huy don
    function cancel($sal_id)
    {
        DB::table('SalesInvoices')->where('sal_id', $sal_id)
            ->update(['sal_status_id' => 5]);
        return redirect('client/invoices');
    }
}
