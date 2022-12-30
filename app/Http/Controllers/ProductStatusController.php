<?php

namespace App\Http\Controllers;

use App\Models\Importinvoicedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductStatusController extends Controller
{
    //Con han
    function conHan()
    {
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 1)
            ->orderBy('prd_id')
            ->get();
        foreach ($products as $product) {
            $today = date("Y-m-d");
            $new_time = strtotime ( '+30 day' , strtotime ( $today ) ) ;
            $expiry_date = strtotime($product->imp_expiryDate);
            if ($new_time < $expiry_date){
                DB::table('ImportInvoiceDetails')->where('imp_expiryDate', $product->imp_expiryDate)
                    ->update(['prd_status_id' => 1]);
            } else {
                DB::table('ImportInvoiceDetails')->where('imp_expiryDate', $product->imp_expiryDate)
                    ->update(['prd_status_id' => 2]);
            }
            $quantity = Importinvoicedetail::where('prd_id', $product->prd_id)
                ->where('imp_expiryDate', $product->imp_expiryDate)
                ->sum('ImportInvoiceDetails.imp_quantity_left');
            if ($quantity > 0) {
                DB::table('ImportInvoiceDetails')->where('prd_id', $product->prd_id)->where('imp_expiryDate', $product->imp_expiryDate)
                    ->update(['prd_status_id' => 1]);
            } else {
                DB::table('ImportInvoiceDetails')->where('prd_id', $product->prd_id)->where('imp_expiryDate', $product->imp_expiryDate)
                    ->update(['prd_status_id' => 4]);
            }
        }
        return view('admin/productStatus.con-han', ['products' => $products]);
    }

    //Gan het han
    function ganHetHan()
    {
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 2)
            ->orderBy('prd_id')
            ->get();
        return view('admin/productStatus.gan-het-han', ['products' => $products]);
    }

    //Het han
    function hetHan()
    {
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 3)
            ->orderBy('prd_id')
            ->get();
        return view('admin/productStatus.het-han', ['products' => $products]);
    }

    //Ban het
    function banHet()
    {
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            // ->select('ImportInvoiceDetails.imp_expiryDate')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.prd_status_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 4)
            ->orderBy('prd_id')
            ->get();
        foreach ($products as $product) {
            $quantity = Importinvoicedetail::where('prd_id', $product->prd_id)
                ->where('imp_expiryDate', $product->imp_expiryDate)
                ->sum('ImportInvoiceDetails.imp_quantity_left');
            if ($quantity > 0) {
                DB::table('ImportInvoiceDetails')->where('prd_id', $product->prd_id)->where('imp_expiryDate', $product->imp_expiryDate)
                    ->update(['prd_status_id' => 1]);
            } else {
                DB::table('ImportInvoiceDetails')->where('prd_id', $product->prd_id)->where('imp_expiryDate', $product->imp_expiryDate)
                    ->update(['prd_status_id' => 4]);
            }
        }
        return view('admin/productStatus.ban-het', ['products' => $products]);
    }

    //Khong con san xuat
    function khongConSanXuat()
    {
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            // ->select('ImportInvoiceDetails.imp_expiryDate')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 5)
            ->orderBy('prd_id')
            ->get();
        return view('admin/productStatus.khong-con-san-xuat', ['products' => $products]);
    }

    //Chuyen
    function chuyen($prd_id)
    {
        DB::table('ImportInvoiceDetails')->where('prd_id', $prd_id)
            ->update(['prd_status_id' => 5]);
        return redirect('admin/productStatus/khong-con-san-xuat');
    }
}
