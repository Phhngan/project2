<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShipController extends Controller
{
    //Hien thi toan bo
    function index()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $ships = Ship::get();
            return view('admin/ship.index', ['ships' => $ships]);
        }
    }

    //Sua
    function edit($ship_id)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2 || $user->pos_id == 6) {
                $ship = Ship::findOrFail($ship_id);
                if ($ship == null) {
                    return redirect()->route('error');
                }
                return view('admin/ship.edit', ['ship' => $ship], ['ship_id' => $ship_id]);
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }
    function update(Request $request, $ship_id)
    {
        $ship_price = $request->get('ship');
        $ship_extra = $request->get('shipExtra');
        $ship_time = $request->get('shipTime');
        DB::table('Ships')->where('ship_id', $ship_id)->update(
            [
                'ship_price' => $ship_price, 'ship_extra' => $ship_extra,
                'ship_time' => $ship_time
            ]
        );
        return redirect('admin/ship');
    }
}
