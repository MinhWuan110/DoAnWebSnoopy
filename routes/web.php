<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThongTinCongTyController;
use App\Http\Controllers\ThongkeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ThongTinTrangWebController;

use App\Http\Controllers\ThongKeLuotMuaController;

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
Route::delete('/donhang/{id}', [ProfileController::class, 'destroy'])->name('order.destroy');

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
Route::get('/trangchu', [SanPhamController::class, 'TrangChu'])->name('trangchu');

// Route::get('/test-connection', [TestController::class, 'index']);

Route::group(['middleware' => ['checkAuth']], function () {
    // Các route cho useruser
    Route::get('/cart', function () {
        return view('cart');
    });
    // Route để hiển thị giỏ hàng
  
    Route::post('/cart/update/{productId}', [CartController::class, 'updateQuantity']);
    // Route để tính tổng tiền trong giỏ hàng
    Route::get('/cart/total', [CartController::class, 'calculateTotalPrice'])->name('cart.total');
    // Route để cập nhật thông tin cá nhân
    Route::delete('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

    Route::put('/trangcanhan/update/{id}', [ProfileController::class, 'update'])->name('updateProfile');
    Route::get('/trangcanhan/{MaTaiKhoan}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/trangcanhan', [ProfileController::class, 'show'])->name('profile.show');
    
    Route::get('/user/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::post('/favorites/add', [ProfileController::class, 'addFavorite'])->name('favorites.add');
    Route::get('/favorites', [ProfileController::class, 'showFavorites'])->name('favorites.show');
    Route::delete('/favorites/{id}', [ProfileController::class, 'destroyFavorite'])->name('favorites.destroy');

    // Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('updatePassword');
    // Route::get('/trangcanhan/{MaTaiKhoan}', [ProfileController::class, 'show'])->name('profile.show');
    Route::delete('/donhang/{id}', [ProfileController::class, 'destroy'])->name('order.destroy');

    Route::get('/info', function () {
        return view('ThongTinCongTy');
    });

    Route::get('/thongke', function () {
        return view('thongkedoanhthu');
    });
    // Route::get('/thongke', function () {
    //     return view('thongkedoanhthu');
    // })->middleware('check.auth');




    Route::get('/thongke', [ThongkeController::class, 'index']);



    // Route::get('/trangchu', [SanPhamController::class, 'topSanPham'])->name('trangchu')->middleware('check.auth');;

    Route::get('/thongtincongty', [ThongTinCongTyController::class, 'index'])->name('thongtincongty.index');

    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');


    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
    // Route::get('/bai-viet/{id}', [BlogController::class, 'show'])->name('blog.show');
});

// Các route admin cần kiểm tra quyền
Route::group(['prefix' => 'admin', 'middleware' => ['checkAuth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/quanlisanpham', [SanPhamController::class, 'index'])->name('quanlisanpham');
    Route::post('/quanlisanpham', [SanPhamController::class, 'store'])->name('store.sanpham');
    Route::get('/quanlisanpham/edit/{id}', [SanPhamController::class, 'edit'])->name('edit.sanpham');
    Route::put('/quanlisanpham/{id}', [SanPhamController::class, 'update'])->name('update.sanpham');
    Route::delete('/quanlisanpham/{id}', [SanPhamController::class, 'destroy'])->name('destroy.sanpham');
    Route::get('/quanlisanpham/search', [SanPhamController::class, 'search'])->name('search.sanpham');

    Route::get('/quanlibinhluan', function () {

        return view('quanlibinhluan');
    });

    Route::get('/quanlilienhe', function () {
        return view('quanlilienhe');
    });
});






//ZyKhuong 
Route::get('/suablog/{id}', [BlogController::class, 'edit'])->name('suablog.edit');
Route::put('/suablog/{id}/update', [BlogController::class, 'update'])->name('suablog.update');
Route::get('/admin/quanliblog', [BlogController::class, 'quanliblog'])->name('blog.quanliblog');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::delete('/blog/{id}/destroy', [BlogController::class, 'destroy'])->name('blog.destroy');
use App\Http\Controllers\SanphamnoibatController;
Route::get('/sanphamnoibat', [SanphamnoibatController::class, 'index'])->name('sanphamnoibat.index');
Route::get('/sanphamnoibat/create', [SanphamnoibatController::class, 'create'])->name('sanphamnoibat.create');

use App\Models\Sanphamnoibat;
// web.php
Route::post('/sanphamnoibat', [SanphamnoibatController::class, 'store'])->name('sanphamnoibat.store');
Route::post('/them-noi-bat', [SanPhamNoiBatController::class, 'store'])->name('sanphamnoibat.store');
Route::get('admin/thongtin/edit', [ThongTinTrangWebController::class, 'edit'])->name('thongtin.edit');

Route::post('/thongtin/update', [ThongTinTrangWebController::class, 'update'])->name('thongtin.update');
Route::get('/quanliblog', [BlogController::class, 'quanliblog'])->name('blogs.quanliblog');

// Route để tạo blog mới
Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('blog.create');
// Route::post('/blog/create', [BlogController::class, 'create'])->name('blog.create');

// Route để chỉnh sửa blog
Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
// Route để lưu thay đổi khi chỉnh sửa blog
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
// Route để xóa blog
Route::delete('/blog/{id}/destroy', [BlogController::class, 'destroy'])->name('blog.destroy');
// Route GET để hiển thị form tạo blog
Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('blog.create');
// Route POST để xử lý lưu blog mới vào cơ sở dữ liệu
Route::post('/admin/blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('/user/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::get('/thong-ke-luot-mua', [ThongKeLuotMuaController::class, 'xemTheoThoiGian'])->name('thongkeluotmua.theo-thoi-gian');
Route::get('/thongke/doanhthu', [ThongKeController::class, 'thongKeDoanhThu'])->name('thongke.doanhthu');
Route::get('/thongke-doanhthu', [ThongKeController::class, 'thongKeDoanhThu'])->name('thongke.doanhthu');
Route::get('/thongke-doanhthu/export', [ThongKeController::class, 'export'])->name('thongke.doanhthu.export');
Route::get('/thongke/export', [ThongKeLuotMuaController::class, 'export'])->name('thongke.export');

