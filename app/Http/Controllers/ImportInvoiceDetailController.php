<?php

namespace App\Http\Controllers;

use App\Models\Importinvoicedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportInvoiceDetailController extends Controller
{
    //Hien thi toan bo 
    function index($imp_id)
    {
        $importInvoiceDetails = Importinvoicedetail::where('imp_id', $imp_id)->get();
        return view('admin/importInvoice/detail.index', ['importInvoiceDetails' => $importInvoiceDetails]);
    }

    //Tao moi
    function create()
    {
        return view('admin/importInvoice/detail.create');
    }
    function save(Request $request, $imp_id)
    {
        $prd_id = $request->get('productId');
        $imp_quantity = $request->get('quantity');
        $imp_price = $request->get('price');
        $imp_expiryDate = $request->get('expiryDate');
        DB::table('ImportInvoiceDetails')->insert(
            ['imp_id' => $imp_id, 'prd_id' => $prd_id, 'imp_quantity' => $imp_quantity, 
            'imp_price' => $imp_price, 'imp_expiryDate' => $imp_expiryDate, 'prd_status_id' => 1, 
            'imp_quantity_left' => $imp_quantity,]
        );
        return [ImportInvoiceDetailController::class, 'index'];
    }

    //Sua
    function edit($id)
    {
        $importInvoiceDetail = Importinvoicedetail::findOrFail($id);
        if ($importInvoiceDetail == null) {
            return redirect()->route('error');
        }
        return view('admin/importInvoice/detail.edit', ['importInvoiceDetail' => $importInvoiceDetail]);
    }
    function update(Request $request, $id)
    {
        $prd_id = $request->get('productId');
        $imp_quantity = $request->get('quantity');
        $imp_price = $request->get('price');
        $imp_expiryDate = $request->get('expiryDate');
        DB::table('ImportInvoiceDetails')->where('id', $id)
            ->update(['prd_id' => $prd_id, 'imp_quantity' => $imp_quantity, 
            'imp_price' => $imp_price, 'imp_expiryDate' => $imp_expiryDate]);
        return redirect('admin/importInvoice/{imp_id}');
    }

    // Xoa 1 sp theo id
    function delete($id)
    {
        DB::table('ImportInvoiceDetails')->where('id', $id)->delete();
        return redirect('admin/importInvoice/{imp_id}');
    }
}
