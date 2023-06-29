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
            ->orderByDesc('ImportInvoices.imp_id')
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
        $prd_id = $request->input('productId');
        $imp_quantity = $request->get('quantity');
        $imp_price = $request->get('price');
        $imp_expiryDate = $request->get('expiryDate');
        $count = count($prd_id);
        $total = 0;
        for ($i = 0; $i < $count; $i++) {
            $total = $total + ($imp_price[$i] * $imp_quantity[$i]);
        }
        DB::table('ImportInvoices')->insert(
            ['unit_id' => $unit_id, 'use_id' => $use_id, 'imp_date' => $imp_date, 'imp_total' => $total]
        );
        $importInvoices = DB::table('ImportInvoices')
            ->select('ImportInvoices.*')
            ->where('ImportInvoices.unit_id', $unit_id)
            ->where('ImportInvoices.use_id', $use_id)
            ->where('ImportInvoices.imp_date', $imp_date)
            ->where('ImportInvoices.imp_total', $total)
            ->get();
        foreach ($importInvoices as $importInvoice) {
            for ($i = 0; $i < $count; $i++) {
                DB::table('ImportInvoiceDetails')->insert(
                    [
                        'imp_id' => $importInvoice->imp_id, 'prd_id' => $prd_id[$i], 'imp_quantity' => $imp_quantity[$i],
                        'imp_price' => $imp_price[$i], 'imp_expiryDate' => $imp_expiryDate[$i], 'prd_status_id' => 1,
                        'imp_quantity_left' => $imp_quantity[$i],
                    ]
                );
            }
        }
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
            $importInvoices = DB::table('ImportInvoices')
                ->join('SupplyUnits', 'ImportInvoices.unit_id', '=', 'SupplyUnits.unit_id')
                ->join('Users', 'ImportInvoices.use_id', '=', 'Users.id')
                ->select('ImportInvoices.*', 'SupplyUnits.unit_name', 'Users.name', 'Users.use_lastName')
                ->where('ImportInvoices.imp_id', $importInvoice->imp_id)
                ->get();
            return view('admin/importInvoice.edit', ['importInvoices' => $importInvoices]);
        } else {
            return view('error/khong-co-quyen-admin');
        }
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
}
