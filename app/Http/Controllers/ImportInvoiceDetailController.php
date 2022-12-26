<?php

namespace App\Http\Controllers;

use App\Models\Importinvoice;
use App\Models\Importinvoicedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportInvoiceDetailController extends Controller
{
    //Hien thi toan bo 
    function index($imp_id)
    {
        $importInvoice = Importinvoice::findOrFail($imp_id);
        // $importInvoiceDetails = Importinvoicedetail::where('imp_id', $imp_id)->get();
        $importInvoiceDetails = DB::table('ImportInvoiceDetails')
        ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
        ->select('ImportInvoiceDetails.*', 'Products.prd_name', 'Products.prd_code')
        ->where('ImportInvoiceDetails.imp_id', $imp_id)->orderByDesc('ImportInvoiceDetails.id')
        ->get();
        // $importInvoice = Importinvoice::where('imp_id', $imp_id)->get();
        return view('admin/importInvoice/detail.index', ['importInvoiceDetails' => $importInvoiceDetails], ['importInvoice' => $importInvoice]);
    }

    //Tao moi
    function create($imp_id)
    {
        return view('admin/importInvoice/detail.create', ['imp_id' =>$imp_id]);
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
            'imp_quantity-left' => $imp_quantity,]
        );
        return redirect('admin/importInvoice');
    }

    //Sua
    function edit($imp_id, $id)
    {
        // $importInvoice = Importinvoice::findOrFail($imp_id);
        $importInvoiceDetail = Importinvoicedetail::findOrFail($id);
        // $importInvoiceDetail = Importinvoicedetail::where('id', $id)->get();
        if ($importInvoiceDetail == null) {
            return redirect()->route('error');
        }
        return view('admin/importInvoice/detail.edit', ['importInvoiceDetail' => $importInvoiceDetail], ['imp_id' =>$imp_id], ['id' => $id]);
    }
    function update(Request $request, $id, $imp_id)
    {
        $prd_id = $request->get('productId');
        $imp_quantity = $request->get('quantity');
        $imp_price = $request->get('price');
        $imp_expiryDate = $request->get('expiryDate');
        DB::table('ImportInvoiceDetails')->where('id', $id)
            ->update(['prd_id' => $prd_id, 'imp_quantity' => $imp_quantity, 
            'imp_price' => $imp_price, 'imp_expiryDate' => $imp_expiryDate]);
        return redirect('admin/importInvoice');
    }

    // Xoa 1 sp theo id
    function delete($id)
    {
        DB::table('ImportInvoiceDetails')->where('id', $id)->delete();
        return redirect('admin/importInvoice/{imp_id}');
    }
}
