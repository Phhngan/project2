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
    return redirect('home');
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
    Route::get("/admin/product-type/{prd_type_id}/create", [ProductTypeController::class, 'product-type.create']);
    // Thêm loại sp => ko có giao diện
    Route::post("/admin/product-type/{prd_type_id}/create", [ProductTypeController::class, 'save']);

    // Sửa 1 loại sản phẩm : view
    Route::get("/admin/product-type/{prd_type_id}/edit", [ProductTypeController::class, 'product-type.edit']);
    // cập nhât loại sp => ko có giao diện
    Route::put("/admin/product-type/{prd_type_id}/edit", [ProductTypeController::class, 'update']);

// TRẠNG THÁI SẢN PHẨM
    // Xem toàn bộ trạng thái
    Route::get("/admin/product-status", [Controller::class, 'product-status.index']);
    // Sản phẩm còn hạn : views
    Route::get("/admin/product-status/con-han", [Controller::class, 'product-status.con-han']);
    // Sản phẩm gần hết hạn : view
    Route::get("/admin/product-status/gan-het-han", [Controller::class, 'product-status.gan-het-han']);
    // Sản phẩm đã hết hạn : view
    Route::get("/admin/product-status/da-het-han", [Controller::class, 'product-status.da-het-han']);
    // Sản phẩm đã bán hết : view 
    Route::get("/admin/product-status/da-ban-het", [Controller::class, 'product-status.da-ban-het']);
    // Sản phẩm không còn sản xuất : view

// THƯ VIỆN ẢNH
    // Xem tất cả ảnh


// ĐƠN VỊ CUNG CẤP
    // Xem tất cả đơn vị cung cấp
    Route::get("/admin/supply-unit", [SupplyUnitController::class, 'supply-unit.index']);
    // Thêm đơn vị dung cấp view
    Route::get("/admin/supply-unit/create", [SupplyUnitController::class, 'supply-unit.create']);
    // Sửa đơn vị cung cấp
    Route::get("/admin/supply-unit/edit", [SupplyUnitController::class, 'supply-unit.edit']);

// HÓA ĐƠN NHẬP HÀNG
    // Xem tất cả hóa đơn
    Route::get("/admin/import-invoice", [ImportInvoiceController::class, 'import-invoice.index']);
    // Xem chi tiết 1 hóa đơn
    Route::get("/admin/import-invoice/details", [ImportInvoiceController::class, 'import-invoice.details']);
    // Thêm hóa đơn
    Route::get("/admin/import-invoice/create", [ImportInvoiceController::class, 'import-invoice.create']);
    // Thêm sản phẩm trong 1 hóa đơn
    Route::get("/admin/import-invoice/edit", [ImportInvoiceController::class, 'import-invoice.edit']);

// SHIP
    // Xem tất cả
    Route::get("/admin/ship", [ShipController::class, 'ship.index']);
    // Sửa 
    Route::get("/admin/ship/edit", [IShipController::class, 'ship.edit']);

// NHÂN VIÊN

// HÓA ĐƠN BÁN HÀNG

    /*--------------------------------------------------------------------------*/
//login 
    Route::get('/login',[LoginController::class,'viewLogin']);
    Route::post('/login',[LoginController::class,'login']);
    Route::post('/logout',[LoginController::class,'logout']);

//register 
    Route::get('/register', function () {
        return view('user.register');
    });
