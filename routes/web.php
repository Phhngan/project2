<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\SupplyUnitController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ImportInvoiceController;
use App\Http\Controllers\ImportInvoiceDetailController;
use App\Http\Controllers\SalesInvoiceController;
use App\Http\Controllers\ProductStatusController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgetPassController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Util\Html5EntityDecoder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/admin', function () {
    return redirect('/admin/home');
});

//SITE home
// Route::get('/home', function () {
//     return view('user.home');
// });
Route::get('/home', [MenuController::class, 'home']);

//SITE all products


/*--------------------------------------------------------------------------*/

// ADMIN
//admin home
Route::get('/admin/home', [AdminController::class, 'takeYear']);
Route::get('/admin/home/{year}/{timeId}', [AdminController::class, 'viewHome']);
Route::get('/admin/home/{year}', [AdminController::class, 'takeTime']);

// QUẢN LÍ SẢN PHẨM
// Xem toan bo SP
Route::get("/admin/products", [ProductController::class, 'index']);
// Them 1 san pham: view
Route::get("/admin/products/create", [ProductController::class, 'create']);
// Them sp: xu ly => ko co giao dien
Route::post("/admin/products/create", [ProductController::class, 'save']);
// Xem 1 san pham
Route::get("/admin/products/{prd_id}", [ProductController::class, 'show']);
// Sua 1 san pham: view
Route::get("/admin/products/{prd_id}/edit", [ProductController::class, 'edit']);
// Cap nhat sp => ko co giao dien
Route::put("admin/products/{prd_id}/edit", [ProductController::class, 'update']);

// TRẠNG THÁI SẢN PHẨM
// Con han
Route::get("/admin/productStatus/con-han", [ProductStatusController::class, 'conHan']);
// Gan het han
Route::get("/admin/productStatus/gan-het-han", [ProductStatusController::class, 'ganHetHan']);
// Het han
Route::get("/admin/productStatus/het-han", [ProductStatusController::class, 'hetHan']);
// Ban het
Route::get("/admin/productStatus/ban-het", [ProductStatusController::class, 'banHet']);
// Khong con san xuat
Route::get("/admin/productStatus/khong-con-san-xuat", [ProductStatusController::class, 'khongConSanXuat']);
//Chuyen sang ko con san xuat
Route::get("/admin/productStatus/{prd_id}/chuyen", [ProductStatusController::class, 'chuyen']);
Route::put("/admin/productStatus/{prd_id}/chuyen", [ProductStatusController::class, 'chuyen']);
//Câp nhat
Route::get("/admin/productStatus/update", [ProductStatusController::class, 'update']);
Route::put("/admin/productStatus/update", [ProductStatusController::class, 'update']);

// ĐƠN VỊ CUNG CẤP
// Xem tất cả đơn vị cung cấp
Route::get("/admin/supplyUnit", [SupplyUnitController::class, 'index']);
// Thêm đơn vị dung cấp view
Route::get("/admin/supplyUnit/create", [SupplyUnitController::class, 'create']);
Route::post("/admin/supplyUnit/create", [SupplyUnitController::class, 'save']);
// Sửa đơn vị cung cấp
Route::get("/admin/supplyUnit/{unit_id}/edit", [SupplyUnitController::class, 'edit']);
Route::put("/admin/supplyUnit/{unit_id}/edit", [SupplyUnitController::class, 'update']);

// HÓA ĐƠN NHẬP HÀNG
// Xem tất cả hóa đơn
Route::get("/admin/importInvoice", [ImportInvoiceController::class, 'index']);
// Thêm hóa đơn
Route::get("/admin/importInvoice/create", [ImportInvoiceController::class, 'create']);
Route::post("/admin/importInvoice/create", [ImportInvoiceController::class, 'save']);
// Sửa 1 hóa đơn
Route::get("/admin/importInvoice/{imp_id}/edit", [ImportInvoiceController::class, 'edit']);
Route::put("/admin/importInvoice/{imp_id}/edit", [ImportInvoiceController::class, 'update']);
// Xem chi tiết 1 hóa đơn
Route::get("/admin/importInvoice/{imp_id}", [ImportInvoiceController::class, 'show']);

// SHIP
// Xem tất cả
Route::get("/admin/ship", [ShipController::class, 'index']);
// Sửa
Route::get("/admin/ship/{ship_id}/edit", [ShipController::class, 'edit']);
Route::put("/admin/ship/{ship_id}/edit", [ShipController::class, 'update']);

// NHÂN VIÊN
// Xem tất cẩ nhân viên
Route::get("/admin/employee", [EmployeeController::class, 'index']);
//Thêm nhân viên
Route::get("/admin/employee/create", [EmployeeController::class, 'create']);
Route::post("/admin/employee/create", [EmployeeController::class, 'save']);
// Sửa vị trí nhân viên
Route::get("/admin/employee/{id}/edit", [EmployeeController::class, 'edit']);
Route::put("/admin/employee/{id}/edit", [EmployeeController::class, 'update']);

// HÓA ĐƠN BÁN HÀNG
// Hóa đơn chưa xác nhận
Route::get("/admin/salesInvoice/chua-xac-nhan", [SalesInvoiceController::class, 'chuaXacNhan']);
// Hóa đơn đã xác nhận
Route::get("/admin/salesInvoice/da-xac-nhan", [SalesInvoiceController::class, 'daXacNhan']);
// Hóa đơn đang ship
Route::get("/admin/salesInvoice/ship-hang", [SalesInvoiceController::class, 'shipHang']);
// Hóa đơn nhận thành công
Route::get("/admin/salesInvoice/thanh-cong", [SalesInvoiceController::class, 'thanhCong']);
// Hóa đơn đã hủy
Route::get("/admin/salesInvoice/da-huy", [SalesInvoiceController::class, 'daHuy']);
// Chi tiết hóa đơn
Route::get("/admin/salesInvoice/{sal_id}", [SalesInvoiceController::class, 'show']);
//Xác nhận hóa đơn
Route::get("/admin/salesInvoice/{sal_id}/xacnhan", [SalesInvoiceController::class, 'xacnhan']);
Route::put("/admin/salesInvoice/{sal_id}/xacnhan", [SalesInvoiceController::class, 'xacnhan']);
//Giao hàng
Route::get("/admin/salesInvoice/{sal_id}/giaohang", [SalesInvoiceController::class, 'giaohang']);
Route::put("/admin/salesInvoice/{sal_id}/giaohang", [SalesInvoiceController::class, 'giaohang']);
//Hoàn thành
Route::get("/admin/salesInvoice/{sal_id}/hoanthanh", [SalesInvoiceController::class, 'hoanthanh']);
Route::put("/admin/salesInvoice/{sal_id}/hoanthanh", [SalesInvoiceController::class, 'hoanthanh']);
//Huy
// Route::get("/admin/salesInvoice/{sal_id}/cancel", [SalesInvoiceController::class, 'cancel']);
// Route::put("/admin/salesInvoice/{sal_id}/cancel", [SalesInvoiceController::class, 'cancel']);

//Quản lý tin tức
//Xem tất cả
Route::get("/admin/news", [NewController::class, 'index']);
//Tạo
Route::get("/admin/news/create", [NewController::class, 'create']);
Route::post("/admin/news/create", [NewController::class, 'save']);
// Sửa
Route::get("/admin/news/{new_id}/edit", [NewController::class, 'edit']);
Route::put("/admin/news/{new_id}/edit", [NewController::class, 'update']);
//Chi tiết
Route::get("/admin/news/{new_id}", [NewController::class, 'show']);

//Quản lý voucher
//Xem tất cả
Route::get("/admin/voucher", [VoucherController::class, 'index']);
//Tạo
Route::get("/admin/voucher/create", [VoucherController::class, 'create']);
Route::post("/admin/voucher/create", [VoucherController::class, 'save']);
// Sửa
Route::get("/admin/voucher/{vou_id}/edit", [VoucherController::class, 'edit']);
Route::put("/admin/voucher/{vou_id}/edit", [VoucherController::class, 'update']);

/*--------------------------------------------------------------------------*/
//login
Route::get('/login', [LoginController::class, 'viewLogin']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/logout', [LoginController::class, 'logout']);

//register
Route::get("/register", [RegisterController::class, 'viewRegister']);
Route::post("/register", [RegisterController::class, 'register']);

//forget pass
Route::get("/forgetPass", [ForgetPassController::class, 'viewForgetPass']);
Route::post("/forgetPass", [ForgetPassController::class, 'forgetPass']);

//menu
Route::get("/doMan", [MenuController::class, 'doMan']);
Route::get("/doNgot", [MenuController::class, 'doNgot']);
Route::get("/doUong", [MenuController::class, 'doUong']);
Route::get("/products", [MenuController::class, 'allProducts']);
// chi tiết sản phẩm
Route::get("/{prd_id}/productDetails", [MenuController::class, 'show']);

//search home
Route::get("/search", [MenuController::class, 'search']);

// giới thiệu
Route::get('/gioi-thieu', function () {
    return view('user.gioi-thieu');
});

//profile client
Route::get("/client", [ClientController::class, 'profile']);
//update profile
Route::get("/client/edit", [ClientController::class, 'edit']);
Route::put("/client/edit", [ClientController::class, 'update']);
// change pass client
Route::get("/client/changePass", [ClientController::class, 'changePass']);
Route::put("/client/changePass", [ClientController::class, 'updatePass']);
// invoices
Route::get("/client/invoices", [ClientController::class, 'invoices']);
Route::get("/client/invoices/{sal_id}/details", [ClientController::class, 'details']);
//Huy don
Route::get("/client/invoices/{sal_id}/cancel", [ClientController::class, 'cancel']);
Route::put("/client/invoices/{sal_id}/cancel", [ClientController::class, 'cancel']);
//rating
Route::get("/client/invoices/{sal_id}/ratting", [RateController::class, 'all']);
Route::get("/client/invoices/{id}/rattingSP", [RateController::class, 'detail']);
Route::get("/client/invoices/{id}/updateRatting", [RateController::class, 'update']);

//profile admin
Route::get("/admin/profile", [AdminController::class, 'profile']);
//update profile
Route::get("/admin/profile/edit", [AdminController::class, 'edit']);
Route::put("/admin/profile/edit", [AdminController::class, 'update']);
//change pass admin
Route::get("/admin/changePass", [AdminController::class, 'changePass']);
Route::put("/admin/changePass", [AdminController::class, 'updatePass']);

// CART
Route::get("/{prd_id}/addCart", [CartController::class, 'addCart']);
Route::post("/{prd_id}/addCartQuantity", [CartController::class, 'addCartQuantity']);
Route::get("/cart", [CartController::class, 'showCart']);
Route::get("/cart/update", [CartController::class, 'update']);
Route::get("/cart/{car_id}/delete", [CartController::class, 'delete']);
Route::get("/cart/updateAddress", [CartController::class, 'updateAddress']);
Route::put("/cart/updateAddress", [CartController::class, 'updateAddress']);
Route::get("/checkOut", [CartController::class, 'showCheckOut']);
Route::get("/checkOut/updateNote", [CartController::class, 'updateNote']);
Route::get("/checkOut/updateGold", [CartController::class, 'updateGold']);
Route::get("/checkOut/updateVoucher", [CartController::class, 'updateVoucher']);
Route::get("/success", [CartController::class, 'success']);
Route::post("/VNPay", [CartController::class, 'vnpay']);
Route::post("/Momo", [CartController::class, 'momo']);
Route::get("/payment", [CartController::class, 'payment']);

// Favourite
Route::get("/{prd_id}/addFavorite", [MenuController::class, 'addFavorite']);
Route::get("/{prd_id}/deleteFavorite", [MenuController::class, 'deleteFavorite']);
Route::get("/client/favorite", [MenuController::class, 'showFavorite']);
Route::delete("/client/favorite/{prd_id}/delete", [MenuController::class, 'delete']);

//test
Route::get('/chua-dang-nhap', function () {
    return view('error.chua-dang-nhap');
});

//tin tức
Route::get("/news", [NewController::class, 'newsMain']);
Route::get("/news/{new_id}", [NewController::class, 'newsShow']);

// CHính sách
Route::get('/chinh-sach', function () {
    return view('user.chinhSach');
});
