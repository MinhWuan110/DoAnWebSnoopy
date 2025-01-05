<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SanPhamController;
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


Route::get('/admin/quanlibinhluan', function () {

    return view('quanlibinhluan');
});
Route::get('/admin/quanlilienhe', function () {
    return view('quanlilienhe');
});
// Route::get('/admin/dashboard', function () {
//     return view('quanlidashboard');
// });

Route::get('/admin/dashboard', [DashboardController::class, 'index']);
// user 
Route::get('/giohang', function () {
    return view('giohang');
});

// Route::get('/trangcanhan', function () {
//     return view('trangcanhan');
// });
// Route::get('/trangcanhan', [ProfileController::class, 'index']);
// Route để hiển thị thông tin cá nhân
Route::get('/trangcanhan/{MaTaiKhoan}', [ProfileController::class, 'show'])->name('profile.show');

// Route để cập nhật thông tin cá nhân
Route::put('/trangcanhan/update/{id}', [ProfileController::class, 'update'])->name('updateProfile');

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
