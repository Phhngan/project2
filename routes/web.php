<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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
    Route::get("/admin/products", [ProductController::class, 'product.index']);

    // Them 1 san pham: view
    Route::get("/admin/products/create", [ProductController::class, 'product.create']);
    // Them sp: xu ly => ko co giao dien
    Route::post("/admin/products/create", [ProductController::class, 'save']);

    // Xem 1 san pham
    Route::get("/admin/products/{prd_id}", [ProductController::class, 'show']);

    // Sua 1 san pham: view
    Route::get("/admin/products/{prd_id}/edit", [ProductController::class, 'product.edit']);
    // Cap nhat sp => ko co giao dien
    Route::put("admin/product/{prd_id}/edit", [ProductController::class, 'update']);

    // Xoa 1 san pham
    Route::delete("admin/products/{prd_id}/delete", [ProductController::class, 'delete']);

    
// LOẠI SẢN PHẨM
    // Xem toàn bộ loại sản phẩm
    Route::get("/admin/product-type", [ProductTypeController::class, 'product-type.index']);

    // Thêm 1 loại sản phẩm : view
    Route::get("/admin/product-type/create", [ProductTypeController::class, 'product-type.create']);
    // Thêm loại sp => ko có giao diện
    Route::post("/admin/product-type/create", [ProductTypeController::class, 'save']);

    // Sửa 1 loại sản phẩm : view
    Route::get("/admin/product-type/{prd_type_id}/edit", [ProductTypeController::class, 'product-type.edit']);
    // cập nhât loại sp => ko có giao diện
    Route::put("/admin/product-type/{prd_type_id}/edit", [ProductTypeController::class, 'update']);

// TRẠNG THÁI SẢN PHẨM
    // Xem toàn bộ trạng thái
    Route::get("/admin/product-status", [Controller::class, 'product-status.index']);
    // // Sản phẩm còn hạn : views
    // Route::get("/admin/product-status/{prd_status_id}", [Controller::class, 'product-status.con-han']);
    // // Sản phẩm gần hết hạn : view
    // Route::get("/admin/product-status/gan-het-han", [Controller::class, 'product-status.gan-het-han']);
    // // Sản phẩm đã hết hạn : view
    // Route::get("/admin/product-status/da-het-han", [Controller::class, 'product-status.da-het-han']);
    // // Sản phẩm đã bán hết : view 
    // Route::get("/admin/product-status/da-ban-het", [Controller::class, 'product-status.da-ban-het']);
    // // Sản phẩm không còn sản xuất : view
    // Route::get("/admin/product-status/khong-con-san-xuat", [Controller::class, 'product-status.khong-con-san-xuat']);

// NOTE: trạng thái sản phẩm không biết controller nào và chưa làm view xong cho trạng thái

// THƯ VIỆN ẢNH
    // Xem tất cả ảnh
    Route::get("/admin/images", [ImagesController::class, 'images.index']);
    // sửa : view
    Route::get("/admin/images/{img_id}/edit", [ImagesController::class, 'images.edit']);
    Route::put("/admin/product-type/{img_id}/edit", [ImagesController::class, 'update']);
    // thêm : view
    Route::get("/admin/images/create", [ImagesController::class, 'images.create']);
    Route::post("/admin/product-type/create", [ImagesController::class, 'save']);

// ĐƠN VỊ CUNG CẤP
    // Xem tất cả đơn vị cung cấp
    Route::get("/admin/supply-unit", [SupplyUnitController::class, 'supply-unit.index']);
    // Thêm đơn vị dung cấp view
    Route::get("/admin/supply-unit/create", [SupplyUnitController::class, 'supply-unit.create']);
    Route::post("/admin/supply-unit/create", [SupplyUnitController::class, 'save']);
    // Sửa đơn vị cung cấp
    Route::get("/admin/supply-unit/{unit_id}/edit", [SupplyUnitController::class, 'supply-unit.edit']);
    Route::put("/admin/supply-unit/{unit_id}/edit", [SupplyUnitController::class, 'update']);

// HÓA ĐƠN NHẬP HÀNG
    // Xem tất cả hóa đơn
    Route::get("/admin/import-invoice", [ImportInvoiceController::class, 'import-invoice.index']);
    // Xem chi tiết 1 hóa đơn
    Route::get("/admin/import-invoice/details", [ImportInvoiceController::class, 'import-invoice.details']);
    // Thêm hóa đơn
    Route::get("/admin/import-invoice/create", [ImportInvoiceController::class, 'import-invoice.create']);
    Route::get("/admin/import-invoice/create", [ImportInvoiceController::class, 'save']);
    // Thêm sản phẩm trong 1 hóa đơn
    Route::get("/admin/import-invoice/edit", [ImportInvoiceController::class, 'import-invoice.edit']);
    Route::get("/admin/import-invoice/edit", [ImportInvoiceController::class, 'import-invoice.edit']);

// SHIP
    // Xem tất cả
    Route::get("/admin/ship", [ShipController::class, 'ship.index']);
    // Sửa 
    Route::get("/admin/ship/edit", [ShipController::class, 'ship.edit']);

// NHÂN VIÊN
    // Xem tất cẩ nhân viên
    Route::get("/admin/employees", [EmployeeController::class, 'emplyee.index']);
    // Sửa vị trí nhân viên
    Route::get("/admin/employees/edit", [EmployeeController::class, 'emplyee.edit']);

// HÓA ĐƠN BÁN HÀNG
    // Xem tất cả hóa đơn bán hàng
    Route::get("/admin/sales-invoice", [SalesInvoiceController::class, 'sale-invoice.index']);
    // Hóa đơn chưa xác nhận
    Route::get("/admin/sales-invoice/chua-xac-nhan", [SalesInvoiceController::class, 'sale-invoice.chua-xac-nhan']);
    // Hóa đơn đã xác nhận
    Route::get("/admin/sales-invoice/da-xac-nhan", [SalesInvoiceController::class, 'sale-invoice.da-xac-nhan']);
    // Hóa đơn đang ship
    Route::get("/admin/sales-invoice/dang-ship-hang", [SalesInvoiceController::class, 'sale-invoice.dang-ship-hang']);
    // Hóa đơn nhận thành công
    Route::get("/admin/sales-invoice/thanh-cong", [SalesInvoiceController::class, 'sale-invoice.thanh-cong']);
    // Hóa đơn đã hủy
    Route::get("/admin/sales-invoice/da-huy", [SalesInvoiceController::class, 'sale-invoice.da-huy']);
    // Chi tiết hóa đơn
    Route::get("/admin/sales-invoice/details", [SalesInvoiceController::class, 'sale-invoice.details']);
    // Sửa trạng thái
    Route::get("/admin/sales-invoice/edit", [SalesInvoiceController::class, 'sale-invoice.edit']);


    /*--------------------------------------------------------------------------*/
//login 
    Route::get('/login',[LoginController::class,'viewLogin']);
    Route::post('/login',[LoginController::class,'login']);
    Route::post('/logout',[LoginController::class,'logout']);

//register 
    Route::get('/register', function () {
        return view('user.register');
    });
