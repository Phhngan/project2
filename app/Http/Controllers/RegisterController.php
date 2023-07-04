<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Dang ky
    function viewRegister()
    {
        return view('user.register')->with('error', '')->with('lastName', '')->with('firstName', '')->with('email', '')->with('phone', '');
    }
    function register(Request $request)
    {
        $use_lastName = $request->get('lastName');
        $name = $request->get('firstName');
        $gender = $request->get('gender');
        $email = $request->get('email');
        $use_phone = $request->get('phone');
        $use_province = $request->get('province');
        $use_district = $request->get('district');
        $use_town = $request->get('town');
        $use_detailAddress = $request->get('detailAddress');
        $password = $request->get('password');
        $password2 = $request->get('password2');
        $users = DB::table('Users')->select('Users.email')->where('pos_id', 1)->get();
        $check = false;
        foreach ($users as $user) {
            if ($user->email == $email) {
                $check = true;
            }
        }
        if ($check == false) {
            if ($password2 == $password) {
                \App\Models\User::factory()->create(
                    [
                        'use_lastName' => $use_lastName,
                        'use_gender' => $gender,
                        'name' => $name,
                        'email' => $email,
                        'use_phone' => $use_phone,
                        'use_province' => $use_province,
                        'use_district' => $use_district,
                        'use_town' => $use_town,
                        'use_detailAddress' => $use_detailAddress,
                        'password' => Hash::make($password),
                        'pos_id' => 1,
                        'use_gold' => 1000,
                    ]
                );
                return redirect('login');
            } else {
                $error = 'Mật khẩu không trùng khớp';
                return view('user.register')->with('error', $error)->with('lastName', $use_lastName)->with('firstName', $name)->with('email', $email)->with('phone', $use_phone);
            }
        } else {
            $error = 'Email đã được sử dụng';
            return view('user.register')->with('error', $error)->with('lastName', $use_lastName)->with('firstName', $name)->with('email', '')->with('phone', $use_phone);
        }
    }
}
