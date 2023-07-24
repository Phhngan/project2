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
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $importInvoices = DB::table('ImportInvoices')
                ->join('SupplyUnits', 'ImportInvoices.unit_id', '=', 'SupplyUnits.unit_id')
                ->join('Users', 'ImportInvoices.use_id', '=', 'Users.id')
                ->select('ImportInvoices.*', 'SupplyUnits.unit_name', 'Users.name')->orderByDesc('ImportInvoices.imp_id')
                ->orderByDesc('ImportInvoices.imp_id')
                ->get();
            return view('admin/importInvoice.index', ['importInvoices' => $importInvoices]);
        }
    }

    //Tao moi
    function create()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2 || $user->pos_id == 3) {
                return view('admin/importInvoice.create');
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }
    function save(Request $request)
    {
        $user = Auth::user();
        $unit_id = $request->get('unitId');
        // $use_id = $request->get('userId');
        $imp_date = $request->get('importDate');
        $imp_note = $request->get('importNote');
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
            ['unit_id' => $unit_id, 'use_id' => $user->id, 'imp_date' => $imp_date, 'imp_note' => $imp_note, 'imp_total' => $total]
        );
        $importInvoices = DB::table('ImportInvoices')
            ->select('ImportInvoices.*')
            ->where('ImportInvoices.unit_id', $unit_id)
            ->where('ImportInvoices.use_id', $user->id)
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
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
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
                $importInvoiceDetails = DB::table('ImportInvoiceDetails')
                    ->select('ImportInvoiceDetails.*')
                    ->where('ImportInvoiceDetails.imp_id', $importInvoice->imp_id)
                    ->get();
                return view('admin/importInvoice.edit', ['importInvoices' => $importInvoices], ['importInvoiceDetails' => $importInvoiceDetails]);
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }
    function update(Request $request, $imp_id)
    {
        $unit_id = $request->get('unitId');
        // $use_id = $request->get('userId');
        $imp_date = $request->get('importDate');
        $imp_note = $request->get('importNote');
        $prd_id = $request->input('productId');
        $imp_quantity = $request->get('quantity');
        $imp_price = $request->get('price');
        $imp_expiryDate = $request->get('expiryDate');
        $count = count($prd_id);
        $total = 0;
        for ($i = 0; $i < $count; $i++) {
            $total = $total + ($imp_price[$i] * $imp_quantity[$i]);
        }
        DB::table('ImportInvoices')->where('imp_id', $imp_id)
            ->update(['unit_id' => $unit_id, 'imp_date' => $imp_date, 'imp_note' => $imp_note, 'imp_total' => $total]);
        $importInvoiceDetails = DB::table('ImportInvoiceDetails')
            ->select('ImportInvoiceDetails.*')
            ->where('ImportInvoiceDetails.imp_id', $imp_id)
            ->get();
        $i = 0;
        foreach ($importInvoiceDetails as $importInvoiceDetail) {
            DB::table('ImportInvoiceDetails')->where('id', $importInvoiceDetail->id)
                ->update([
                    'prd_id' => $prd_id[$i], 'imp_quantity' => $imp_quantity[$i],
                    'imp_price' => $imp_price[$i], 'imp_expiryDate' => $imp_expiryDate[$i],
                    'imp_quantity_left' => $imp_quantity[$i]
                ]);
            $i++;
        }
        if ($count > $i) {
            for ($t = $i; $t < $count; $t++) {
                DB::table('ImportInvoiceDetails')->insert(
                    [
                        'imp_id' => $imp_id, 'prd_id' => $prd_id[$t], 'imp_quantity' => $imp_quantity[$t],
                        'imp_price' => $imp_price[$t], 'imp_expiryDate' => $imp_expiryDate[$t], 'prd_status_id' => 1,
                        'imp_quantity_left' => $imp_quantity[$t],
                    ]
                );
            }
        }
        return redirect('admin/importInvoice');
    }

    //chi tiet hoa don
    function show($imp_id)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $importInvoice = Importinvoice::findOrFail($imp_id);
            $importInvoiceDetails = DB::table('ImportInvoiceDetails')
                ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->select('ImportInvoiceDetails.*', 'Products.prd_name', 'Products.prd_code', 'Products.prd_image')
                ->where('ImportInvoiceDetails.imp_id', $imp_id)->orderByDesc('ImportInvoiceDetails.id')
                ->get();
            return view('admin/importInvoice/detail.index', ['importInvoiceDetails' => $importInvoiceDetails], ['importInvoice' => $importInvoice]);
        }
    }
}
