<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ForgetPassController extends Controller
{
    function viewForgetPass()
    {
        return view(
            'user.forgetPass',
            ['error' => '']
        );
    }
    function forgetPass(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $password2 = $request->get('password2');
        $user = DB::table('Users')->where('email', $email)->where('pos_id', 1)->select('Users.email')->get();
        if ($user->contains($email)) {
            // $error = 'Email không trùng khớp';
            // return view(
            //     'user.forgetPass',
            //     ['error' => $error]
            // );
            if ($password2 == $password) {
                DB::table('Users')->where('email', $email)->where('pos_id', 1)->update(
                    ['password' => Hash::make($password)]
                );
                return redirect('login');
            } else {
                $error = 'Mật khẩu không trùng khớp';
                return view(
                    'user.forgetPass',
                    ['error' => $error]
                );
            }
        } else {
            // if ($password2 == $password) {
            //     DB::table('Users')->where('email', $email)->where('pos_id', 1)->update(
            //         ['password' => Hash::make($password)]
            //     );
            //     return redirect('login');
            // } else {
            //     $error = 'Mật khẩu không trùng khớp';
            //     return view(
            //         'user.forgetPass',
            //         ['error' => $error]
            //     );
            // }
            $error = 'Email không trùng khớp';
            return view(
                'user.forgetPass',
                ['error' => $error]
            );
        }
    }
}
