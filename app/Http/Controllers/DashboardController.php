<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Truy vấn tổng doanh thu
        $totalSales = DB::table('HoaDon')->sum('TongTien');

        // Truy vấn tổng số thanh toán
        $totalPayments = DB::table('PhieuXuatKho')->count();

        // Truy vấn tổng số trả hàng
        $totalReturns = DB::table('HoaDonNhap')->where('TrangThai', 'Đã trả hàng')->count();

        // Truy vấn tổng số người dùng
        $totalUsers = DB::table('TaiKhoan')->count();

        // Truy vấn tổng số sản phẩm
        $totalProducts = DB::table('SanPham')->count();

        // Truy vấn tổng số đơn hàng
        $totalOrders = DB::table('DonHang')->count();

        return view('quanlidashboard', compact('totalSales', 'totalPayments', 'totalReturns', 'totalUsers', 'totalProducts', 'totalOrders'));
    }
}