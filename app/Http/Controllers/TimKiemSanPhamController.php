<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimKiemSanPhamController extends Controller
{
    public function searchSanPham(Request $request)
    {
        $query = DB::table('sanpham')
            ->leftJoin('hinhanhsanpham', 'sanpham.MaSanPham', '=', 'hinhanhsanpham.MaSanPham');

        if ($request->filled('name')) {
            $query->where('TenSanPham', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->filled('description')) {
            $query->where('MoTa', 'LIKE', '%' . $request->input('description') . '%');
        }

        if ($request->filled('category')) {
            $query->where('MaLoaiSP', 'LIKE', '%' . $request->input('category') . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('Gia', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('Gia', '<=', $request->input('max_price'));
        }

        $products = $query->select('sanpham.*', 'hinhanhsanpham.DuongDanHinhAnh')->get();

        return view('search_results', compact('products'));
    }

    public function productDetail($id)
    {
        $product = DB::table('sanpham')
            ->leftJoin('hinhanhsanpham', 'sanpham.MaSanPham', '=', 'hinhanhsanpham.MaSanPham')
            ->where('sanpham.MaSanPham', $id)
            ->select('sanpham.*', 'hinhanhsanpham.DuongDanHinhAnh')
            ->first();

        if ($product) {
            return view('product_detail', compact('product'));
        } else {
            return redirect()->route('search')->with('error', 'Không tìm thấy sản phẩm');
        }
    }
}
