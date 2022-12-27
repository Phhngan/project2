<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShipController extends Controller
{
    //Hien thi toan bo
    function index(){
        $regions = Region::get();
        return view('admin/ship.index', ['regions' => $regions]);
    }

    //Sua 
    function edit($reg_id){
        $region = Region::findOrFail($reg_id);
        // $region = Region::where('reg_id',$reg_id)->get();
        if ($region == null) {
            return redirect()->route('error');
        }
        return view('admin/ship.edit', ['region' => $region], ['reg_id' => $reg_id]);
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
