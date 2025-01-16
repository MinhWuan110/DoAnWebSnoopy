<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanphamnoibat;
use Illuminate\Support\Facades\DB;

class SanphamnoibatController extends Controller
{
    
     public function sanpham()
    {
        $sanPhams = DB::table('sanpham')->get(); // Lấy danh sách sản phẩm
        $nhaCungCaps = DB::table('NhaCungCap')->get(); // Lấy danh sách nhà cung cấp
        $loaiSanPhams = DB::table('LoaiSanPham')->get(); // Lấy danh sách loại sản phẩm
        return view('sanpham.sanphamnoibat ', compact('sanPhams', 'nhaCungCaps', 'loaiSanPhams')); // Truyền dữ liệu đến view
    } 


public function index()
{
  
    $mangMasanpham = Sanphamnoibat::pluck('masanpham')->toArray();
    // Lấy danh sách sản phẩm từ bảng sanpham mà có MaSanPham trong sanphamnoibat
    $sanPhamNoiBat = DB::table('sanpham')
        ->whereIn('MaSanPham', $mangMasanpham)
        ->get();
    // Lấy tất cả sản phẩm từ bảng sanpham (nếu bạn vẫn cần lấy tất cả sản phẩm để hiển thị)
    $sanPhamss = DB::table('sanpham')->get();

    return view('sanpham.sanphamnoibat', compact('sanPhamss', 'sanPhamNoiBat'));
}


  

 public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'masanpham' => 'required|exists:sanpham,Masanpham',
        ]);

        // Lưu vào bảng sanphamnoibat
        Sanphamnoibat::create([
            'Masanpham' => $request->masanpham,
        ]);

        // Lấy lại danh sách sản phẩm để hiển thị
        $sanpham = Sanphamnoibat::all();

        // Quay lại trang với dữ liệu được cập nhật
        return back()->with([
            'success' => 'Thêm sản phẩm nổi bật thành công!',
            'sanpham' => $sanpham,
        ]);
    }



    // Hiển thị form thêm sản phẩm mới
    public function create()
    {
        return view('sanphamnoibat.create');
    }

    // Lưu sản phẩm mới vào cơ sở dữ liệu
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'Masanpham' => 'required|max:10|unique:sanphamnoibat',
    //         'Tensanpham' => 'required|max:100',
    //     ]);

    //     Sanphamnoibat::create($request->all());
    //     return redirect()->route('sanphamnoibat.index')->with('success', 'Thêm sản phẩm thành công!');
    // }

    // Hiển thị form sửa sản phẩm
    public function edit($id)
    {
        $sanpham = Sanphamnoibat::findOrFail($id);
        return view('sanphamnoibat.edit', compact('sanpham'));
    }

    // Cập nhật sản phẩm trong cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        $request->validate([
            'Tensanpham' => 'required|max:100',
        ]);

        $sanpham = Sanphamnoibat::findOrFail($id);
        $sanpham->update($request->all());
        return redirect()->route('sanphamnoibat.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $sanpham = Sanphamnoibat::findOrFail($id);
        $sanpham->delete();
        return redirect()->route('sanphamnoibat.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
