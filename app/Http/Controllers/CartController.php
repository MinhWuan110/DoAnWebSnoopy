<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart()
{
    $currentUser = session('user');

        // Kiểm tra xem người dùng có đăng nhập không
        if (!$currentUser) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }
    
    $gioHang = DB::table('giohang')->where('MaKhachHang', $currentUser->MaKhachHang)->get();
    
    $sanPhamIds = $gioHang->pluck('MaSanPham')->toArray();
    $sanPhamDetails = DB::table('sanpham')->whereIn('MaSanPham', $sanPhamIds)->get();
    
    // Lấy thông tin khách hàng
    $khachHang = DB::table('khachhang')->where('MaKhachHang', $currentUser->MaKhachHang)->first();
    $loaiKhachHang = $khachHang->MaLoaiKhachHang;

    // Tính toán giảm giá
    $discount = 0;
    if ($loaiKhachHang == 1) {
        $discount = 0.10;
    } elseif ($loaiKhachHang == 2) {
        $discount = 0.20;
    } elseif ($loaiKhachHang == 3) {
        $discount = 0.15;
    }

    return view('cart', compact('gioHang', 'sanPhamDetails', 'discount'));
}
}
