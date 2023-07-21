<?php

namespace App\Http\Controllers;

use App\Models\Importinvoicedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductStatusController extends Controller
{
    //Con han
    function conHan()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $products = DB::table('ImportInvoiceDetails')
                ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->distinct()
                ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name', 'Products.prd_image')
                ->where('prd_status_id', 1)
                ->orderBy('prd_id')
                // ->paginate(8);
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
            return view('admin/productStatus.con-han', ['products' => $products]);
        }
    }

    //Gan het han
    function ganHetHan()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $products = DB::table('ImportInvoiceDetails')
                ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->distinct()
                ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name', 'Products.prd_image')
                ->where('prd_status_id', 2)
                ->orderBy('prd_id')
                ->get();
            return view('admin/productStatus.gan-het-han', ['products' => $products]);
        }
    }

    //Het han
    function hetHan()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $products = DB::table('ImportInvoiceDetails')
                ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->distinct()
                ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name', 'Products.prd_image')
                ->where('prd_status_id', 3)
                ->orderBy('prd_id')
                ->get();
            return view('admin/productStatus.het-han', ['products' => $products]);
        }
    }

    //Ban het
    function banHet()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $products = DB::table('ImportInvoiceDetails')
                ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->distinct()
                ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.prd_status_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name', 'Products.prd_image')
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
    }

    //Khong con san xuat
    function khongConSanXuat()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $products = DB::table('ImportInvoiceDetails')
                ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->distinct()
                ->select('ImportInvoiceDetails.prd_id', 'Products.prd_code', 'Products.prd_name', 'Products.prd_image')
                ->where('prd_status_id', 5)
                ->orderBy('prd_id')
                ->get();
            return view('admin/productStatus.khong-con-san-xuat', ['products' => $products]);
        }
    }

    //Chuyen
    function chuyen($prd_id)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2 || $user->pos_id == 3) {
                DB::table('ImportInvoiceDetails')->where('prd_id', $prd_id)
                    ->update(['prd_status_id' => 5]);
                return redirect('admin/productStatus/khong-con-san-xuat');
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }

    //Update
    function update()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $products = DB::table('ImportInvoiceDetails')
                ->join('Products', 'ImportInvoiceDetails.prd_id', '=', 'Products.prd_id')
                ->distinct()
                ->select('ImportInvoiceDetails.prd_id', 'ImportInvoiceDetails.imp_expiryDate', 'Products.prd_code', 'Products.prd_name', 'Products.prd_image')
                ->where('prd_status_id', '<', 4)
                ->orderBy('prd_id')
                ->get();
            foreach ($products as $product) {
                // var_dump($productCompare);
                $today = date_create();
                $expiry_date = date_create($product->imp_expiryDate);
                $compare = intval(date_diff($expiry_date, $today)->format("%R%a"));
                if (-10 >= $compare &&  $compare >= -40) {
                    DB::table('ImportInvoiceDetails')->where('prd_id', $product->prd_id)->where('imp_expiryDate', $product->imp_expiryDate)
                        ->update(['prd_status_id' => 2]);
                }
                if ($compare < -40) {
                    DB::table('ImportInvoiceDetails')->where('prd_id', $product->prd_id)->where('imp_expiryDate', $product->imp_expiryDate)
                        ->update(['prd_status_id' => 1]);
                }
                if ($compare > -10) {
                    DB::table('ImportInvoiceDetails')->where('prd_id', $product->prd_id)->where('imp_expiryDate', $product->imp_expiryDate)
                        ->update(['prd_status_id' => 3]);
                }
            }
            return redirect('admin/productStatus/con-han');
        }
    }
}
