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
        // $password = $request->get('password');
        // $password2 = $request->get('password2');
        $users = DB::table('Users')->select('Users.email')->where('pos_id', 1)->get();
        $check = false;
        foreach ($users as $user) {
            if ($user->email == $email) {
                $check = true;
            }
        }
        if ($check == true) {
            $mail = new MailController();
            $mail->sendPass($email);
            return redirect('login');
        } else {
            $error = 'Email không trùng khớp';
            return view(
                'user.forgetPass',
                ['error' => $error]
            );
        }
    }
}
