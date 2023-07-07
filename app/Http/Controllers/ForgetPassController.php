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
            return view('user.getPassword');
        } else {
            $error = 'Email không trùng khớp';
            return view(
                'user.forgetPass',
                ['error' => $error]
            );
        }
    }
}
