<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    //
    function index()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $vouchers = DB::table('Vouchers')
                ->select('Vouchers.*')
                ->orderByDesc('Vouchers.vou_id')
                ->get();
            return view('admin/voucher.index', ['vouchers' => $vouchers]);
        }
    }

    function edit($vou_id)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2 || $user->pos_id == 5) {
                $voucher = Voucher::findOrFail($vou_id);
                // $product = DB::table('Product')->where('prd_id',$prd_id)->get();
                if ($voucher == null) {
                    return redirect()->route('error');
                }
                return view('admin/voucher.edit', ['voucher' => $voucher]);
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }

    function update(Request $request, $vou_id)
    {
        $voucherName = $request->get('voucherName');
        $voucherDate = $request->get('voucherDate');
        $voucherDiscount = $request->get('voucherDiscount');
        $voucherMin = $request->get('voucherMin');
        $image = $request->file('voucherImage');
        if ($image != null) {
            $voucherImage = $request->file('voucherImage')->store('public');
            DB::table('Vouchers')->where('vou_id', $vou_id)
                ->update([
                    'vou_title' => $voucherName, 'vou_image' => $voucherImage, 'vou_day' => $voucherDate, 'vou_discount' => $voucherDiscount, 'vou_min' => $voucherMin,
                ]);
        } else {
            DB::table('Vouchers')->where('vou_id', $vou_id)
                ->update([
                    'vou_title' => $voucherName, 'vou_day' => $voucherDate, 'vou_discount' => $voucherDiscount, 'vou_min' => $voucherMin,
                ]);
        }
        return redirect('admin/voucher');
    }

    function create()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            if ($user->pos_id == 2 || $user->pos_id == 5) {
                return view('admin/voucher.create');
            } else {
                return view('error/khong-co-quyen-admin');
            }
        }
    }
    function save(Request $request)
    {
        $voucherName = $request->get('voucherName');
        $voucherImage = $request->file('voucherImage')->store('public');
        $voucherDate = $request->get('voucherDate');
        $voucherDiscount = $request->get('voucherDiscount');
        $voucherMin = $request->get('voucherMin');

        DB::table('Vouchers')->insert(
            [
                'vou_title' => $voucherName, 'vou_image' => $voucherImage, 'vou_day' => $voucherDate, 'vou_discount' => $voucherDiscount, 'vou_min' => $voucherMin,
            ]
        );
        return redirect('admin/voucher');
    }
}
