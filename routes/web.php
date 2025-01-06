<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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




//admin 
Route::get('/admin/quanlidashboard', function () {
    return view('quanlidashboard');
});

Route::get('/admin/quanlisanpham', [SanPhamController::class, 'index'])->name('quanlisanpham')->middleware('check.auth');
Route::post('/admin/quanlisanpham', [SanPhamController::class, 'store'])->name('store.sanpham')->middleware('check.auth');
Route::get('/admin/quanlisanpham/edit/{id}', [SanPhamController::class, 'edit'])->name('edit.sanpham')->middleware('check.auth');
Route::put('/admin/quanlisanpham/{id}', [SanPhamController::class, 'update'])->name('update.sanpham')->middleware('check.auth');
Route::delete('/admin/quanlisanpham/{id}', [SanPhamController::class, 'destroy'])->name('destroy.sanpham')->middleware('check.auth');
Route::get('/admin/quanlisanpham/search', [SanPhamController::class, 'search'])->name('search.sanpham')->middleware('check.auth');


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

// Route::get('/trangcanhan', function () {
//     return view('trangcanhan');
// });
// Route::get('/trangcanhan', [ProfileController::class, 'index']);
Route::get('/trangcanhan/{MaTaiKhoan}', [ProfileController::class, 'show'])->middleware('check.auth');;









Route::get('/trangchu', function () {
    return view('trangchu');
})->middleware('check.auth');


Route::get('/info', function () {
    return view('ThongTinCongTy');
})->middleware('check.auth');

Route::get('/thongke', function () {
    return view('thongkedoanhthu');
})->middleware('check.auth');

Route::get('/blog', [BlogController::class, 'index'])->middleware('check.auth');

Route::get('/test-connection', [TestController::class, 'index'])->middleware('check.auth');
// Route::get('/test-connection', [TestController::class, 'index']);

// Route::get('/trangchu', [SanPhamController::class, 'topSanPham'])->name('trangchu');
Route::get('/trangchu', [SanPhamController::class, 'TrangChu'])->name('trangchu');


use App\Http\Controllers\ThongTinCongTyController;

Route::get('/thongtincongty', [ThongTinCongTyController::class, 'index'])->name('thongtincongty.index');


// use App\Http\Controllers\BlogController;

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');


// Route::get('/bai-viet/{id}', [BlogController::class, 'show'])->name('blog.show');
