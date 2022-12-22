<?php

namespace App\Http\Controllers;

use App\Models\Importinvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportInvoiceController extends Controller
{
    //Hien thi toan bo 
    function index()
    {
        $importInvoices = Importinvoice::get();
        return view('admin/importInvoice.index', ['importInvoices' => $importInvoices]);
    }

    //Tao moi
    function create()
    {
        return view('admin/importInvoice.create');
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
        $importInvoice = Importinvoice::findOrFail($imp_id);
        if ($importInvoice == null) {
            return redirect()->route('error');
        }
        return view('admin/importInvoice.edit', ['importInvoice' => $importInvoice]);
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
    function delete($imp_id)
    {
        DB::table('ImportInvoices')->where('imp_id', $imp_id)->delete();
        return redirect('admin/importInvoice');
    }
}
