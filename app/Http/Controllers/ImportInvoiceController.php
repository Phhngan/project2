<?php

namespace App\Http\Controllers;

use App\Models\Importinvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImportInvoiceController extends Controller
{
    //Hien thi toan bo 
    function index()
    {
        // $importInvoices = Importinvoice::get();
        $importInvoices = DB::table('ImportInvoices')
            ->join('SupplyUnits', 'ImportInvoices.unit_id', '=', 'SupplyUnits.unit_id')
            ->join('Users', 'ImportInvoices.use_id', '=', 'Users.id')
            ->select('ImportInvoices.*', 'SupplyUnits.unit_name', 'Users.name')->orderByDesc('ImportInvoices.imp_id')
            ->get();
        return view('admin/importInvoice.index', ['importInvoices' => $importInvoices]);
    }

    //Tao moi
    function create()
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 3) {
            return view('admin/importInvoice.create');
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }
    function save(Request $request)
    {
        $unit_id = $request->get('unitId');
        $use_id = $request->get('userId');
        $imp_date = $request->get('importDate');
        $imp_total = $request->get('importTotal');
        DB::table('ImportInvoices')->insert(
            ['unit_id' => $unit_id, 'use_id' => $use_id, 'imp_date' => $imp_date, 'imp_total' => $imp_total]
        );
        return redirect('admin/importInvoice');
    }

    //Sua
    function edit($imp_id)
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 3) {
            $importInvoice = Importinvoice::findOrFail($imp_id);
            if ($importInvoice == null) {
                return redirect()->route('error');
            }
            return view('admin/importInvoice.edit', ['importInvoice' => $importInvoice]);
        } else {
            return view('error/khong-co-quyen-admin');
        }
        $importInvoice = Importinvoice::findOrFail($imp_id);
        if ($importInvoice == null) {
            return redirect()->route('error');
        }
        $importInvoices = DB::table('ImportInvoices')
        ->join('SupplyUnits', 'ImportInvoices.unit_id', '=', 'SupplyUnits.unit_id')
        ->join('Users', 'ImportInvoices.use_id', '=', 'Users.id')
        ->select('ImportInvoices.*', 'SupplyUnits.unit_name', 'Users.name', 'Users.use_lastName')
        ->where('ImportInvoices.imp_id', $importInvoice->imp_id)
        ->get();
        return view('admin/importInvoice.edit', ['importInvoices' => $importInvoices]);
    }
    function update(Request $request, $imp_id)
    {
        $unit_id = $request->get('unitId');
        $use_id = $request->get('userId');
        $imp_date = $request->get('importDate');
        $imp_total = $request->get('importTotal');
        DB::table('ImportInvoices')->where('imp_id', $imp_id)
            ->update(['unit_id' => $unit_id, 'use_id' => $use_id, 'imp_date' => $imp_date, 'imp_total' => $imp_total]);
        return redirect('admin/importInvoice');
    }

    // Xoa 1 sp theo id
    // function delete($imp_id)
    // {
    //     DB::table('ImportInvoices')->where('imp_id', $imp_id)->delete();
    //     return redirect('admin/importInvoice');
    // }
}
