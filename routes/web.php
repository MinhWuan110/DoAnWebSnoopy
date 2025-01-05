<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\BlogController;
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



Route::get('/dangnhap', function () {
    return view('DangNhap');
});
//admin 
Route::get('/admin/quanlidashboard', function () {
    return view('quanlidashboard');
});

Route::get('/admin/quanlisanpham', [SanPhamController::class, 'index'])->name('quanlisanpham')->middleware('check.auth');
Route::post('/admin/quanlisanpham', [SanPhamController::class, 'store'])->name('store.sanpham');
Route::get('/admin/quanlisanpham/edit/{id}', [SanPhamController::class, 'edit'])->name('edit.sanpham');
Route::put('/admin/quanlisanpham/{id}', [SanPhamController::class, 'update'])->name('update.sanpham');
Route::delete('/admin/quanlisanpham/{id}', [SanPhamController::class, 'destroy'])->name('destroy.sanpham');
Route::get('/admin/quanlisanpham/search', [SanPhamController::class, 'search'])->name('search.sanpham');


Route::get('/admin/quanlibinhluan', function () {

    return view('quanlibinhluan');
});
Route::get('/admin/quanlilienhe', function () {
    return view('quanlilienhe');
});
Route::get('/admin/dashboard', function () {
    return view('quanlidashboard');
});


// user 
Route::get('/giohang', function () {
    return view('giohang');
});

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

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/test-connection', [TestController::class, 'index']);
