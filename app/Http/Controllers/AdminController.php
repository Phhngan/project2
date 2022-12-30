<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('is_admin');
    }

    function viewHome()
    {
        return view('admin/home');
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
        $user = Auth::user();
        return view('admin/setting.profile', ['user' => $user]);
    }

    //update profile
    function edit($id)
    {
        $user = DB::table('Users')
            ->select('Users.*')
            ->where('Users.id', $id)
            ->get();
        return view('admin/setting/edit', ['user' => $user]);
    }
    function update(Request $request, $id)
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
        DB::table('Users')->where('id', $id)
            ->update(['use_lastName' => $use_lastName, 'name' => $name, 'use_birth' => $use_birth, 'use_gender' => $use_gender, 'use_phone' => $use_phone,
             'pro_id' => $pro_id, 'use_district' => $use_district, 'use_town' => $use_town, 'use_detailAddress' => $use_detailAddress]);
        return redirect('admin/profile/edit');
    }

    //change pass
    function changePass()
    {
        $user = Auth::user();
        return view('admin/setting.changPass', ['user' => $user], ['error' => '']);
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
                return view('admin/setting.changPass', ['user' => $user], ['error' => 'Mật khẩu mới không trùng nhau']);
            }
        } else {
            return view('admin/setting.changPass', ['user' => $user], ['error' => 'Mật khẩu không chính xác']);
        }
    }
}
