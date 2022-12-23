<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //Hien thi toan bo
    function index(){
        // $users = User::get();
        $users= User::where('pos_id', '>', 1)->get();
        // if ($users->pos_id > 1){
        //     $user = $users;
        // }
        return view('admin/employee.index', ['users' => $users]);
    }

    //Tao moi   
    function create(){
        return view('admin/employee.create');
    }
    function save(Request $request){
        $use_lastName = $request->get('lastName');
        $name = $request->get('firstName');
        $use_birth = $request->get('birth');
        $use_gender = $request->get('gender');
        $email = $request->get('email');
        $use_phone = $request->get('phone');
        $password = $request->get('password');
        $pos_id = $request->get('position');
        DB::table('Users')->insert(
            ['use_lastName' => $use_lastName, 'name' => $name, 'use_birth' => $use_birth,
            'use_gender' => $use_gender, 'email' => $email, 'use_phone' => $use_phone,
            'password' => Hash::make($password), 'pos_id' => $pos_id,]
        );
        return redirect('admin/employee');
    }

    //Sua 
    function edit($id){
        $user = User::findOrFail($id);
        if ($user == null) {
            return redirect()->route('error');
        }
        return view('admin/employee.edit', ['user' => $user]);
    }
    function update(Request $request, $id){
        $password = $request->get('password');
        $pos_id = $request->get('position');
        DB::table('Users')->where('id', $id)->update(
            ['password' => $password, 'pos_id' =>$pos_id]
        );
        return redirect('admin/employee');
    }

    // Xoa 1 sp theo id
    function delete($id)
    {
        DB::table('Users')->where('id', $id)->delete();
        return redirect('admin/employee');
    }
}
