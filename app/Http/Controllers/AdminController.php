<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    function takeYear(Request $request)
    {
        if ($request->get('quantity') == null) {
            $date = getdate();
            $year = $date['year'];
        } else {
            $year = $request->get('quantity');
        }
        var_dump($year);
        return redirect('admin/home/' . $year);
    }
    // function updateYear(Request $request)
    // {
    //     $year = $request->get('quantity');
    //     dd($year);
    //     return redirect('admin/home/'.$year);
    // }
    function viewHome($year)
    {
        // for ($i = 0; $i < 12; $i++) {
        //     $sales[$i] = DB::table('SalesInvoiceDetails')
        //         ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
        //         ->where('SalesInvoices.sal_status_id', '<', 5)
        //         ->where('SalesInvoices.sal_status_id', '>', 1)
        //         ->where('SalesInvoices.sal_date', 'like', '%' . '-'. $i+1 .'-'. '%')
        //         ->where('SalesInvoices.sal_date', 'like', '%' . $year. '%')
        //         // ->where(date('Y', $timestamp = strtotime('sal_date')), '=', $year) 
        //         // ->where((int)date('Y', $timestamp = strtotime('SalesInvoices.sal_date')), '=', $i + 1)
        //         ->sum('SalesInvoiceDetails.sal_price');
        // }
        // var_dump($sales);
        // dd();
        $date = getdate();
        $yearNow = $date['year'];
        return view('admin/home')->with('year', $year)->with('yearNow', $yearNow);
    }

    function viewAllProduct()
    {
        return view('admin/product/index');
    }

    function viewSettings()
    {
        return view('admin/settings');
    }

    //profile admin
    function profile()
    {
        $userAuth = Auth::user();
        $users = DB::table('Users')
            ->join('PositionTypes', 'Users.pos_id', '=', 'PositionTypes.pos_id')
            ->join('Provinces', 'Users.pro_id', '=', 'Provinces.pro_id')
            ->select('Users.*', 'PositionTypes.pos_name', 'Provinces.pro_name')
            ->where('Users.id', $userAuth->id)
            ->get();
        // dd($users);
        return view('admin/setting.profile', ['users' => $users]);
    }

    //update profile
    function edit()
    {
        $user = Auth::user();
        // $user = DB::table('Users')
        //     ->select('Users.*')
        //     ->where('Users.id', $id)
        //     ->get();
        $users = DB::table('Users')
            ->join('Provinces', 'Users.pro_id', '=', 'Provinces.pro_id')
            ->select('Users.*', 'Provinces.pro_name')
            ->where('Users.id', $user->id)
            ->get();
        return view('admin/setting/edit', ['users' => $users]);
    }
    function update(Request $request)
    {
        $user = Auth::user();
        $use_lastName = $request->get('lastName');
        $name = $request->get('firstName');
        $use_birth = $request->get('birth');
        $use_gender = $request->get('gender');
        $use_phone = $request->get('phone');
        $pro_id = $request->get('province');
        $use_district = $request->get('district');
        $use_town = $request->get('town');
        $use_detailAddress = $request->get('detailAddress');
        DB::table('Users')->where('id', $user->id)
            ->update([
                'use_lastName' => $use_lastName, 'name' => $name, 'use_birth' => $use_birth, 'use_gender' => $use_gender, 'use_phone' => $use_phone,
                'pro_id' => $pro_id, 'use_district' => $use_district, 'use_town' => $use_town, 'use_detailAddress' => $use_detailAddress
            ]);
        return redirect('admin/profile');
    }

    //change pass
    function changePass()
    {
        $user = Auth::user();
        return view('admin/setting.changePass', ['user' => $user], ['error' => '']);
    }
    function updatePass(Request $request)
    {
        $user = Auth::user();
        var_dump($user->password);
        var_dump(Hash::make($user->password));
        $oldPass = $request->get('oldPass');
        $newPass1 = $request->get('newPass1');
        $newPass2 = $request->get('newPass2');
        var_dump(Hash::make($oldPass));
        if (Hash::check($oldPass, $user->password)) {
            // if (Hash::make($oldPass) == $user->password) {
            if ($newPass1 == $newPass2) {
                DB::table('Users')->where('id', $user->id)->update(['password' => Hash::make($newPass1)]);
                return redirect('login');
            } else {
                return view('admin/setting.changePass', ['user' => $user], ['error' => 'Mật khẩu mới không trùng nhau']);
            }
        } else {
            return view('admin/setting.changePass', ['user' => $user], ['error' => 'Mật khẩu không chính xác']);
        }
    }
}
