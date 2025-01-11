<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Hiển thị trang đăng ký
    public function showRegisterForm()
    {
        return view('register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            // 'MaKhachHang' => 'required|string|max:10|unique:KhachHang,MaKhachHang',
            'HoTen' => 'required|string|max:100',
            'Email' => 'required|email|max:100|unique:KhachHang,Email',
            'SoDienThoai' => 'required|string|max:15',
            'DiaChi' => 'required|string|max:200',
            'MatKhau' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $makhachhang = Str::random(5);
        // Lưu thông tin khách hàng vào cơ sở dữ liệu
        DB::table('KhachHang')->insert([
            'MaKhachHang' => $makhachhang,
            'HoTen' => $request->HoTen,
            'Email' => $request->Email,
            'SoDienThoai' => $request->SoDienThoai,
            'DiaChi' => $request->DiaChi,
            'DiemTL' => 0, // Giá trị mặc định
        ]);

        // Tạo tài khoản cho khách hàng
        $maTaiKhoan = Str::random(5); // Lấy 10 ký tự đầu tiên // Tạo mã tài khoản ngẫu nhiên

        DB::table('TaiKhoan')->insert([
            'MaTaiKhoan' => $maTaiKhoan,
            'TenDangNhap' => $request->Email, // Sử dụng email làm tên đăng nhập
            'MatKhau' => Hash::make($request->MatKhau), // Mã hóa mật khẩu
            'MaKhachHang' => $makhachhang,
            'LoaiTaiKhoan' => 1, // Loại tài khoản mặc định
            'TrangThai' => 1, // Mặc định là 1
            'QuyenHan' => 2
             // Quyền hạn mặc định
        ]);

        return redirect()->route('login.form')->with('success', 'Đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ.');
    }

    // Hiển thị trang đăng nhập
    public function showLoginForm()
    {
        return view('login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'TenDangNhap' => 'required|string',
            'MatKhau' => 'required|string',
        ]);

        $user = DB::table('TaiKhoan')->where('TenDangNhap', $request->TenDangNhap)->first();
        if ($user && Hash::check($request->MatKhau, $user->MatKhau)) {
            session(['user' => $user]);
            return redirect()->intended($user->QuyenHan == 2 ? '/admin/quanlidashboard' : '/trangchu')
                ->with('success', 'Đăng nhập thành công.');
        }

        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác.');
    }

    // Đăng xuất
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login.form')->with('success', 'Đăng xuất thành công.');
    }
}
