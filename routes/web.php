<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThongTinCongTyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LienHeController;

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


// Route::get('/test-connection', [TestController::class, 'index']);

Route::group(['middleware' => ['checkAuth']], function () {
    // Các route cho useruser
    Route::get('/giohang', function () {
        return view('giohang');
    });
    // Route để cập nhật thông tin cá nhân
    Route::put('/trangcanhan/update/{id}', [ProfileController::class, 'update'])->name('updateProfile');
    Route::get('/trangcanhan/{MaTaiKhoan}', [ProfileController::class, 'show'])->name('profile.show');



    Route::get('/info', function () {
        return view('ThongTinCongTy');
    });

    Route::get('/thongke', function () {
        return view('thongkedoanhthu');
    });

    Route::get('/blog', [BlogController::class, 'index']);

    // Route::get('/trangchu', [SanPhamController::class, 'topSanPham'])->name('trangchu')->middleware('check.auth');;
    Route::get('/trangchu', [SanPhamController::class, 'TrangChu'])->name('trangchu');
    Route::get('/thongtincongty', [ThongTinCongTyController::class, 'index'])->name('thongtincongty.index');


    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
    // Route::get('/bai-viet/{id}', [BlogController::class, 'show'])->name('blog.show');
});

// Các route admin cần kiểm tra quyền
Route::group(['prefix' => 'admin', 'middleware' => ['checkAuth']], function () {

    Route::get('/quanlidashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/quanlisanpham', [SanPhamController::class, 'index'])->name('quanlisanpham');
    Route::post('/quanlisanpham', [SanPhamController::class, 'store'])->name('store.sanpham');
    Route::get('/quanlisanpham/edit/{id}', [SanPhamController::class, 'edit'])->name('edit.sanpham');
    Route::put('/quanlisanpham/{id}', [SanPhamController::class, 'update'])->name('update.sanpham');
    Route::delete('/quanlisanpham/{id}', [SanPhamController::class, 'destroy'])->name('destroy.sanpham');
    Route::get('/quanlisanpham/search', [SanPhamController::class, 'search'])->name('search.sanpham');
    Route::get('/quanlibinhluan', [CommentController::class, 'index'])->name('quanlibinhluan');
    Route::delete('/quanlibinhluan/{id}', [CommentController::class, 'destroy'])->name('destroy.comments');

    Route::get('/quanlilienhe',[LienHeController::class, 'index'])->name('quanlilienhe');
    Route::put('/quanlilienhe/{id}', [LienHeController::class, 'update'])->name('update.LienHe');
    Route::delete('/quanlisanpham/{id}', [LienHeController::class, 'destroy'])->name('destroy.LienHe');
});
