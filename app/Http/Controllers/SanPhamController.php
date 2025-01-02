<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function index()
    {
        $sanPhams = DB::table('sanpham')->get(); // Lấy danh sách sản phẩm
        $nhaCungCaps = DB::table('NhaCungCap')->get(); // Lấy danh sách nhà cung cấp
        $loaiSanPhams = DB::table('LoaiSanPham')->get(); // Lấy danh sách loại sản phẩm
        return view('quanlisanpham', compact('sanPhams', 'nhaCungCaps', 'loaiSanPhams')); // Truyền dữ liệu đến view
    }


    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'MaSanPham' => 'required|string|max:10|unique:SanPham,MaSanPham',
            'TenSanPham' => 'required|string|max:100',
            'Gia' => 'required|integer|min:0',
            'MaLoaiSP' => 'required|string|max:10|exists:LoaiSanPham,MaLoaiSP',
            'SoLuong' => 'required|integer|min:0',
            'MaNhaCungCap' => 'required|string|max:10|exists:NhaCungCap,MaNhaCungCap',
            // Thêm các quy tắc xác thực khác nếu cần
        ]);

        // Lưu sản phẩm mới vào cơ sở dữ liệu
        DB::table('SanPham')->insert([
            'MaSanPham' => $request->MaSanPham,
            'TenSanPham' => $request->TenSanPham,
            'Gia' => $request->Gia,
            'MaLoaiSP' => $request->MaLoaiSP,
            'SoLuong' => $request->SoLuong,
            'MaNhaCungCap' => $request->MaNhaCungCap,
            'TrangThai' => 1, // Mặc định là 1
        ]);



        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('store.sanpham')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    public function show($id)
    {
        // Hiển thị chi tiết sản phẩm
    }

    public function edit($id)
    {
        $sanPham = DB::table('sanpham')->where('MaSanPham', $id)->first(); // Lấy sản phẩm theo ID
        return view('quanlisanpham', compact('sanPham'));
    }

    public function update(Request $request, $maSanPham)
    {
        // Xác thực dữ liệu nhập vào
        $request->validate([
            'TenSanPham' => 'required|string|max:100',
            'Gia' => 'required|integer|min:0',
            'MaLoaiSP' => 'required|string|max:10',
            'SoLuong' => 'required|integer|min:0',
            'MaNhaCungCap' => 'required|string|max:10',
            'TrangThai' => 'nullable|integer|in:0,1', // 0 hoặc 1
        ]);

        // Cập nhật sản phẩm trong cơ sở dữ liệu
        DB::table('SanPham')->where('MaSanPham', $maSanPham)->update([
            'TenSanPham' => $request->input('TenSanPham'),
            'Gia' => $request->input('Gia'),
            'MaLoaiSP' => $request->input('MaLoaiSP'),
            'SoLuong' => $request->input('SoLuong'),
            'MaNhaCungCap' => $request->input('MaNhaCungCap'),
            'TrangThai' => $request->input('TrangThai', 1), // Mặc định là 1 nếu không có giá trị
        ]);

        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('quanlisanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $deleted = DB::table('sanpham')->where('MaSanPham', $id)->delete(); // Xóa sản phẩm

        if ($deleted) {
            return redirect()->back()->with('success', 'Sản phẩm đã được xóa thành công.');
        }
        return redirect()->back()->with('error', 'Sản phẩm không tìm thấy.');
    }
}
