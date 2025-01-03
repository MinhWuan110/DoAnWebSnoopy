<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
