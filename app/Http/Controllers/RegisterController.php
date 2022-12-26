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
        $email = $request->get('email');
        $use_phone = $request->get('phone');
        $password = $request->get('password');
        $password2 = $request->get('password2');
        if ($password2 == $password) {
            \App\Models\User::factory()->create(
                [
                    'use_lastName' => $use_lastName,
                    'name' => $name,
                    'email' => $email,
                    'use_phone' => $use_phone,
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
