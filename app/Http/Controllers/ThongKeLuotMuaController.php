<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ThongKeLuotMuaExport;
class ThongKeLuotMuaController extends Controller
{
    // Phương thức để hiển thị thống kê lượt mua theo tháng và năm
    public function xemTheoThoiGian(Request $request)
    {
        // Lấy tháng và năm từ yêu cầu (nếu có)
        $month = $request->input('month');
        $year = $request->input('year');

        // Truy vấn cơ sở dữ liệu để lấy thống kê lượt mua
        $query = DB::table('luotmua')
            ->join('sanpham', 'luotmua.MaSanPham', '=', 'sanpham.MaSanPham')
            ->select(
                'sanpham.MaSanPham',
                'sanpham.TenSanPham',
                DB::raw('SUM(luotmua.SoLuongMua) as TongSoLuongMua'),
                DB::raw('MONTH(luotmua.NgayMua) as Thang'),
                DB::raw('YEAR(luotmua.NgayMua) as Nam')
            );

        // Nếu có tháng, lọc theo tháng
        if ($month) {
            $query->whereMonth('luotmua.NgayMua', $month);
        }

        // Nếu có năm, lọc theo năm
        if ($year) {
            $query->whereYear('luotmua.NgayMua', $year);
        }
            
        $query->orderBy('Nam')->orderBy('Thang');
        // Nhóm theo sản phẩm, tháng, năm và tính tổng số lượng mua
        $luotMua = $query->groupBy('sanpham.MaSanPham', 'sanpham.TenSanPham', 'Thang', 'Nam')
            ->orderBy('TongSoLuongMua', 'DESC')
            ->get();

        // Trả về view với dữ liệu thống kê
        return view('thongkeluotmua', [
            'luotMua' => $luotMua,
            'month' => $month,
            'year' => $year,
        ]);
    }


 public function export(Request $request)
{
    $month = $request->input('month');
    $year = $request->input('year');

    $query = DB::table('luotmua')
        ->join('sanpham', 'luotmua.MaSanPham', '=', 'sanpham.MaSanPham')
        ->select(
            'sanpham.MaSanPham',
            'sanpham.TenSanPham',
            DB::raw('SUM(luotmua.SoLuongMua) as TongSoLuongMua'),
            DB::raw('MONTH(luotmua.NgayMua) as Thang'),
            DB::raw('YEAR(luotmua.NgayMua) as Nam')
        );

    if ($month) {
        $query->whereMonth('luotmua.NgayMua', $month);
    }

    if ($year) {
        $query->whereYear('luotmua.NgayMua', $year);
    }

    $luotMua = $query->groupBy('sanpham.MaSanPham', 'sanpham.TenSanPham', 'Thang', 'Nam')
        ->orderBy('TongSoLuongMua', 'DESC')
        ->get();

    return Excel::download(new ThongKeLuotMuaExport($luotMua), 'thongkeluotmua.xlsx');
}

}


