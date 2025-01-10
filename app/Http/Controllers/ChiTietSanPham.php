<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\ProductCountUpdated;
use App\Models\HinhAnhSanPham;

class ChiTietSanPham extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($masp)
    {
        // $count = DB::table('sanpham')->sum('SoLuong');
        // event(new ProductCountUpdated($count));


        $viewData = [];
        $viewData['sanPham'] = sanpham::where('MaSanPham', $masp)
        ->select('TenSanPham', 'Gia', 'SoLuong')
        ->first();
        $viewData['hinhAnhSanPham'] = HinhAnhSanPham::where('MaSanPham', $masp)
        ->select('DuongDanHinhAnh')
        ->get();
        $viewData['chiTietSanPham'] = DB::table('chitietsanpham')
        ->where('MaSanPham', $masp)
        ->first();
        $viewData['danhGiaSanPham'] = DB::table('danhgiasanpham')
        ->join('KhachHang', 'danhgiasanpham.MaKhachHang', '=', 'KhachHang.MaKhachHang')
        ->join('SanPham', 'danhgiasanpham.MaSanPham', '=', 'SanPham.MaSanPham')
        ->where('SanPham.MaSanPham', $masp)
        ->select('KhachHang.HoTen', 'danhgiasanpham.BinhLuan', 'danhgiasanpham.XepHang', 'danhgiasanpham.NgayDanhGia')
        ->get();
        $viewData['totalReviews'] = DB::table('danhgiasanpham')
        ->where('MaSanPham', $masp)
        ->count();
        $viewData['averageRating'] = DB::table('danhgiasanpham')
        ->where('MaSanPham', $masp)
        ->avg('XepHang');
        return view('chitietsanpham')->with("viewData" , $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
