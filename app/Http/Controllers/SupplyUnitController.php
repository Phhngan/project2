<?php

namespace App\Http\Controllers;

use App\Models\Supplyunit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplyUnitController extends Controller
{
    //Hien thi toan bo
    function index(){
        $supplyUnit = Supplyunit::get();
        return view('admin/supplyUnit.index', ['supplyUnit' => $supplyUnit]);
    }

    //Tao moi
    function create(){
        return view('admin/supplyUnit.create');
    }
    function save(Request $request){
        $unit_code = $request->get('unitCode');
        $unit_name = $request->get('unitName');
        $unit_email = $request->get('unitEmail');
        $unit_phone = $request->get('unitPhone');
        DB::table('SupplyUnits')->insert(
            ['unit_code' => $unit_code, 'unit_name' => $unit_name, 'unit_email' => $unit_email, 
            'unit_phone' => $unit_phone]
        );
        return redirect('admin/supplyUnit');
    }

    //Sua 
    function edit($unit_id){
        $supplyUnit = Supplyunit::findOrFail($unit_id);
        if ($supplyUnit == null) {
            return redirect()->route('error');
        }
        return view('admin/supplyUnit.edit', ['supplyUnit' => $supplyUnit]);
    }
    function update(Request $request, $unit_id){
        $unit_code = $request->get('unitCode');
        $unit_name = $request->get('unitName');
        $unit_email = $request->get('unitEmail');
        $unit_phone = $request->get('unitPhone');
        DB::table('SupplyUnits')->where('unit_id', $unit_id)->update(
            ['unit_code' => $unit_code, 'unit_name' => $unit_name, 
            'unit_email' => $unit_email, 'unit_phone' => $unit_phone]
        );
        return redirect('admin/supplyUnit');
    }
}
