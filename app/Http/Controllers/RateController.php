<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    function all($sal_id)
    {
        $invoiceDetails =  DB::table('SalesInvoiceDetails')
            ->join('Products', 'SalesInvoiceDetails.prd_id', '=', 'Products.prd_id')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->select('SalesInvoiceDetails.*', 'Products.prd_name', 'Products.prd_code', 'Images.img_url')
            ->where('SalesInvoiceDetails.sal_id', $sal_id)
            ->orderBy('SalesInvoiceDetails.id')
            ->get();
        // dd($invoiceDetails);
        return view('user/clientInfo.ratting', ['invoiceDetails' => $invoiceDetails]);
    }

    function detail($id)
    {
        $invoiceDetails =  DB::table('SalesInvoiceDetails')
            ->join('Products', 'SalesInvoiceDetails.prd_id', '=', 'Products.prd_id')
            ->join('Images', 'Products.prd_id', '=', 'Images.prd_id')
            ->select('SalesInvoiceDetails.*', 'Products.prd_name', 'Products.prd_code', 'Images.img_url')
            ->where('SalesInvoiceDetails.id', $id)
            ->get();
        // dd($invoiceDetails);
        return view('user/clientInfo.rattingSP', ['invoiceDetails' => $invoiceDetails]);
    }
}
