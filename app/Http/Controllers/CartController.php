<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CartController extends Controller
{
    //add to cart
    function addCart($prd_id)
    {
        $user = Auth::user();
        // dd($user);
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            $carts = DB::table('Carts')
                ->where('Carts.prd_id', $prd_id)
                ->where('Carts.use_id', $user->id)
                ->get();
            $number = count($carts);
            // dd($number);
            if ($number == 1) {
                foreach ($carts as $cart) {
                    DB::table('Carts')->where('prd_id', $prd_id)->where('Carts.use_id', $user->id)
                        ->update([
                            'car_quantity' => $cart->car_quantity + 1
                        ]);
                }
            } else {
                DB::table('Carts')->insert(
                    [
                        'use_id' => $user->id, 'prd_id' => $prd_id, 'car_quantity' => 1
                    ]
                );
                DB::table('Carts')->where('Carts.use_id', $user->id)
                    ->update([
                        'ship_id' => null, 'car_detailAddress' => null, 'car_town' => null, 'car_district' => null, 'car_province' => null
                    ]);
            }
            return back();
        }
    }

    function addCartQuantity($prd_id, Request $request)
    {
        $quantity = $request->get('quantity');
        // dd($quantity);
        $user = Auth::user();
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            $carts = DB::table('Carts')
                ->where('Carts.prd_id', $prd_id)
                ->where('Carts.use_id', $user->id)
                ->get();
            $number = count($carts);
            // dd($number);
            if ($number == 1) {
                foreach ($carts as $cart) {
                    DB::table('Carts')->where('prd_id', $prd_id)->where('Carts.use_id', $user->id)
                        ->update([
                            'car_quantity' => $cart->car_quantity + $quantity
                        ]);
                }
            } else {
                DB::table('Carts')->insert(
                    [
                        'use_id' => $user->id, 'prd_id' => $prd_id, 'car_quantity' => $quantity
                    ]
                );
                DB::table('Carts')->where('Carts.use_id', $user->id)
                    ->update([
                        'ship_id' => null, 'car_detailAddress' => null, 'car_town' => null, 'car_district' => null, 'car_province' => null
                    ]);
            }
            return back();
        }
    }

    //show cart
    function showCart()
    {
        $user = Auth::user();
        if ($user == null) {
            return view('error/chua-dang-nhap');
        } else {
            DB::table('Carts')->where('Carts.use_id', $user->id)
                ->update([
                    'car_note' => null, 'vou_id' => null, 'car_gold' => null
                ]);
            $checks = DB::table('Carts')
                ->select('Carts.*')
                ->where('Carts.use_id', $user->id)
                ->get();
            foreach ($checks as $check) {
                $quantity = DB::table('ImportInvoiceDetails')->where('prd_id', $check->prd_id)
                    ->where('prd_status_id', '<', 3)
                    ->sum('ImportInvoiceDetails.imp_quantity_left');
                if ($quantity == 0) {
                    DB::table('Carts')->where('car_id', $check->car_id)->delete();
                }
            }
            $products = DB::table('Carts')
                ->join('Products', 'Carts.prd_id', '=', 'Products.prd_id')
                ->select('Products.*', 'Carts.*')
                ->where('Carts.use_id', $user->id)
                ->orderByDesc('Carts.car_id')
                ->get();
            $addresses = DB::table('Carts')
                ->distinct()
                ->select('Carts.car_province', 'Carts.car_district', 'Carts.car_town', 'Carts.car_detailAddress')
                ->where('Carts.use_id', $user->id)
                ->get();
            return view('user/cart', ['products' => $products], ['addresses' => $addresses]);
        }
    }

    //update số lượng
    function update(Request $request)
    {
        $car_quantity = $request->get('quantities');
        $car_id = $request->get('car_ids');
        // dd($car_id, $car_quantity);
        for ($i = 0; $i < count($car_id); $i++) {
            DB::table('Carts')->where('car_id', $car_id[$i])
                ->update([
                    'car_quantity' => $car_quantity[$i],
                ]);
        }
        return redirect('/cart');
    }

    //xóa khỏi cart
    function delete($car_id)
    {
        DB::table('Carts')->where('car_id', $car_id)->delete();
        return redirect('/cart');
    }

    //update address
    function updateAddress(Request $request)
    {
        $user = Auth::user();
        $car_province = $request->get('province');
        $car_district = $request->get('district');
        $car_town = $request->get('town');
        $car_detailAddress = $request->get('detailAddress');
        $url = 'https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json';
        $regions = json_decode(file_get_contents($url));
        $id = 0;
        foreach ($regions as $region) {
            if ($car_province == $region->Name) {
                $id = $region->Id;
            }
        }
        if ($id == 1) $ship = 1;
        if ($id >= 2 && $id <= 38) $ship = 2;
        if ($id >= 39 && $id <= 46) $ship = 3;
        if ($id >= 48 && $id <= 96) $ship = 4;
        DB::table('Carts')->where('use_id', $user->id)->update([
            'car_detailAddress' => $car_detailAddress, 'car_province' => $car_province, 'car_district' => $car_district, 'car_town' => $car_town,
            'ship_id' => $ship
        ]);
        return redirect('/cart');
    }

    //show check out
    function showCheckOut()
    {
        $user = Auth::user();
        $products = DB::table('Carts')
            ->join('Products', 'Carts.prd_id', '=', 'Products.prd_id')
            ->select('Products.*', 'Carts.*')
            ->where('Carts.use_id', $user->id)
            ->orderByDesc('Carts.car_id')
            ->get();
        $locations = DB::table('Carts')
            ->select(
                'Carts.car_province',
                'Carts.car_district',
                'Carts.car_town',
                'Carts.car_detailAddress',
                'Carts.car_note',
                'Carts.vou_id',
                'Carts.car_gold'
            )
            ->where('Carts.use_id', $user->id)
            ->distinct()
            ->get();
        // dd($locations);
        $price = 0;
        foreach ($products as $product) {
            $price = $price + (($product->prd_price * (100 - $product->prd_discount) / 100) * $product->car_quantity);
        }
        $today = date('Y-m-d');
        // dd($today);
        $voucherAlls = DB::table('Vouchers')
            ->select('Vouchers.*')
            ->where('Vouchers.vou_day', $today)
            ->where('Vouchers.vou_min', '<=', $price)
            ->get();
        // dd($voucherAlls);
        if (count($voucherAlls) > 0) {
            foreach ($voucherAlls as $voucherAll) {
                $number = DB::table('SalesInvoices')
                    ->select('SalesInvoices.*')
                    ->where('SalesInvoices.vou_id', $voucherAll->vou_id)
                    ->where('SalesInvoices.use_id', $user->id)
                    ->where('SalesInvoices.sal_status_id', '<', 5)
                    ->count();
                if ($number == 0) {
                    $countVoucher = 1;
                } else {
                    $countVoucher = 0;
                }
            }
        } else {
            $countVoucher = 0;
        }
        // dd($countVoucher);
        return view('user/checkout')->with('products', $products)->with('locations', $locations)->with('countVoucher', $countVoucher);
    }

    function updateNote(Request $request)
    {
        $user = Auth::user();
        $car_note = $request->get('note');
        // dd($request->get('quantity'));
        DB::table('Carts')->where('use_id', $user->id)
            ->update([
                'car_note' => $car_note,
            ]);
        return redirect('/checkOut');
    }
    function updateGold(Request $request)
    {
        $user = Auth::user();
        $car_gold = $request->get('gold');
        // dd($request->get('quantity'));
        DB::table('Carts')->where('use_id', $user->id)
            ->update([
                'car_gold' => $car_gold,
            ]);
        return redirect('/checkOut');
    }

    function updateVoucher(Request $request)
    {
        $user = Auth::user();
        $vou_id = $request->get('voucher');
        // dd($request->get('quantity'));
        DB::table('Carts')->where('use_id', $user->id)
            ->update([
                'vou_id' => $vou_id,
            ]);
        return redirect('/checkOut');
    }

    //VNPay payment
    function vnpay()
    {
        $user = Auth::user();
        $products = DB::table('Carts')
            ->join('Products', 'Carts.prd_id', '=', 'Products.prd_id')
            ->select('Products.*', 'Carts.*')
            ->where('Carts.use_id', $user->id)
            ->orderByDesc('Carts.car_id')
            ->get();
        $price = 0;
        foreach ($products as $product) {
            $price = $price + (($product->prd_price * (100 - $product->prd_discount) / 100) * $product->car_quantity);
        }
        $ship_id = 0;
        $weigh = 0;
        foreach ($products as $product) {
            $ship_id = $product->ship_id;
            $weigh = $weigh + ($product->prd_weigh * $product->car_quantity);
        }
        $ships = DB::table('Ships')
            ->select('Ships.*')
            ->where('Ships.ship_id', $ship_id)
            ->get();
        $shipMoney = 0;
        foreach ($ships as $ship) {
            if ($weigh <= 2000) {
                $shipMoney = $ship->ship_price;
            } else {
                $weighDiffer = $weigh - 2000;
                $shipMoney = $ship->ship_price + $ship->ship_extra * ($weighDiffer / 200);
            }
        }
        $detailGolds = DB::table('Carts')
            ->select('Carts.car_gold')
            ->where('Carts.use_id', $user->id)
            ->distinct()
            ->get();
        foreach ($detailGolds as $detailGold) {
            if ($detailGold->car_gold != null) {
                $gold = $detailGold->car_gold;
            } else {
                $gold = 0;
            }
        }
        $detailVous = DB::table('Carts')
            ->select('Carts.vou_id')
            ->where('Carts.use_id', $user->id)
            ->distinct()
            ->get();
        foreach ($detailVous as $detailVou) {
            if ($detailVou->vou_id != null) {
                $vouchers = DB::table('Vouchers')
                    ->select('Vouchers.*')
                    ->where('Vouchers.vou_id', $detailVou->vou_id)
                    ->get();
                foreach ($vouchers as $voucher) {
                    $discount = $voucher->vou_discount;
                }
            } else {
                $discount = 0;
            }
        }
        $total = $price + $shipMoney - $gold - $discount;
        // $code = DB::table('SalesInvoices')
        //     ->max('SalesInvoices.sal_id');
        $code = rand(1, 99999999);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/payment";
        $vnp_TmnCode = "X2E0NQ6E"; //Mã website tại VNPAY
        $vnp_HashSecret = "QAADPQCLFIEWAAUCORDYABVWZHCUGGRM"; //Chuỗi bí mật

        $vnp_TxnRef = $code + 1; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng Snack";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100;
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    //Momo payment
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    function momo()
    {
        $user = Auth::user();
        $products = DB::table('Carts')
            ->join('Products', 'Carts.prd_id', '=', 'Products.prd_id')
            ->select('Products.*', 'Carts.*')
            ->where('Carts.use_id', $user->id)
            ->orderByDesc('Carts.car_id')
            ->get();
        $price = 0;
        foreach ($products as $product) {
            $price = $price + (($product->prd_price * (100 - $product->prd_discount) / 100) * $product->car_quantity);
        }
        $ship_id = 0;
        $weigh = 0;
        foreach ($products as $product) {
            $ship_id = $product->ship_id;
            $weigh = $weigh + ($product->prd_weigh * $product->car_quantity);
        }
        $ships = DB::table('Ships')
            ->select('Ships.*')
            ->where('Ships.ship_id', $ship_id)
            ->get();
        $shipMoney = 0;
        foreach ($ships as $ship) {
            if ($weigh <= 2000) {
                $shipMoney = $ship->ship_price;
            } else {
                $weighDiffer = $weigh - 2000;
                $shipMoney = $ship->ship_price + $ship->ship_extra * ($weighDiffer / 200);
            }
        }
        $detailGolds = DB::table('Carts')
            ->select('Carts.car_gold')
            ->where('Carts.use_id', $user->id)
            ->distinct()
            ->get();
        foreach ($detailGolds as $detailGold) {
            if ($detailGold->car_gold != null) {
                $gold = $detailGold->car_gold;
            } else {
                $gold = 0;
            }
        }
        $detailVous = DB::table('Carts')
            ->select('Carts.vou_id')
            ->where('Carts.use_id', $user->id)
            ->distinct()
            ->get();
        foreach ($detailVous as $detailVou) {
            if ($detailVou->vou_id != null) {
                $vouchers = DB::table('Vouchers')
                    ->select('Vouchers.*')
                    ->where('Vouchers.vou_id', $detailVou->vou_id)
                    ->get();
                foreach ($vouchers as $voucher) {
                    $discount = $voucher->vou_discount;
                }
            } else {
                $discount = 0;
            }
        }
        $total = $price + $shipMoney - $gold - $discount;
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo ATM";
        $amount = $total;
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/payment";
        $ipnUrl = "http://127.0.0.1:8000/payment";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        return redirect()->to($jsonResult['payUrl']);
        // header('Location: ' . $jsonResult['payUrl']);
    }

    //Sau khi thanh toán
    function payment(Request $request)
    {
        $momo_resultCode = $request->get('resultCode');
        // dd($momo_resultCode);
        //1006: hủy, 0: thành công,
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        // dd($vnp_ResponseCode);
        //00: thành công, 24: hủy
        if ($momo_resultCode != null) {
            if ($momo_resultCode == 1006) {
                return redirect('/checkOut');
            }
            if ($momo_resultCode == 0) {
                return redirect('/success');
            }
        }
        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == "00") {
                // dd('Thành công');
                return redirect('/success');
            }
            if ($vnp_ResponseCode == "24") {
                // dd('Hủy');
                return redirect('/checkOut');
            }
        }
    }
    //Thanh toán thành công
    function success()
    {
        $user = Auth::user();
        $products = DB::table('Carts')
            ->join('Products', 'Carts.prd_id', '=', 'Products.prd_id')
            ->select('Products.*', 'Carts.*')
            ->where('Carts.use_id', $user->id)
            ->orderByDesc('Carts.car_id')
            ->get();
        $locations = DB::table('Carts')
            ->select('Carts.car_province', 'Carts.car_district', 'Carts.car_town', 'Carts.car_detailAddress', 'Carts.vou_id', 'Carts.car_gold', 'Carts.car_note')
            ->where('Carts.use_id', $user->id)
            ->distinct()
            ->get();
        $price = 0;
        $ship_id = 0;
        $weigh = 0;
        foreach ($products as $product) {
            $ship_id = $product->ship_id;
            $price = $price + (($product->prd_price * (100 - $product->prd_discount) / 100) * $product->car_quantity);
            $weigh = $weigh + ($product->prd_weigh * $product->car_quantity);
        }
        $ships = DB::table('Ships')
            ->select('Ships.*')
            ->where('Ships.ship_id', $ship_id)
            ->get();
        $shipMoney = 0;
        foreach ($ships as $ship) {
            if ($weigh <= 2000) {
                $shipMoney = $ship->ship_price;
            } else {
                $weighDiffer = $weigh - 2000;
                $shipMoney = $ship->ship_price + $ship->ship_extra * ($weighDiffer / 200);
            }
        }
        foreach ($locations as $location) {
            if ($location->car_gold != null) {
                $gold = $location->car_gold;
            } else {
                $gold = 0;
            }
        }
        foreach ($locations as $location) {
            if ($location->vou_id != null) {
                $vouchers = DB::table('Vouchers')
                    ->select('Vouchers.*')
                    ->where('Vouchers.vou_id', $location->vou_id)
                    ->get();
                foreach ($vouchers as $voucher) {
                    $discount = $voucher->vou_discount;
                }
            } else {
                $discount = 0;
            }
        }
        $today = date('Y-m-d');
        foreach ($locations as $location) {
            DB::table('SalesInvoices')->insert(
                [
                    'use_id' => $user->id, 'sal_date' => $today, 'sal_total' => $price + $shipMoney - $gold - $discount, 'ship_id' => $ship_id, 'sal_province' => $location->car_province,
                    'sal_district' => $location->car_district, 'sal_town' => $location->car_town, 'sal_detailAddress' => $location->car_detailAddress,
                    'sal_status_id' => 1, 'sal_note' => $location->car_note, 'vou_id' => $location->vou_id
                ]
            );
        }
        DB::table('Users')->where('Users.id', $user->id)
            ->update([
                'use_gold' => $user->use_gold - $gold
            ]);
        $invoices = DB::table('SalesInvoices')
            ->orderByDesc('sal_id')
            ->where('use_id', $user->id)
            ->take(1)
            ->get();
        foreach ($invoices as $invoice) {
            foreach ($products as $product) {
                $imports = DB::table('ImportInvoiceDetails')
                    ->join('ImportInvoices', 'ImportInvoiceDetails.imp_id', '=', 'ImportInvoices.imp_id')
                    ->select('ImportInvoiceDetails.*')
                    ->where('prd_status_id', '<', 3)
                    ->where('imp_quantity_left', '>', 0)
                    ->where('prd_id', $product->prd_id)
                    ->orderBy('id')
                    ->take(1)
                    ->get();
                foreach ($imports as $import) {
                    DB::table('SalesInvoiceDetails')->insert(
                        [
                            'sal_id' => $invoice->sal_id, 'prd_id' => $product->prd_id, 'sal_quantity' => $product->car_quantity,
                            'sal_price' => $product->prd_price * ((100 - $product->prd_discount) / 100), 'imp_price' => $import->imp_price
                        ]
                    );
                }
            }
        }
        DB::table('Carts')->where('use_id', $user->id)->delete();
        $mail = new MailController();
        $mail->sendMail();
        return view('user.thank');
    }
}
