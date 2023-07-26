<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Undefined;
use stdClass;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    function takeYear(Request $request)
    {
        if ($request->get('quantity') == null) {
            $date = getdate();
            $year = $date['year'];
        } else {
            $year = $request->get('quantity');
        }
        // var_dump($year);
        return redirect('admin/home/' . $year);
    }

    function takeTime(Request $request, $year)
    {
        if ($request->get('quy') == null) {
            $timeId = 1;
        } else {
            $timeId = $request->get('quy');
        }
        return redirect('admin/home/' . $year . '/' . $timeId);
    }
    function viewHome($year, $timeId)
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $date = getdate();
            $yearNow = $date['year'];
            if ($timeId == 1) {
                $salesInvoices = DB::table('SalesInvoiceDetails')
                    ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                    ->select('SalesInvoiceDetails.prd_id')
                    ->whereBetween('SalesInvoices.sal_date', [$year . '-01-01', $year . '-12-31'])
                    ->distinct()
                    ->get();
                if (count($salesInvoices) != 0) {
                    foreach ($salesInvoices as $salesInvoice) {
                        $array[$salesInvoice->prd_id] = DB::table('SalesInvoiceDetails')
                            ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                            ->whereBetween('SalesInvoices.sal_date', [$year . '-01-01', $year . '-12-31'])
                            ->where('SalesInvoiceDetails.prd_id', $salesInvoice->prd_id)
                            ->sum('SalesInvoiceDetails.sal_quantity');
                        $prd_id[] = $salesInvoice->prd_id;
                    }
                    for ($t = 0; $t < count($prd_id); $t++) {
                        for ($i = 0; $i < count($prd_id); $i++) {
                            $quantity = DB::table('SalesInvoiceDetails')
                                ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                                ->whereBetween('SalesInvoices.sal_date', [$year . '-01-01', $year . '-12-31'])
                                ->where('SalesInvoiceDetails.prd_id', $prd_id[$i])
                                ->sum('SalesInvoiceDetails.sal_quantity');
                            if ($quantity == max($array)) {
                                $productSort[$t]['prd_id'] = $prd_id[$i];
                                $productSort[$t]['quantity'] = $quantity;
                                $id = $prd_id[$i];
                                $a = $i;
                            }
                        }
                        unset($array[$id]);
                        $prd_id[$a] = 0;
                    }
                } else {
                    $productSort = [];
                }
            }
            if ($timeId == 2) {
                $salesInvoices = DB::table('SalesInvoiceDetails')
                    ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                    ->select('SalesInvoiceDetails.prd_id')
                    ->whereBetween('SalesInvoices.sal_date', [$year . '-01-01', $year . '-03-31'])
                    ->distinct()
                    ->get();
                if (count($salesInvoices) != 0) {
                    foreach ($salesInvoices as $salesInvoice) {
                        $array[$salesInvoice->prd_id] = DB::table('SalesInvoiceDetails')
                            ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                            ->whereBetween('SalesInvoices.sal_date', [$year . '-01-01', $year . '-03-31'])
                            ->where('SalesInvoiceDetails.prd_id', $salesInvoice->prd_id)
                            ->sum('SalesInvoiceDetails.sal_quantity');
                        $prd_id[] = $salesInvoice->prd_id;
                    }
                    for ($t = 0; $t < count($prd_id); $t++) {
                        for ($i = 0; $i < count($prd_id); $i++) {
                            $quantity = DB::table('SalesInvoiceDetails')
                                ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                                ->whereBetween('SalesInvoices.sal_date', [$year . '-01-01', $year . '-03-31'])
                                ->where('SalesInvoiceDetails.prd_id', $prd_id[$i])
                                ->sum('SalesInvoiceDetails.sal_quantity');
                            if ($quantity == max($array)) {
                                $productSort[$t]['prd_id'] = $prd_id[$i];
                                $productSort[$t]['quantity'] = $quantity;
                                $id = $prd_id[$i];
                                $a = $i;
                            }
                        }
                        unset($array[$id]);
                        $prd_id[$a] = 0;
                    }
                } else {
                    $productSort = [];
                }
            }
            if ($timeId == 3) {
                $salesInvoices = DB::table('SalesInvoiceDetails')
                    ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                    ->select('SalesInvoiceDetails.prd_id')
                    ->whereBetween('SalesInvoices.sal_date', [$year . '-04-01', $year . '-06-31'])
                    ->distinct()
                    ->get();
                if (count($salesInvoices) != 0) {
                    foreach ($salesInvoices as $salesInvoice) {
                        $array[$salesInvoice->prd_id] = DB::table('SalesInvoiceDetails')
                            ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                            ->whereBetween('SalesInvoices.sal_date', [$year . '-04-01', $year . '-06-31'])
                            ->where('SalesInvoiceDetails.prd_id', $salesInvoice->prd_id)
                            ->sum('SalesInvoiceDetails.sal_quantity');
                        $prd_id[] = $salesInvoice->prd_id;
                    }
                    for ($t = 0; $t < count($prd_id); $t++) {
                        for ($i = 0; $i < count($prd_id); $i++) {
                            $quantity = DB::table('SalesInvoiceDetails')
                                ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                                ->whereBetween('SalesInvoices.sal_date', [$year . '-04-01', $year . '-06-31'])
                                ->where('SalesInvoiceDetails.prd_id', $prd_id[$i])
                                ->sum('SalesInvoiceDetails.sal_quantity');
                            if ($quantity == max($array)) {
                                $productSort[$t]['prd_id'] = $prd_id[$i];
                                $productSort[$t]['quantity'] = $quantity;
                                $id = $prd_id[$i];
                                $a = $i;
                            }
                        }
                        unset($array[$id]);
                        $prd_id[$a] = 0;
                    }
                } else {
                    $productSort = [];
                }
            }
            if ($timeId == 4) {
                $salesInvoices = DB::table('SalesInvoiceDetails')
                    ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                    ->select('SalesInvoiceDetails.prd_id')
                    ->whereBetween('SalesInvoices.sal_date', [$year . '-07-01', $year . '-09-30'])
                    ->distinct()
                    ->get();
                if (count($salesInvoices) != 0) {
                    foreach ($salesInvoices as $salesInvoice) {
                        $array[$salesInvoice->prd_id] = DB::table('SalesInvoiceDetails')
                            ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                            ->whereBetween('SalesInvoices.sal_date', [$year . '-07-01', $year . '-09-30'])
                            ->where('SalesInvoiceDetails.prd_id', $salesInvoice->prd_id)
                            ->sum('SalesInvoiceDetails.sal_quantity');
                        $prd_id[] = $salesInvoice->prd_id;
                    }
                    for ($t = 0; $t < count($prd_id); $t++) {
                        for ($i = 0; $i < count($prd_id); $i++) {
                            $quantity = DB::table('SalesInvoiceDetails')
                                ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                                ->whereBetween('SalesInvoices.sal_date', [$year . '-07-01', $year . '-09-30'])
                                ->where('SalesInvoiceDetails.prd_id', $prd_id[$i])
                                ->sum('SalesInvoiceDetails.sal_quantity');
                            if ($quantity == max($array)) {
                                $productSort[$t]['prd_id'] = $prd_id[$i];
                                $productSort[$t]['quantity'] = $quantity;
                                $id = $prd_id[$i];
                                $a = $i;
                            }
                        }
                        unset($array[$id]);
                        $prd_id[$a] = 0;
                    }
                } else {
                    $productSort = [];
                }
            }
            if ($timeId == 5) {
                $salesInvoices = DB::table('SalesInvoiceDetails')
                    ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                    ->select('SalesInvoiceDetails.prd_id')
                    ->whereBetween('SalesInvoices.sal_date', [$year . '-10-01', $year . '-12-31'])
                    ->distinct()
                    ->get();
                if (count($salesInvoices) != 0) {
                    foreach ($salesInvoices as $salesInvoice) {
                        $array[$salesInvoice->prd_id] = DB::table('SalesInvoiceDetails')
                            ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                            ->whereBetween('SalesInvoices.sal_date', [$year . '-10-01', $year . '-12-31'])
                            ->where('SalesInvoiceDetails.prd_id', $salesInvoice->prd_id)
                            ->sum('SalesInvoiceDetails.sal_quantity');
                        $prd_id[] = $salesInvoice->prd_id;
                    }
                    for ($t = 0; $t < count($prd_id); $t++) {
                        for ($i = 0; $i < count($prd_id); $i++) {
                            $quantity = DB::table('SalesInvoiceDetails')
                                ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
                                ->whereBetween('SalesInvoices.sal_date', [$year . '-10-01', $year . '-12-31'])
                                ->where('SalesInvoiceDetails.prd_id', $prd_id[$i])
                                ->sum('SalesInvoiceDetails.sal_quantity');
                            if ($quantity == max($array)) {
                                $productSort[$t]['prd_id'] = $prd_id[$i];
                                $productSort[$t]['quantity'] = $quantity;
                                $id = $prd_id[$i];
                                $a = $i;
                            }
                        }
                        unset($array[$id]);
                        $prd_id[$a] = 0;
                    }
                } else {
                    $productSort = [];
                }
            }
            return view('admin/home')->with('year', $year)->with('yearNow', $yearNow)->with('timeId', $timeId)->with('productSort', $productSort);
        }
    }

    function viewAllProduct()
    {
        return view('admin/product/index');
    }

    function viewSettings()
    {
        return view('admin/settings');
    }

    //profile admin
    function profile()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $users = DB::table('Users')
                ->select('Users.*')
                ->where('Users.id', $user->id)
                ->get();
            // dd($users);
            return view('admin/setting.profile', ['users' => $users]);
        }
    }

    //update profile
    function edit()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            $users = DB::table('Users')
                ->select('Users.*')
                ->where('Users.id', $user->id)
                ->get();
            return view('admin/setting/edit', ['users' => $users]);
        }
    }
    function update(Request $request)
    {
        $user = Auth::user();
        $use_lastName = $request->get('lastName');
        $name = $request->get('firstName');
        $use_gender = $request->get('gender');
        $use_phone = $request->get('phone');
        $use_province = $request->get('province');
        $use_district = $request->get('district');
        $use_town = $request->get('town');
        $use_detailAddress = $request->get('detailAddress');
        DB::table('Users')->where('id', $user->id)
            ->update([
                'use_lastName' => $use_lastName, 'name' => $name, 'use_gender' => $use_gender, 'use_phone' => $use_phone,
                'use_province' => $use_province, 'use_district' => $use_district, 'use_town' => $use_town, 'use_detailAddress' => $use_detailAddress
            ]);
        return redirect('admin/profile');
    }

    //change pass
    function changePass()
    {
        $user = Auth::user();
        if ($user == null || $user->pos_id == 1) {
            return redirect()->to("http://127.0.0.1:8000/login");
        } else {
            return view('admin/setting.changePass', ['error' => '']);
        }
    }
    function updatePass(Request $request)
    {
        $user = Auth::user();
        $oldPass = $request->get('oldPass');
        $newPass1 = $request->get('newPass1');
        $newPass2 = $request->get('newPass2');
        $a = Hash::check($oldPass, $user->password);
        // dd($oldPass);
        // dd($newPass2);
        if (Hash::check($oldPass, $user->password)) {
            if ($newPass1 == $newPass2) {
                DB::table('Users')->where('id', $user->id)->update(['password' => Hash::make($newPass1)]);
                Auth::logout();
                return redirect('login');
            } else {
                return view('admin/setting.changePass', ['error' => 'Mật khẩu mới không trùng nhau']);
            }
        } else {
            return view('admin/setting.changePass', ['error' => 'Mật khẩu không chính xác']);
        }
    }
}
