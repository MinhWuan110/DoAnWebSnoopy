<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = DB::table('HoaDon')->sum('TongTien');

        // Truy vấn doanh số theo tháng (trong 6 tháng gần nhất)
        $salesTrend = DB::table('HoaDon')
            ->select(DB::raw('SUM(TongTien) as total_sales'), DB::raw('MONTH(NgayLap) as month'))
            ->where('NgayLap', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_sales')
            ->toArray(); // Chuyển đổi thành mảng
        // Truy vấn tổng doanh thu
        // $totalSales = DB::table('HoaDon')->sum('TongTien');

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

        return view('quanlidashboard', compact('totalSales', 'salesTrend', 'totalPayments', 'totalReturns', 'totalUsers', 'totalProducts', 'totalOrders'));
    }
}
