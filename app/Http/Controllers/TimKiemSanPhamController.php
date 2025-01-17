<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimKiemSanPhamController extends Controller
{
    public function searchSanPham(Request $request)
    {
        // Lấy danh sách danh mục sản phẩm từ cơ sở dữ liệu
        $categories = DB::table('danhmucsanpham')->get();

        // Nếu không có điều kiện tìm kiếm nào, trả về trang tìm kiếm kèm danh mục sản phẩm
        if (!$request->hasAny(['name', 'category', 'min_price', 'max_price'])) {
            return view('search', compact('categories'));
        }

        $query = DB::table('sanpham')
            ->leftJoin('hinhanhsanpham', 'sanpham.MaSanPham', '=', 'hinhanhsanpham.MaSanPham')
            ->leftJoin('loaisanpham', 'sanpham.MaLoaiSP', '=', 'loaisanpham.MaLoaiSP')
            ->leftJoin('danhmucsanpham', 'loaisanpham.MaDanhMuc', '=', 'danhmucsanpham.MaDanhMuc');

        if ($request->filled('name')) {
            $query->where('TenSanPham', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->filled('category')) {
            $query->where('danhmucsanpham.MaDanhMuc', $request->input('category'));
        }

        if ($request->filled('min_price')) {
            $query->where('Gia', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('Gia', '<=', $request->input('max_price'));
        }

        $products = $query->select('sanpham.*', 'hinhanhsanpham.DuongDanHinhAnh', 'loaisanpham.MaDanhMuc')->paginate(10);

        return view('search_results', compact('products', 'categories'));
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
