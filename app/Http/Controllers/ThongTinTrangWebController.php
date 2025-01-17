<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongTinTrangWebController extends Controller
{
    public function edit()
    {
        $companyInfo = DB::table('ThongTinCongTy')->first();


 
        $thongTin = DB::table('thongtintrangweb')->first();

        // Trả về view và truyền dữ liệu
        return view('thongtintrangwebedit', compact('thongTin','companyInfo'));
    }

    public function update(Request $request)
    {
    
        // Xác thực dữ liệu từ form
    $request->validate([
        'tentrangweb' => 'required|string|max:255',
        'hotline' => 'required|string|max:255',
        'goimua' => 'required|string|max:255',
        'khieunai' => 'required|string|max:255',
        'baohanh' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'diachi' => 'required|string|max:255',
        'giolamviec' => 'required|string|max:255',
        'thongtinvecongty' => 'required|string',
        'chinhsachcongty' => 'required|string',
        'linhvucchinh' => 'required|string',
        'chamsockhachhang' => 'required|string',
    ]);

    // Cập nhật bảng thongtintrangweb
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

    // // Cập nhật bảng thongtincongty
    // $companyInfo = ThongTinCongTyController::first(); // Chắc chắn rằng bạn có model ThongTinCongTy

    // if ($companyInfo) {
    //     $companyInfo->DiaChi = $request->input('diachi');
    //     $companyInfo->GioiThieu = $request->input('thongtinvecongty');
    //     $companyInfo->ChinhSachCongTy = $request->input('chinhsachcongty');
    //     $companyInfo->LinhVuc = $request->input('linhvucchinh');
    //     $companyInfo->ChamSocKhachHang = $request->input('chamsockhachhang');

    //     // Lưu dữ liệu vào database
    //     $companyInfo->save();
    // }

    // Chuyển hướng về trang chỉnh sửa với thông báo thành công
    return redirect()->route('thongtin.edit')->with('success', 'Cập nhật thành công!');
    }
}
