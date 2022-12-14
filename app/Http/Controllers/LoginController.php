<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    function viewLogin(){
        return view('user.login');
    }

    function login(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');

        $rs = Auth::attempt(
            ['use_email' => $email, 'password' => $password]
        );

        if ($rs == true){
            $user = Auth::user();
            if ($user->pos_id > 1){
                return redirect('admin/home');
                // dd("Admin dang nhap");
            } else {
                return redirect(('home'));
                // dd("Khach dang nhap");
            }
        } else {
            return view('user/login');
            // dd("Dang nhap that bai",);
        }

        // $rs = DB::table('UserInfor')->where('use_email',$use_email)->where('use_password',$use_password)->first();
           
        // if($rs){
        //     return redirect('/admin/home');
        // } else {
        //     return view('user.login');
        // }
        // if($rs) {
        //     if($rs->pos_id > 1 ){
        //         return redirect('/admin/home');
        //     } else{
        //         return redirect('/home');
        //     }
        // } else {
        //     // log($rs->pos_id);
        //     return view('user/login');
        // }
    }
}
