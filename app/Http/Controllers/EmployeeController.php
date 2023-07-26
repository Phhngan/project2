<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //Hien thi toan bo
    function index()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $users = DB::table('Users')
                ->select('Users.*')
                ->where('Users.pos_id', '>', 1)
                ->get();
            return view('admin/employee.index', ['users' => $users]);
        }
    }

    //Tao moi
    function create()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2) {
                return view('admin/employee.create');
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }
    function save(Request $request)
    {
        $use_lastName = $request->get('lastName');
        $name = $request->get('firstName');
        $use_gender = $request->get('gender');
        $email = $request->get('email');
        $use_phone = $request->get('phone');
        $use_province = $request->get('province');
        $use_district = $request->get('district');
        $use_town = $request->get('town');
        $use_detailAddress = $request->get('detailAddress');
        $password = $request->get('password');
        $pos_id = $request->get('position');

        User::factory()->create(
            [
                'use_lastName' => $use_lastName,
                'name' => $name,
                'use_gender' => $use_gender,
                'email' => $email,
                'use_phone' => $use_phone,
                'use_province' => $use_province,
                'use_district' => $use_district,
                'use_town' => $use_town,
                'use_detailAddress' => $use_detailAddress,
                'password' => Hash::make($password),
                'pos_id' => $pos_id,
                'use_gold' => 0
            ]
        );
        return redirect('admin/employee');
    }

    //Sua
    function edit($id)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2) {
                $users = DB::table('Users')
                    ->select('Users.*')
                    ->where('Users.id', $id)
                    ->get();
                return view('admin/employee.edit', ['users' => $users]);
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }
    function update(Request $request, $id)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $pos_id = $request->get('position');
        if ($password) {
            DB::table('Users')->where('id', $id)->update(
                ['password' => Hash::make($password), 'pos_id' => $pos_id, 'email' => $email]
            );
        } else {
            DB::table('Users')->where('id', $id)->update(
                ['pos_id' => $pos_id, 'email' => $email]
            );
        }
        return redirect('admin/employee');
    }
}
