<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DanhMucSanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\AuthController;


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
// Route cho đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Route cho đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route cho đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return view('welcome');
});




//admin 
Route::get('/admin/quanlidashboard', function () {
    return view('quanlidashboard');
});
Route::get('/admin/quanlisanpham', [SanPhamController::class, 'index'])->name('quanlisanpham');
Route::post('/admin/quanlisanpham', [SanPhamController::class, 'store'])->name('store.sanpham');
Route::get('/admin/quanlisanpham/edit/{id}', [SanPhamController::class, 'edit'])->name('edit.sanpham');
Route::put('/admin/quanlisanpham/{id}', [SanPhamController::class, 'update'])->name('update.sanpham');
Route::delete('/admin/quanlisanpham/{id}', [SanPhamController::class, 'destroy'])->name('destroy.sanpham');
Route::get('/admin/quanlisanpham/search', [SanPhamController::class, 'search'])->name('search.sanpham');
// admin quản lí danh mục sản phẩm

Route::get('/admin/quanlidanhmucsanpham', [DanhMucSanPhamController::class, 'index'])->name('quanlidanhmucsanpham');
Route::post('/admin/quanlidanhmucsanpham/store', [DanhMucSanPhamController::class, 'store'])->name('store.danhmuc');
Route::get('/admin/quanlidanhmucsanpham/edit/{id}', [DanhMucSanPhamController::class, 'edit'])->name('edit.danhmuc');
Route::put('/admin/quanlidanhmucsanpham/update/{id}', [DanhMucSanPhamController::class, 'update'])->name('update.danhmuc');
Route::get('/admin/quanlidanhmucsanpham/search', [DanhMucSanPhamController::class, 'search'])->name('search.danhmuc');
Route::delete('/quanlidanhmucsanpham/{id}', [DanhMucSanPhamController::class, 'destroy'])->name('categories.destroy');
//admin quản lí đơn hàng
Route::get('/admin/quanlidonhang', [DonHangController::class, 'index'])->name('quanlidonhang');
Route::get('/admin/quanlidonhang/search', [DonHangController::class, 'search'])->name('search.donhang');
Route::delete('/admin/quanlidonhang/{id}', [DonHangController::class, 'destroy'])->name('destroy.donhang');
Route::put('/admin/quanlidonhang/{id}', [DonHangController::class, 'update'])->name('update.donhang');

// user tìm kiếm sản phẩm
Route::get('/timkiemsanpham', [SanPhamController::class, 'searchSanPham'])->name('search.sanpham');



Route::get('/admin/quanlibinhluan', function () {
    return view('quanlibinhluan');
})->middleware('check.auth');

Route::get('/admin/quanlilienhe', function () {
    return view('quanlilienhe');
})->middleware('check.auth');

Route::get('/admin/dashboard', function () {
    return view('quanlidashboard');
})->middleware('check.auth');

Route::get('/admin/dashboard', [DashboardController::class, 'index']);
// user 
Route::get('/giohang', function () {
    return view('giohang');
})->middleware('check.auth');

Route::get('/trangcanhan', function () {
    return view('trangcanhan');
});


Route::get('/sanpham', function () {
    return view('sanpham');
});




Route::get('/trangchu', function () {
    return view('trangchu');
});


Route::get('/info', function () {
    return view('ThongTinCongTy');
});

Route::get('/thongke', function () {
    return view('thongkedoanhthu');
});
use App\Http\Controllers\BlogController;

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/test-connection', [TestController::class, 'index']);
