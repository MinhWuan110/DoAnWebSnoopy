<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ThongKeDoanhThuExport;



class ThongKeController extends Controller
{
    public function thongKeDoanhThu(Request $request)
    {
        $month = $request->get('month');
        $year = $request->get('year');

        $query = DB::table('luotmua')
            ->join('sanpham', 'luotmua.MaSanPham', '=', 'sanpham.MaSanPham')
            ->selectRaw('
                sanpham.MaSanPham,
                sanpham.TenSanPham,
                SUM(luotmua.SoLuongMua * sanpham.Gia) as TongDoanhThu,
                MONTH(luotmua.NgayMua) as Thang,
                YEAR(luotmua.NgayMua) as Nam
            ')
            ->groupBy('sanpham.MaSanPham', 'sanpham.TenSanPham', 'Thang', 'Nam');

        if ($month) {
            $query->whereRaw('MONTH(luotmua.NgayMua) = ?', [$month]);
        }

        if ($year) {
            $query->whereRaw('YEAR(luotmua.NgayMua) = ?', [$year]);
        }

        $query->orderBy('Nam')->orderBy('Thang');

        $thongKe = $query->get();

        return view('thongke.doanhthu', compact('thongKe', 'month', 'year'));
    }
public function export(Request $request)
{
    $month = $request->get('month');
    $year = $request->get('year');

    $query = DB::table('luotmua')
        ->join('sanpham', 'luotmua.MaSanPham', '=', 'sanpham.MaSanPham')
        ->selectRaw('
            sanpham.MaSanPham,
            sanpham.TenSanPham,
            SUM(luotmua.SoLuongMua * sanpham.Gia) as TongDoanhThu,
            MONTH(luotmua.NgayMua) as Thang,
            YEAR(luotmua.NgayMua) as Nam
        ')
        ->groupBy('sanpham.MaSanPham', 'sanpham.TenSanPham', 'Thang', 'Nam');

    if ($month) {
        $query->whereRaw('MONTH(luotmua.NgayMua) = ?', [$month]);
    }

    if ($year) {
        $query->whereRaw('YEAR(luotmua.NgayMua) = ?', [$year]);
    }

    $thongKe = $query->get();

    return Excel::download(new ThongKeDoanhThuExport($thongKe), 'thongkedoanhthu.xlsx');
}


}


