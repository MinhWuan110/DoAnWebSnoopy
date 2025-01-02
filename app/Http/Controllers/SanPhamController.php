<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function index()
    {
        $sanPhams = DB::table('sanpham')->get(); 
        return view('quanlisanpham', compact('sanPhams')); // Truyền dữ liệu đến view
    }



    public function create()
    {
        // Hiển thị form tạo sản phẩm
    }

    public function store(Request $request)
    {
        // Lưu sản phẩm mới vào cơ sở dữ liệu
    }

    public function show($id)
    {
        // Hiển thị chi tiết sản phẩm
    }

    public function edit($id)
    {
        // Hiển thị form chỉnh sửa sản phẩm
    }

    public function update(Request $request, $id)
    {
        // Cập nhật sản phẩm
    }

    public function destroy($id)
    {
        // Xóa sản phẩm
    }
}
