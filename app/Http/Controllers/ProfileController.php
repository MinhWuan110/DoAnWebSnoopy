<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $khachhangs = DB::table('khachhang')->get();
        return view('trangcanhan', compact('khachhangs'));
    }
    public function show()
    {
        $currentUser = session('user');

        // Kiểm tra xem người dùng có đăng nhập không
        if (!$currentUser) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }

        $taikhoan = DB::table('taikhoan')->where('MaTaiKhoan', $currentUser->MaTaiKhoan)->first();

        // Kiểm tra xem tài khoản có tồn tại không
        if (is_null($taikhoan)) {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản nào.');
        }

        // Lấy danh sách yêu thích
        $favorites = collect();

        if (!is_null($taikhoan->MaKhachHang)) {
            // Nếu là khách hàng
            $khachhang = DB::table('khachhang')->where('MaKhachHang', $taikhoan->MaKhachHang)->first();

            if (is_null($khachhang)) {
                return redirect()->back()->with('error', 'Không tìm thấy khách hàng nào.');
            }

            // Lấy danh sách đánh giá sản phẩm của khách hàng
            $danhgiasanpham = DB::table('danhgiasanpham')
                ->where('MaKhachHang', $khachhang->MaKhachHang)
                ->join('sanpham', 'danhgiasanpham.MaSanPham', '=', 'sanpham.MaSanPham')
                ->select('sanpham.TenSanPham', 'danhgiasanpham.XepHang', 'danhgiasanpham.NgayDanhGia', 'sanpham.Gia', 'sanpham.TrangThai', 'danhgiasanpham.BinhLuan')
                ->get();

            // Lấy danh sách đơn hàng của khách hàng
            $donhangs = DB::table('donhang')
                ->where('MaKhachHang', $khachhang->MaKhachHang)
                ->join('phuongthucvanchuyen', 'donhang.Ma_PTVanChuyen', '=', 'phuongthucvanchuyen.MaPhuongThuc')
                ->select('donhang.MaDonHang', 'donhang.NgayDatHang', 'donhang.NgayGiaoHangDuKien', 'donhang.NgayGiaoHangThucTe', 'donhang.TrangThaiDonHang', 'donhang.TongTien', 'donhang.GhiChu', 'phuongthucvanchuyen.TenPhuongThuc')
                ->get();

            // Lấy danh sách yêu thích
            $favorites = DB::table('sanphamyeuthich')
                ->where('MaKhachHang', $khachhang->MaKhachHang)
                ->join('sanpham', 'sanphamyeuthich.MaSanPham', '=', 'sanpham.MaSanPham')
                ->select('sanpham.*', 'sanphamyeuthich.MaYeuThich')
                ->get();

            return view('trangcanhan', compact('khachhang', 'danhgiasanpham', 'donhangs', 'favorites'));
        } else {
            // Nếu không có MaKhachHang, lấy thông tin nhân viên
            $nhanvien = DB::table('nhanvien')->where('MaNV', $taikhoan->MaNV)->first();

            if (is_null($nhanvien)) {
                return redirect()->back()->with('error', 'Không tìm thấy nhân viên nào.');
            }

            return view('trangcanhan', compact('nhanvien'));
        }
    }
    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            // Các quy tắc khác nếu cần
        ]);

        // Kiểm tra xem là khách hàng hay nhân viên
        if ($request->has('DiemTL')) {
            // Cập nhật thông tin khách hàng
            DB::table('khachhang')->where('MaKhachHang', $id)->update([
                'HoTen' => $request->name,
                'Email' => $request->email,
                'SoDienThoai' => $request->phone,
                'DiaChi' => $request->address,
                'DiemTL' => $request->DiemTL,
                // Thêm các trường khác nếu cần
            ]);
        } else {
            // Cập nhật thông tin nhân viên
            DB::table('nhanvien')->where('MaNV', $id)->update([
                'HoTen' => $request->name,
                'CCCD' => $request->cccd,
                'GioiTinh' => $request->gender,
                'ChucVu' => $request->position,
                'NgayVaoLam' => $request->startDate,
                'DiaChi' => $request->address,
                'SoDienThoai' => $request->phone,
                'TrangThai' => 1, // Đặt trạng thái là 1 (hoạt động)
                // Thêm các trường khác nếu cần
            ]);
        }

        return redirect()->route('profile.show')->with('success', 'Cập nhật thông tin thành công.');
    }

    public function destroy($id)
    {
        // Kiểm tra xem đơn hàng có tồn tại không
        $donhang = DB::table('donhang')->where('MaDonHang', $id)->first();

        if (is_null($donhang)) {
            return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
        }

        // Kiểm tra thời gian đặt hàng
        $ngayDatHang = \Carbon\Carbon::parse($donhang->NgayDatHang);
        $now = \Carbon\Carbon::now();

        // Kiểm tra xem đơn hàng có được đặt trong vòng 24 giờ không
        if ($now->diffInHours($ngayDatHang) >= 24) {
            return redirect()->back()->with('error', 'Bạn chỉ có thể hủy đơn hàng trong vòng 24 giờ từ lúc đặt.');
        }

        // Xóa các chi tiết đơn hàng liên quan
        DB::table('chitietdonhang')->where('MaDonHang', $id)->delete();

        // Xóa đơn hàng
        DB::table('donhang')->where('MaDonHang', $id)->delete();

        return redirect()->route('profile.show')->with('success', 'Đơn hàng đã được hủy.');
    }
    public function addFavorite(Request $request)
    {
        $request->validate([
            'MaSanPham' => 'required|string|max:10',
        ]);

        $currentUser = session('user');
        if (!$currentUser || !$currentUser->MaKhachHang) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào danh sách yêu thích.');
        }

        DB::table('sanphamyeuthich')->insert([
            'MaSanPham' => $request->MaSanPham,
            'MaKhachHang' => $currentUser->MaKhachHang,
        ]);

        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào danh sách yêu thích.');
    }

    
    public function destroyFavorite($id)
    {
        DB::table('sanphamyeuthich')->where('MaYeuThich', $id)->delete();
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích.');
    }
}
