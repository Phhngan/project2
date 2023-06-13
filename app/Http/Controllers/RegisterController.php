<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Dang ky
    function viewRegister()
    {
        return view(
            'user.register',
            ['error' => '']
        );
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
                    'pos_id' => 1
                ]
            );
            return redirect('login');
        } else {
            $error = 'Mật khẩu không trùng khớp';
            return view(
                'user.register',
                ['error' => $error]
            );
        }
    }
}
