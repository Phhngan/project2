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
Route::get('/home', function () {
    return view('user.home');
});

//SITE all products


/*--------------------------------------------------------------------------*/

// ADMIN
//admin home
Route::get('/admin/home', [AdminController::class, 'viewHome']);

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

// Xoa 1 san pham
// Route::delete("admin/products/{prd_id}/delete", [ProductController::class, 'delete']);


// LOẠI SẢN PHẨM
// Xem toàn bộ loại sản phẩm
Route::get("/admin/productType", [ProductTypeController::class, 'index']);

// Thêm 1 loại sản phẩm : view
Route::get("/admin/productType/create", [ProductTypeController::class, 'create']);
// Thêm loại sp => ko có giao diện
Route::post("/admin/productType/create", [ProductTypeController::class, 'save']);

// Sửa 1 loại sản phẩm : view
Route::get("/admin/productType/{prd_type_id}/edit", [ProductTypeController::class, 'edit']);
// cập nhât loại sp => ko có giao diện
Route::put("/admin/productType/{prd_type_id}/edit", [ProductTypeController::class, 'update']);

// Xoa 1 san pham
// Route::delete("admin/productType/{prd_type_id}/delete", [ProductTypeController::class, 'delete']);

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
Route::put("/admin/productStatus/{prd_id}/chuyen", [ProductStatusController::class, 'chuyen']);

// THƯ VIỆN ẢNH
// Xem tất cả ảnh
Route::get("/admin/images", [ImagesController::class, 'index']);
// sửa : view
Route::get("/admin/images/{img_id}/edit", [ImagesController::class, 'edit']);
Route::put("/admin/images/{img_id}/edit", [ImagesController::class, 'update']);
// thêm : view
Route::get("/admin/images/create", [ImagesController::class, 'create']);
Route::post("/admin/images/create", [ImagesController::class, 'save']);
// Xoa 1 anh
Route::delete("admin/images/{img_id}/delete", [ImagesController::class, 'delete']);

// ĐƠN VỊ CUNG CẤP
// Xem tất cả đơn vị cung cấp
Route::get("/admin/supplyUnit", [SupplyUnitController::class, 'index']);
// Thêm đơn vị dung cấp view
Route::get("/admin/supplyUnit/create", [SupplyUnitController::class, 'create']);
Route::post("/admin/supplyUnit/create", [SupplyUnitController::class, 'save']);
// Sửa đơn vị cung cấp
Route::get("/admin/supplyUnit/{unit_id}/edit", [SupplyUnitController::class, 'edit']);
Route::put("/admin/supplyUnit/{unit_id}/edit", [SupplyUnitController::class, 'update']);
// Xoa 
// Route::delete("admin/supplyUnit/{unit_id}/delete", [SupplyUnitController::class, 'delete']);

// HÓA ĐƠN NHẬP HÀNG
// Xem tất cả hóa đơn
Route::get("/admin/importInvoice", [ImportInvoiceController::class, 'index']);
// Thêm hóa đơn
Route::get("/admin/importInvoice/create", [ImportInvoiceController::class, 'create']);
Route::post("/admin/importInvoice/create", [ImportInvoiceController::class, 'save']);
// Sửa 1 hóa đơn
Route::get("/admin/importInvoice/{imp_id}/edit", [ImportInvoiceController::class, 'edit']);
Route::put("/admin/importInvoice/{imp_id}/edit", [ImportInvoiceController::class, 'update']);
// Xoa 
Route::delete("/admin/importInvoice/{imp_id}/delete", [ImportInvoiceController::class, 'delete']);
// Xem chi tiết 1 hóa đơn
Route::get("/admin/importInvoice/{imp_id}", [ImportInvoiceDetailController::class, 'index']);
//Thêm chi tiết hóa đơn
Route::get("/admin/importInvoice/{imp_id}/create", [ImportInvoiceDetailController::class, 'create']);
Route::post("/admin/importInvoice/{imp_id}/create", [ImportInvoiceDetailController::class, 'save']);
//Sửa chi tiết hóa đơn
Route::get("/admin/importInvoice/{imp_id}/{id}/edit", [ImportInvoiceDetailController::class, 'edit']);
Route::put("/admin/importInvoice/{imp_id}/{id}/edit", [ImportInvoiceDetailController::class, 'update']);
//Xoa
Route::delete("/admin/importInvoice/{imp_id}/{id}/delete", [ImportInvoiceDetailController::class, 'delete']);

// SHIP
// Xem tất cả
Route::get("/admin/ship", [ShipController::class, 'index']);
// Sửa 
Route::get("/admin/ship/{reg_id}/edit", [ShipController::class, 'edit']);
Route::put("/admin/ship/{reg_id}/edit", [ShipController::class, 'update']);

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
//Chuyển
Route::put("/admin/salesInvoice/{sal_id}/continue", [SalesInvoiceController::class, 'continue']);
//Huy
Route::put("/admin/salesInvoice/{sal_id}/cancel", [SalesInvoiceController::class, 'cancel']);


/*--------------------------------------------------------------------------*/
//login 
Route::get('/login', [LoginController::class, 'viewLogin']);
Route::post('/login', [LoginController::class, 'login']);
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
Route::get("/products/{prd_id}", [ProductDetailsController::class, 'show']);

Route::get('/productDetails', function () {
    return view('user.productDetails');
});


// giới thiệu
Route::get('/gioi-thieu', function () {
    return view('user.gioi-thieu');
});

//profile client
Route::get("/client", [ClientController::class, 'profile']);
// change pass client
Route::get("/client/changepass", [ClientController::class, 'changePass']);
// invoices
Route::get("/client/invoices", [ClientController::class, 'invoices']);


//profile admin
Route::get("/admin/profile", [AdminController::class, 'profile']);
//change pass admin
Route::get("/admin/changPass", [AdminController::class, 'changPass']);

// CART
Route::get("/cart", [CartController::class, 'cart']);
// đặt thành công
Route::get('/thanhCong', function () {
    return view('user.thank');
});
