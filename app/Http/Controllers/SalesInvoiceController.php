<?php

namespace App\Http\Controllers;

use App\Models\Salesinvoice;
use App\Models\Salesinvoicedetail;
use Illuminate\Http\Request;
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
            ->get();
        return view('admin/salesInvoice.da-huy', ['salesInvoices' => $salesInvoices]);
    }

    //detail
    function show($sal_id)
    {
        $salesInvoiceDetails = Salesinvoicedetail::findOrFail($sal_id);
        return view('admin/salesInvoice.details', ['salesInvoiceDetails' => $salesInvoiceDetails]);
    }

    //continue
    function continue($sal_id)
    {   
        $salesInvoice = Salesinvoice::findOrFail($sal_id);
        $sal_status_id = $salesInvoice->sal_status_id;
        DB::table('SalesInvoices')->where('sal_id', $sal_id)
            ->update(['sal_status_id' => $sal_status_id + 1]);
        return redirect('admin/salesInvoice/chua-xac-nhan');
    }

    //cancel
    function cancel($sal_id)
    {   
        DB::table('SalesInvoices')->where('sal_id', $sal_id)
            ->update(['sal_status_id' => 5]);
        return redirect('admin/salesInvoice/da-huy');
    }
}
