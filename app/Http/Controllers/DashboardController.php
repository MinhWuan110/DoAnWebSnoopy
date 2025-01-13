<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = DB::table('thongke')->sum('TongDoanhThu');

        // Truy vấn doanh số theo tuần trong 8 tuần gần nhất
        $salesTrend = DB::table('thongke')
            ->select(DB::raw('SUM(TongDoanhThu) as total_sales'), DB::raw('WEEK(Ngay, 1) as week'), DB::raw('YEAR(Ngay) as year'), DB::raw('MIN(Ngay) as start_date'), DB::raw('MAX(Ngay) as end_date'))
            ->where('Ngay', '>=', now()->subWeeks(8))
            ->groupBy('year', 'week')
            ->orderBy('year')
            ->orderBy('week')
            ->get();

        // Tạo mảng chứa dữ liệu cho biểu đồ
        $salesTrendData = [];
        $salesTrendLabels = [];

        foreach ($salesTrend as $record) {
            // Định dạng ngày tháng
            $startDate = \Carbon\Carbon::parse($record->start_date)->format('d/m');
            $endDate = \Carbon\Carbon::parse($record->end_date)->format('d/m');
            $label = "{$startDate} - {$endDate}";
            $salesTrendLabels[] = $label; // Thêm nhãn
            $salesTrendData[] = $record->total_sales; // Thêm doanh số
        }

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

        return view('quanlidashboard', compact('totalSales', 'salesTrendData', 'salesTrendLabels', 'totalPayments', 'totalReturns', 'totalUsers', 'totalProducts', 'totalOrders'));
    }
}