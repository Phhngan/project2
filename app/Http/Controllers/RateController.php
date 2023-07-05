<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    function all($sal_id)
    {
        $user = Auth::user();
        // dd($user);
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            $invoiceDetails =  DB::table('SalesInvoiceDetails')
                ->join('Products', 'SalesInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->select('SalesInvoiceDetails.*', 'Products.*')
                ->where('SalesInvoiceDetails.sal_id', $sal_id)
                ->orderBy('SalesInvoiceDetails.id')
                ->get();
            // dd($invoiceDetails);
            return view('user/clientInfo.ratting', ['invoiceDetails' => $invoiceDetails]);
        }
    }

    function detail($id)
    {
        $user = Auth::user();
        // dd($user);
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            $invoiceDetails =  DB::table('SalesInvoiceDetails')
                ->join('Products', 'SalesInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->select('SalesInvoiceDetails.*', 'Products.*')
                ->where('SalesInvoiceDetails.id', $id)
                ->get();
            // dd($invoiceDetails);
            return view('user/clientInfo.rattingSP', ['invoiceDetails' => $invoiceDetails]);
        }
    }

    function update(Request $request, $id)
    {
        $user = Auth::user();
        $star = $request->get('star');
        $comment = $request->get('comment');
        // dd($star);
        // dd($comment);
        $invoices =  DB::table('SalesInvoiceDetails')
            ->select('SalesInvoiceDetails.*')
            ->where('SalesInvoiceDetails.id', $id)
            ->get();
        $today = date('Y-m-d');
        foreach ($invoices as $invoice) {
            $sal_id = $invoice->sal_id;
            DB::table('Comments')->insert(
                [
                    'use_id' => $user->id, 'prd_id' => $invoice->prd_id, 'sal_id' => $invoice->sal_id, 'com_rate' => $star,
                    'com_detail' => $comment, 'com_date' => $today
                ]
            );
            $countInvoice = DB::table('SalesInvoiceDetails')
                ->select('SalesInvoiceDetails.*')
                ->where('SalesInvoiceDetails.sal_id', $invoice->sal_id)
                ->count();
            $countComment = DB::table('Comments')
                ->select('Comments.*')
                ->where('Comments.sal_id', $invoice->sal_id)
                ->count();
        }
        if ($countComment < $countInvoice) {
            return redirect()->to("http://127.0.0.1:8000/client/invoices/" . $sal_id . "/ratting");
        } else {
            DB::table('Users')->where('Users.id', $user->id)
                ->update([
                    'use_gold' => $user->use_gold + 500
                ]);
            return redirect()->to("http://127.0.0.1:8000/client/invoices");
        }
    }
}
