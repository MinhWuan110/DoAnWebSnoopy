<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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
Route::get('/admin/quanlisanpham', function () {
    return view('quanlisanpham');
});
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
Route::get('/trangcanhan/{MaTaiKhoan}', [ProfileController::class, 'show']);
Route::get('/sanpham', function () {
    return view('sanpham');
});