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
            'MaDanhMuc' => 'required|string|max:10',
            'TenDanhMuc' => 'required|string|max:50',
        ]);

        // Kiểm tra xem mã danh mục đã tồn tại chưa
        $existsMaDanhMuc = DB::table('danhmucsanpham')->where('MaDanhMuc', $request->input('MaDanhMuc'))->exists();
        if ($existsMaDanhMuc) {
            return redirect()->route('quanlidanhmucsanpham')->with('error', 'Mã danh mục đã tồn tại.');
        }

        // Kiểm tra xem tên danh mục đã tồn tại chưa
        $existsTenDanhMuc = DB::table('danhmucsanpham')->where('TenDanhMuc', $request->input('TenDanhMuc'))->exists();
        if ($existsTenDanhMuc) {
            return redirect()->route('quanlidanhmucsanpham')->with('error', 'Tên danh mục đã tồn tại.');
        }

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

    public function update(Request $request, $maDanhMuc)
    {
        $request->validate([
            'TenDanhMuc' => 'required|string|max:50',
            'MaDanhMuc'=> 'required|string|max:10',
        ]);

        DB::table('danhmucsanpham')->where('MaDanhMuc', $maDanhMuc)->update([
            'TenDanhMuc' => $request->input('TenDanhMuc'),
            'MaDanhMuc'=>$request->input('MaDanhMuc'),
        ]);

        return redirect()->route('quanlidanhmucsanpham')->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $deleted = DB::table('danhmucsanpham')->where('MaDanhMuc', $id)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Danh mục đã được xóa thành công.');
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
