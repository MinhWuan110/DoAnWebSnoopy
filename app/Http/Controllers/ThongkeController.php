<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ThongkeController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu từ bảng thongke
        $thongkeData = DB::table('thongke')->select('Ngay', 'TongDoanhThu')->get();

        // Trả về view với dữ liệu thống kê
        return view('thongkedoanhthu', compact('thongkeData'));
    }

 
}
