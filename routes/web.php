<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DanhMucSanPhamController;
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

Route::get('/admin/quanlidanhmucsanpham', [DanhMucSanPhamController::class, 'index'])->name('quanlidanhmucsanpham');
Route::post('/admin/quanlidanhmucsanpham', [DanhMucSanPhamController::class, 'store'])->name('store.danhmuc');
Route::get('/admin/quanlidanhmucsanpham/edit/{id}', [DanhMucSanPhamController::class, 'edit'])->name('edit.danhmuc');
Route::put('/admin/quanlidanhmucsanpham/{id}', [DanhMucSanPhamController::class, 'update'])->name('update.danhmuc');
Route::delete('/admin/quanlidanhmucsanpham/{id}', [DanhMucSanPhamController::class, 'destroy'])->name('destroy.danhmuc');
Route::get('/admin/quanlidanhmucsanpham/search', [DanhMucSanPhamController::class, 'search'])->name('search.danhmuc');


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