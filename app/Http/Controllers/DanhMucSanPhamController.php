<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucSanPhamController extends Controller
{
    public function index()
    {
        $danhMucSanPhams = DB::table('danhmucsanpham')->get(); 
        return view('quanlidanhmucsanpham', compact('danhMucSanPhams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaDanhMuc' => 'required|string|max:10|unique:danhmucsanpham,MaDanhMuc', 
            'TenDanhMuc' => 'required|string|max:50',
        ]); 

        DB::table('danhmucsanpham')->insert([
            'MaDanhMuc' => $request->input('MaDanhMuc'),
            'TenDanhMuc' => $request->input('TenDanhMuc'), 
        ]); 
        
        return redirect()->route('quanlidanhmucsanpham')->with('success', 'Danh mục đã được thêm thành công.');
    }

    public function edit($id)
    {
        $danhMuc = DB::table('danhmucsanpham')->where('MaDanhMuc', $id)->first();
        return view('quanlidanhmucsanpham.edit', compact('danhMuc'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'MaDanhMuc' => 'required|string|max:10|unique:danhmucsanpham,MaDanhMuc,' . $id . ',MaDanhMuc',
            'TenDanhMuc' => 'required|string|max:50',
        ]);

        DB::table('danhmucsanpham')->where('MaDanhMuc', $id)->update([
            'MaDanhMuc' => $request->input('MaDanhMuc'),
            'TenDanhMuc' => $request->input('TenDanhMuc'),
        ]);

        return redirect()->route('quanlidanhmucsanpham')->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        // Xóa tất cả các chi tiết giỏ hàng liên quan đến sản phẩm trong danh mục
        DB::table('chitietgiohang')->whereIn('MaSanPham', function($query) use ($id) {
            $query->select('MaSanPham')
                  ->from('sanpham')
                  ->whereIn('MaLoaiSP', function($query) use ($id) {
                      $query->select('MaLoaiSP')
                            ->from('loaisanpham')
                            ->where('MaDanhMuc', $id);
                  });
        })->delete();

        // Xóa tất cả các sản phẩm trong giỏ hàng
        DB::table('giohang')->whereIn('MaSanPham', function($query) use ($id) {
            $query->select('MaSanPham')
                  ->from('sanpham')
                  ->whereIn('MaLoaiSP', function($query) use ($id) {
                      $query->select('MaLoaiSP')
                            ->from('loaisanpham')
                            ->where('MaDanhMuc', $id);
                  });
        })->delete();

        // Xóa tất cả các chi tiết hóa đơn liên quan đến sản phẩm trong danh mục
        DB::table('chitiethoadon')->whereIn('MaSanPham', function($query) use ($id) {
            $query->select('MaSanPham')
                  ->from('sanpham')
                  ->whereIn('MaLoaiSP', function($query) use ($id) {
                      $query->select('MaLoaiSP')
                            ->from('loaisanpham')
                            ->where('MaDanhMuc', $id);
                  });
        })->delete();

        // Xóa tất cả các chi tiết sản phẩm liên quan đến sản phẩm trong danh mục
        DB::table('chitietsanpham')->whereIn('MaSanPham', function($query) use ($id) {
            $query->select('MaSanPham')
                  ->from('sanpham')
                  ->whereIn('MaLoaiSP', function($query) use ($id) {
                      $query->select('MaLoaiSP')
                            ->from('loaisanpham')
                            ->where('MaDanhMuc', $id);
                  });
        })->delete();

        // Xóa tất cả các đánh giá sản phẩm liên quan đến sản phẩm trong danh mục
        DB::table('danhgiasanpham')->whereIn('MaSanPham', function($query) use ($id) {
            $query->select('MaSanPham')
                  ->from('sanpham')
                  ->whereIn('MaLoaiSP', function($query) use ($id) {
                      $query->select('MaLoaiSP')
                            ->from('loaisanpham')
                            ->where('MaDanhMuc', $id);
                  });
        })->delete();

        // Xóa tất cả các hình ảnh sản phẩm liên quan đến sản phẩm trong danh mục
        DB::table('hinhanhsanpham')->whereIn('MaSanPham', function($query) use ($id) {
            $query->select('MaSanPham')
                  ->from('sanpham')
                  ->whereIn('MaLoaiSP', function($query) use ($id) {
                      $query->select('MaLoaiSP')
                            ->from('loaisanpham')
                            ->where('MaDanhMuc', $id);
                  });
        })->delete();

        // Xóa tất cả các sản phẩm khuyến mãi liên quan đến sản phẩm trong danh mục
        DB::table('sanphamkhuyenmai')->whereIn('MaSanPham', function($query) use ($id) {
            $query->select('MaSanPham')
                  ->from('sanpham')
                  ->whereIn('MaLoaiSP', function($query) use ($id) {
                      $query->select('MaLoaiSP')
                            ->from('loaisanpham')
                            ->where('MaDanhMuc', $id);
                  });
        })->delete();

        // Xóa tất cả các sản phẩm nổi bật liên quan đến sản phẩm trong danh mục
        DB::table('sanphamnoibat')->whereIn('MaSanPham', function($query) use ($id) {
            $query->select('MaSanPham')
                  ->from('sanpham')
                  ->whereIn('MaLoaiSP', function($query) use ($id) {
                      $query->select('MaLoaiSP')
                            ->from('loaisanpham')
                            ->where('MaDanhMuc', $id);
                  });
        })->delete();

        // Xóa tất cả các sản phẩm thuộc loại sản phẩm trong danh mục
        DB::table('sanpham')->whereIn('MaLoaiSP', function($query) use ($id) {
            $query->select('MaLoaiSP')
                  ->from('loaisanpham')
                  ->where('MaDanhMuc', $id);
        })->delete();

        // Xóa tất cả các loại sản phẩm trong danh mục
        DB::table('loaisanpham')->where('MaDanhMuc', $id)->delete();

        // Xóa danh mục
        $deleted = DB::table('danhmucsanpham')->where('MaDanhMuc', $id)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Danh mục và các sản phẩm liên quan đã được xóa thành công.');
        }

        return redirect()->back()->with('error', 'Danh mục không tìm thấy.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $danhMucSanPhams = DB::table('danhmucsanpham')->where('TenDanhMuc', 'LIKE', "%{$query}%")->get();
        return view('quanlidanhmucsanpham', compact('danhMucSanPhams'));
    }
}
