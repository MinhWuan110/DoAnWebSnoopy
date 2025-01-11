<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongTinTrangWebController extends Controller
{
    public function edit()
    {
        // Lấy dữ liệu hiện tại từ bảng thongtintrangweb
        $thongTin = DB::table('thongtintrangweb')->first();

        // Trả về view và truyền dữ liệu
        return view('thongtintrangwebedit', compact('thongTin'));
    }

    public function update(Request $request)
    {
        // Validate dữ liệu (nếu cần)
        $request->validate([
            'tentrangweb' => 'required|string|max:255',
            'hotline' => 'required|string|max:255',
            'goimua' => 'required|string|max:255',
            'khieunai' => 'required|string|max:255',
            'baohanh' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'diachi' => 'required|string|max:255',
            'giolamviec' => 'required|string|max:255',
        ]);

        // Cập nhật dữ liệu trong bảng thongtintrangweb
        DB::table('thongtintrangweb')
            ->update([
                'tentrangweb' => $request->input('tentrangweb'),
                'hotline' => $request->input('hotline'),
                'goimua' => $request->input('goimua'),
                'khieunai' => $request->input('khieunai'),
                'baohanh' => $request->input('baohanh'),
                'email' => $request->input('email'),
                'diachi' => $request->input('diachi'),
                'giolamviec' => $request->input('giolamviec'),
            ]);

        // Chuyển hướng về trang chỉnh sửa với thông báo thành công
        return redirect()->route('thongtin.edit')->with('success', 'Cập nhật thành công!');
    }
}
