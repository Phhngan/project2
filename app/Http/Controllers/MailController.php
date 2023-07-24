<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    function sendMail()
    {
        $user = Auth::user();
        $invoices = DB::table('SalesInvoices')
            ->orderByDesc('sal_id')
            ->where('use_id', $user->id)
            ->take(1)
            ->get();
        foreach ($invoices as $invoice) {
            $sal_id = $invoice->sal_id;
            $sal_date = $invoice->sal_date;
            $sal_total = $invoice->sal_total;
            if ($invoice->sal_detailAddress != null) {
                $address = $invoice->sal_detailAddress . ' - ' . $invoice->sal_town . ' - ' . $invoice->sal_district . ' - ' . $invoice->sal_province;
            } else {
                $address = $invoice->sal_town . ' - ' . $invoice->sal_district . ' - ' . $invoice->sal_province;
            }
        }
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->CharSet  = "utf-8";
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'snackstore0202@gmail.com';
            $mail->Password   = 'pujsjpcihsekrhmd';
            //Snackstore2002
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('snackstore0202@gmail.com', 'SnackStore');
            $mail->addAddress($user->email, $user->use_lastName . ' ' . $user->name);
            $mail->addAddress('phamhngan2102@gmail.com', 'Quản lý');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Đặt hàng thành công tại SnackStore';
            $mail->Body    = '
            <div style="background-color: #F8DEDF;width:200px;display:flex;margin-left:auto;margin-right:auto;">
            <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/logo/logo1.png" alt="logo" height="80px" style="display:flex;margin-left:auto;margin-right:auto;" class="logo">
</div>
            <br>
            <div style="background-color: #F8DEDF;width: 80%;margin-left: auto;margin-right: auto;">
              <p><strong>Cảm ơn bạn đã mua hàng tại SnackStore!</strong></p>
              <p>Đơn hàng số <strong>' . $sal_id . '</strong> đã được đặt hàng thành công.</p>
              <p>Ngày đặt hàng: ' . $sal_date . '</p>
              <p>Tổng tiền đơn hàng: ' . $sal_total . ' VND</p>
              <p>Địa chỉ: ' . $address . '</p>
              <p>Theo dõi đơn hàng <a href="http://127.0.0.1:8000/client/invoices">tại đây</a></p>
            </div>
            ';

            $mail->send();
        } catch (Exception $e) {
            echo ("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

    function sendPass($userEmail)
    {
        $users = DB::table('Users')->select('Users.*')->where('email', $userEmail)->get();
        foreach ($users as $user) {
            $newPass = mt_rand(100000, 999999);
            DB::table('Users')->where('id', $user->id)->update(['password' => Hash::make($newPass)]);
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->CharSet  = "utf-8";
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'snackstore0202@gmail.com';
                $mail->Password   = 'pujsjpcihsekrhmd';
                //Snackstore2002
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('snackstore0202@gmail.com', 'SnackStore');
                $mail->addAddress($user->email, $user->use_lastName . ' ' . $user->name);

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Xác nhận lấy lại mật khẩu tại SnackStore';
                $mail->Body    = '
                <p>Yêu cầu xác nhận lấy lại mật khẩu thành công!</p>
                <p>Mật khẩu mới của bạn là: ' . $newPass . '</p>
                <p>Đăng nhập SnackStore <a href="http://127.0.0.1:8000/login">tại đây</a></p>
                ';
                $mail->send();
                echo ("Message has been sent");
            } catch (Exception $e) {
                echo ("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
        }
    }
}
