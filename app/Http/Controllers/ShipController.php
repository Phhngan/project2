<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShipController extends Controller
{
    //Hien thi toan bo
    function index(){
        $region = Region::get();
        return view('admin/ship.index', ['region' => $region]);
    }

    //Sua 
    function edit($reg_id){
        $region = Region::findOrFail($reg_id);
        if ($region == null) {
            return redirect()->route('error');
        }
        return view('admin/ship.edit', ['region' => $region]);
    }
    function update(Request $request, $reg_id){
        $reg_ship = $request->get('ship');
        $reg_ship_extra = $request->get('shipExtra');
        $reg_ship_time = $request->get('shipTime');
        DB::table('Regions')->where('reg_id', $reg_id)->update(
            ['reg_ship' => $reg_ship, 'reg_ship_extra' => $reg_ship_extra, 
            'reg_ship_time' => $reg_ship_time]
        );
        return redirect('admin/ship');
    }
}
