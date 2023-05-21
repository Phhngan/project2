<?php

namespace App\Http\Controllers;

use App\Models\Salesinvoice;
use App\Models\Salesinvoicedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesInvoiceController extends Controller
{
    //chua xac nhan
    function chuaXacNhan()
    {
        // $salesInvoices = Salesinvoice::where('sal_status_id', 1)->get();
        $salesInvoices = DB::table('SalesInvoices')
            ->join('Users', 'SalesInvoices.use_id', '=', 'Users.id')
            ->join('Provinces', 'SalesInvoices.pro_id', '=', 'Provinces.pro_id')
            ->select('SalesInvoices.*', 'Users.use_lastName', 'Users.name', 'Provinces.pro_name')
            ->where('sal_status_id', 1)
            ->get();
        return view('admin/salesInvoice.chua-xac-nhan', ['salesInvoices' => $salesInvoices]);
    }

    //da xac nhan
    function daXacNhan()
    {
        // $salesInvoices = Salesinvoice::where('sal_status_id', 2)->get();
        $salesInvoices = DB::table('SalesInvoices')
            ->join('Users', 'SalesInvoices.use_id', '=', 'Users.id')
            ->join('Provinces', 'SalesInvoices.pro_id', '=', 'Provinces.pro_id')
            ->select('SalesInvoices.*', 'Users.use_lastName', 'Users.name', 'Provinces.pro_name')
            ->where('sal_status_id', 2)
            ->get();
        return view('admin/salesInvoice.da-xac-nhan', ['salesInvoices' => $salesInvoices]);
    }

    //ship hang
    function shipHang()
    {
        // $salesInvoices = Salesinvoice::where('sal_status_id', 3)->get();
        $salesInvoices = DB::table('SalesInvoices')
            ->join('Users', 'SalesInvoices.use_id', '=', 'Users.id')
            ->join('Provinces', 'SalesInvoices.pro_id', '=', 'Provinces.pro_id')
            ->select('SalesInvoices.*', 'Users.use_lastName', 'Users.name', 'Provinces.pro_name')
            ->where('sal_status_id', 3)
            ->get();
        return view('admin/salesInvoice.ship-hang', ['salesInvoices' => $salesInvoices]);
    }

    //thanh cong
    function thanhCong()
    {
        // $salesInvoices = Salesinvoice::where('sal_status_id', 4)->get();
        $salesInvoices = DB::table('SalesInvoices')
            ->join('Users', 'SalesInvoices.use_id', '=', 'Users.id')
            ->join('Provinces', 'SalesInvoices.pro_id', '=', 'Provinces.pro_id')
            ->select('SalesInvoices.*', 'Users.use_lastName', 'Users.name', 'Provinces.pro_name')
            ->where('sal_status_id', 4)
            ->orderByDesc('sal_id')
            ->get();
        return view('admin/salesInvoice.thanh-cong', ['salesInvoices' => $salesInvoices]);
    }

    //da huy
    function daHuy()
    {
        // $salesInvoices = Salesinvoice::where('sal_status_id', 5)->get();
        $salesInvoices = DB::table('SalesInvoices')
            ->join('Users', 'SalesInvoices.use_id', '=', 'Users.id')
            ->join('Provinces', 'SalesInvoices.pro_id', '=', 'Provinces.pro_id')
            ->select('SalesInvoices.*', 'Users.use_lastName', 'Users.name', 'Provinces.pro_name')
            ->where('sal_status_id', 5)
            ->orderByDesc('sal_id')
            ->get();
        return view('admin/salesInvoice.da-huy', ['salesInvoices' => $salesInvoices]);
    }

    //detail
    function show($sal_id)
    {
        // $salesInvoiceDetails = Salesinvoicedetail::findOrFail($sal_id);
        $salesInvoiceDetails = DB::table('SalesInvoiceDetails')
            ->join('Products', 'SalesInvoiceDetails.prd_id', '=', 'Products.prd_id')
            ->select('SalesInvoiceDetails.*', 'Products.prd_code', 'Products.prd_name', 'Products.prd_weigh')
            ->where('sal_id', $sal_id)
            ->get();
        return view('admin/salesInvoice.details', ['salesInvoiceDetails' => $salesInvoiceDetails], ['sal_id', $sal_id]);
    }

    //continue
    // function continue($sal_id)
    // {
    //     $user = Auth::user();
    //     if ($user->pos_id == 2 || $user->pos_id == 4) {
    //         $salesInvoice = Salesinvoice::findOrFail($sal_id);
    //         $sal_status_id = $salesInvoice->sal_status_id;
    //         if ($sal_status_id == 1) {
    //             $invoices =  DB::table('SalesInvoiceDetails')
    //                 ->select('SalesInvoiceDetails.*')
    //                 ->where('sal_id', $sal_id)
    //                 ->get();
    //             foreach ($invoices as $invoice) {
    //                 $products = DB::table('ImportInvoiceDetails')
    //                     ->join('ImportInvoices', 'ImportInvoiceDetails.imp_id', '=', 'ImportInvoices.imp_id')
    //                     ->select('ImportInvoiceDetails.*')
    //                     ->where('prd_status_id', '<', 3)
    //                     ->where('imp_quantity_left', '>', 0)
    //                     ->where('prd_id', $invoice->prd_id)
    //                     ->orderBy('id')
    //                     ->take(1)
    //                     ->get();
    //                 foreach ($products as $product) {
    //                     if ($product->imp_quantity_left >= $invoice->sal_quantity) {
    //                         DB::table('ImportInvoiceDetails')->where('id', $product->id)
    //                             ->update(['imp_quantity_left' => $product->imp_quantity_left - $invoice->sal_quantity]);
    //                     } else {
    //                         $left = $invoice->sal_quantity - $product->imp_quantity_left;
    //                         DB::table('ImportInvoiceDetails')->where('id', $product->id)
    //                             ->update(['imp_quantity_left' => 0]);
    //                         $productLefts = DB::table('ImportInvoiceDetails')
    //                             ->join('ImportInvoices', 'ImportInvoiceDetails.imp_id', '=', 'ImportInvoices.imp_id')
    //                             ->select('ImportInvoiceDetails.*')
    //                             ->where('prd_status_id', '<', 3)
    //                             ->where('imp_quantity_left', '>', 0)
    //                             ->where('prd_id', $invoice->prd_id)
    //                             ->orderBy('id')
    //                             ->take(1)
    //                             ->get();
    //                         foreach ($productLefts as $productLeft) {
    //                             DB::table('ImportInvoiceDetails')->where('id', $productLeft->id)
    //                                 ->update(['imp_quantity_left' => $productLeft->imp_quantity_left - $left]);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //         DB::table('SalesInvoices')->where('sal_id', $sal_id)
    //             ->update(['sal_status_id' => $sal_status_id + 1]);
    //         return redirect('admin/salesInvoice/chua-xac-nhan');
    //     } else {
    //         return view('error/khong-co-quyen-admin');
    //     }
    // }

    //Chuyển xác nhận
    function xacnhan($sal_id)
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 4) {
            // $salesInvoice = Salesinvoice::findOrFail($sal_id);
            // $sal_status_id = $salesInvoice->sal_status_id;
            // if ($sal_status_id == 1) {
            $invoices =  DB::table('SalesInvoiceDetails')
                ->select('SalesInvoiceDetails.*')
                ->where('sal_id', $sal_id)
                ->get();
            foreach ($invoices as $invoice) {
                $products = DB::table('ImportInvoiceDetails')
                    ->join('ImportInvoices', 'ImportInvoiceDetails.imp_id', '=', 'ImportInvoices.imp_id')
                    ->select('ImportInvoiceDetails.*')
                    ->where('prd_status_id', '<', 3)
                    ->where('imp_quantity_left', '>', 0)
                    ->where('prd_id', $invoice->prd_id)
                    ->orderBy('id')
                    ->take(1)
                    ->get();
                foreach ($products as $product) {
                    if ($product->imp_quantity_left >= $invoice->sal_quantity) {
                        DB::table('ImportInvoiceDetails')->where('id', $product->id)
                            ->update(['imp_quantity_left' => $product->imp_quantity_left - $invoice->sal_quantity]);
                    } else {
                        $left = $invoice->sal_quantity - $product->imp_quantity_left;
                        DB::table('ImportInvoiceDetails')->where('id', $product->id)
                            ->update(['imp_quantity_left' => 0]);
                        $productLefts = DB::table('ImportInvoiceDetails')
                            ->join('ImportInvoices', 'ImportInvoiceDetails.imp_id', '=', 'ImportInvoices.imp_id')
                            ->select('ImportInvoiceDetails.*')
                            ->where('prd_status_id', '<', 3)
                            ->where('imp_quantity_left', '>', 0)
                            ->where('prd_id', $invoice->prd_id)
                            ->orderBy('id')
                            ->take(1)
                            ->get();
                        foreach ($productLefts as $productLeft) {
                            DB::table('ImportInvoiceDetails')->where('id', $productLeft->id)
                                ->update(['imp_quantity_left' => $productLeft->imp_quantity_left - $left]);
                        }
                    }
                }
            }
            // }
            DB::table('SalesInvoices')->where('sal_id', $sal_id)
                ->update(['sal_status_id' => 2]);
            return redirect('admin/salesInvoice/da-xac-nhan');
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }

    //Giao hàng
    function giaohang($sal_id)
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 4 ||$user->pos_id == 5) {
            DB::table('SalesInvoices')->where('sal_id', $sal_id)
                ->update(['sal_status_id' => 3]);
            return redirect('admin/salesInvoice/ship-hang');
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }

    //Hoàn thành
    function hoanthanh($sal_id)
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 4 ||$user->pos_id == 5) {
            DB::table('SalesInvoices')->where('sal_id', $sal_id)
                ->update(['sal_status_id' => 4]);
            return redirect('admin/salesInvoice/thanh-cong');
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }

    //cancel
    function cancel($sal_id)
    {
        $user = Auth::user();
        if ($user->pos_id == 2 || $user->pos_id == 4) {
            DB::table('SalesInvoices')->where('sal_id', $sal_id)
                ->update(['sal_status_id' => 5]);
            return redirect('admin/salesInvoice/da-huy');
        } else {
            return view('error/khong-co-quyen-admin');
        }
    }
}
