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
     { $request->validate([ 'MaDanhMuc' => 'required|string|max:10|unique:danhmucsanpham,MaDanhMuc', 
        'TenDanhMuc' => 'required|string|max:50', ]); 
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
        $deleted = DB::table('quanlidanhmucsanpham')->where('MaDanhMuc', $id)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Danh mục đã được xóa thành công.');
        }
        return redirect()->back()->with('error', 'Danh mục không tìm thấy.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query'); // Lấy giá trị tìm kiếm từ input
        $danhMucSanPhams = DB::table('danhmucsanpham')->where('TenDanhMuc', 'LIKE', "%{$query}%")->get();
        return view('quanlidanhmucsanpham',compact('danhMucSanPhams'));

}}
