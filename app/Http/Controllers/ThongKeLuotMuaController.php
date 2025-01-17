<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ThongKeLuotMuaExport;
class ThongKeLuotMuaController extends Controller
{
    // Hiển thị thống kê lượt mua theo tháng, năm và ngày
    public function xemTheoThoiGian(Request $request)
    {
        $month = $request->input('month'); // Lấy tháng từ request
        $year = $request->input('year');  // Lấy năm từ request

        // Truy vấn dữ liệu từ bảng `luotmua`
        $query = DB::table('luotmua')
            ->join('sanpham', 'luotmua.MaSanPham', '=', 'sanpham.MaSanPham')
            ->select(
                'sanpham.MaSanPham',
                'sanpham.TenSanPham',
                'luotmua.NgayMua', // Lấy thêm ngày mua
                'luotmua.SoLuongMua'
            );

        // Lọc theo tháng nếu được chọn
        if ($month) {
            $query->whereMonth('luotmua.NgayMua', $month);
        }

        // Lọc theo năm nếu được chọn
        if ($year) {
            $query->whereYear('luotmua.NgayMua', $year);
        }

        // Sắp xếp dữ liệu theo ngày, tháng và năm
        $luotMua = $query->orderBy('luotmua.NgayMua', 'ASC')->get();

        // Trả về view với dữ liệu
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
            'luotmua.NgayMua',
            'luotmua.SoLuongMua'
        );

    if ($month) {
        $query->whereMonth('luotmua.NgayMua', $month);
    }

    if ($year) {
        $query->whereYear('luotmua.NgayMua', $year);
    }

    $luotMua = $query->orderBy('luotmua.NgayMua', 'ASC')->get();

    return Excel::download(new ThongKeLuotMuaExport($luotMua), 'luotmua.xlsx');
}
}
