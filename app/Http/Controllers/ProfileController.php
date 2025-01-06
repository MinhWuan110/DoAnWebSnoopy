<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    public function index(){
        $khachhangs = DB::table('khachhang')->get();
        return view('trangcanhan',compact('khachhangs'));
    }
    public function show($maTaiKhoan)
    {
        // Lấy thông tin tài khoản từ bảng taikhoan
        $taikhoan = DB::table('taikhoan')->where('MaTaiKhoan', $maTaiKhoan)->first();
    
        // Kiểm tra xem tài khoản có tồn tại không
        if (is_null($taikhoan)) {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản nào.');
        }
    
        // Kiểm tra xem MaKhachHang có tồn tại không
        if (!is_null($taikhoan->MaKhachHang)) {
            // Nếu có, lấy thông tin khách hàng
            $khachhang = DB::table('khachhang')->where('MaKhachHang', $taikhoan->MaKhachHang)->first();
    
            // Kiểm tra xem khách hàng có tồn tại không
            if (is_null($khachhang)) {
                return redirect()->back()->with('error', 'Không tìm thấy khách hàng nào.');
            }
    
            // Trả về view với thông tin khách hàng
            return view('trangcanhan', compact('khachhang'));
        } else {
            // Nếu không có MaKhachHang, lấy thông tin nhân viên
            $nhanvien = DB::table('nhanvien')->where('MaNV', $taikhoan->MaNV)->first();
    
            // Kiểm tra xem nhân viên có tồn tại không
            if (is_null($nhanvien)) {
                return redirect()->back()->with('error', 'Không tìm thấy nhân viên nào.');
            }
    
            // Trả về view với thông tin nhân viên
            return view('trangcanhan', compact('nhanvien'));
        }
    }
}
