<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use stdClass;

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
    function viewHome($year)
    {
        $date = getdate();
        $yearNow = $date['year'];
        $products = DB::table('Products')
            ->select('Products.*')
            ->orderBy('prd_id')
            ->get();
        $count = count($products);
        $array = [];
        foreach ($products as $product) {
            for ($i = 0; $i < $count; $i++) {
                if ($i == $product->prd_id - 1) {
                    $quantity = DB::table('ImportInvoiceDetails')
                        ->where('prd_id', $product->prd_id)
                        ->where('prd_status_id', '<', 3)
                        ->sum('ImportInvoiceDetails.imp_quantity_left');
                    if ($quantity == 0) {
                        $array[$i]['quantity'] = $quantity;
                        $array[$i]['code'] = $product->prd_id;
                    }
                }
            }
        }
        if (!$array) {
            $countArray = 0;
        } else {
            $countArray = count($array);
        }
        // dd($countArray);
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
            ->select('Users.*')
            ->where('Users.id', $userAuth->id)
            ->get();
        // dd($users);
        return view('admin/setting.profile', ['users' => $users]);
    }

    //update profile
    function edit()
    {
        $user = Auth::user();
        $users = DB::table('Users')
            ->select('Users.*')
            ->where('Users.id', $user->id)
            ->get();
        return view('admin/setting/edit', ['users' => $users]);
    }
    function update(Request $request)
    {
        $user = Auth::user();
        $use_lastName = $request->get('lastName');
        $name = $request->get('firstName');
        $use_gender = $request->get('gender');
        $use_phone = $request->get('phone');
        $use_province = $request->get('province');
        $use_district = $request->get('district');
        $use_town = $request->get('town');
        $use_detailAddress = $request->get('detailAddress');
        DB::table('Users')->where('id', $user->id)
            ->update([
                'use_lastName' => $use_lastName, 'name' => $name, 'use_gender' => $use_gender, 'use_phone' => $use_phone,
                'use_province' => $use_province, 'use_district' => $use_district, 'use_town' => $use_town, 'use_detailAddress' => $use_detailAddress
            ]);
        return redirect('admin/profile');
    }

    //change pass
    function changePass()
    {
        return view('admin/setting.changePass', ['error' => '']);
    }
    function updatePass(Request $request)
    {
        $user = Auth::user();
        $oldPass = $request->get('oldPass');
        $newPass1 = $request->get('newPass1');
        $newPass2 = $request->get('newPass2');
        $a = Hash::check($oldPass, $user->password);
        // dd($oldPass);
        // dd($newPass2);
        if (Hash::check($oldPass, $user->password)) {
            if ($newPass1 == $newPass2) {
                DB::table('Users')->where('id', $user->id)->update(['password' => Hash::make($newPass1)]);
                return redirect('login');
            } else {
                return view('admin/setting.changePass', ['error' => 'Mật khẩu mới không trùng nhau']);
            }
        } else {
            return view('admin/setting.changePass', ['error' => 'Mật khẩu không chính xác']);
        }
    }

    function test()
    {
        $products = DB::table('Products')
            ->join('ImportInvoiceDetails', 'Products.prd_id', '=', 'ImportInvoiceDetails.prd_id')
            ->select('Products.*')
            ->where('ImportInvoiceDetails', '<', 3)
            ->orderBy('prd_id')
            ->get();
        dd($products);
    }
}
