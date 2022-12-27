<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductStatusController extends Controller
{
    //Con han
    function conHan()
    {
        // Lay du lieu
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            // ->select('ImportInvoiceDetails.imp_expiryDate')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 1)
            ->orderBy('prd_id')
            ->get();
        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
        return view('admin/productStatus.con-han', ['products' => $products]);
    }

    //Gan het han
    function ganHetHan()
    {
        // Lay du lieu
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            // ->select('ImportInvoiceDetails.imp_expiryDate')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 2)
            ->orderBy('prd_id')
            ->get();
        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
        return view('admin/productStatus.gan-het-han', ['products' => $products]);
    }

    //Het han
    function hetHan()
    {
        // Lay du lieu
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            // ->select('ImportInvoiceDetails.imp_expiryDate')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 3)
            ->orderBy('prd_id')
            ->get();
        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
        return view('admin/productStatus.het-han', ['products' => $products]);
    }

    //Ban het
    function banHet()
    {
        // Lay du lieu
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            // ->select('ImportInvoiceDetails.imp_expiryDate')
            ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_quantity_left', 'ImportInvoiceDetails.imp_id',
                'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 4)
            ->orderBy('prd_id')
            ->get();
        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
        return view('admin/productStatus.ban-het', ['products' => $products]);
    }

    //Khong con san xuat
    function khongConSanXuat()
    {
        // Lay du lieu
        $products = DB::table('ImportInvoiceDetails')
            ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
            // ->select('ImportInvoiceDetails.imp_expiryDate')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name')
            ->where('prd_status_id', 5)
            ->orderBy('prd_id')
            ->get();
        // Tra ve view -> view se render ra man hinh
        // return view('admin/product.index',['products'=> $products],['images'=> $images],['type'=> $type]);
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
