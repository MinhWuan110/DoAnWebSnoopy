<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart()
    {
        $currentUser = session('user');

        if (!$currentUser) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }

        // Lấy giỏ hàng của khách hàng với phân trang
        $gioHang = DB::table('giohang')
            ->where('MaKhachHang', $currentUser->MaKhachHang)
            ->paginate(5);

        if ($gioHang->isEmpty()) {
            return view('cart', compact('gioHang'))->with('info', 'Giỏ hàng của bạn đang trống.');
        }

        // Lấy tất cả ID sản phẩm từ giỏ hàng
        $sanPhamIds = $gioHang->pluck('MaSanPham')->toArray();
        $sanPhamDetails = DB::table('sanpham')->whereIn('MaSanPham', $sanPhamIds)->get();

        // Trả về view giỏ hàng
        return view('cart', compact('gioHang', 'sanPhamDetails'));
    }
    public function calculateTotalPrice()
    {
        $currentUser = session('user');

        if (!$currentUser) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }

        // Lấy giỏ hàng của khách hàng
        $gioHang = DB::table('giohang')
            ->where('MaKhachHang', $currentUser->MaKhachHang)
            ->get();

        if ($gioHang->isEmpty()) {
            return response()->json(['total' => 0], 200); // Giỏ hàng trống
        }

        // Lấy tất cả ID sản phẩm từ giỏ hàng
        $sanPhamIds = $gioHang->pluck('MaSanPham')->toArray();
        $sanPhamDetails = DB::table('sanpham')->whereIn('MaSanPham', $sanPhamIds)->get();

        // Khởi tạo biến tổng
        $totalPrice = 0;

        // Tính tổng tiền cho tất cả sản phẩm trong giỏ hàng
        foreach ($gioHang as $item) {
            $sanPham = $sanPhamDetails->firstWhere('MaSanPham', $item->MaSanPham);
            if ($sanPham) {
                $totalPrice += $sanPham->Gia * $item->SoLuong;
            }
        }

        return response()->json(['total' => $totalPrice], 200);
    }
    public function updateQuantity(Request $request, $productId)
    {
        $currentUser = session('user');

        if (!$currentUser) {
            return response()->json(['error' => 'Bạn cần đăng nhập để cập nhật giỏ hàng.'], 403);
        }

        $quantity = $request->input('quantity');

        // Cập nhật số lượng sản phẩm trong giỏ hàng
        DB::table('giohang')
            ->where('MaKhachHang', $currentUser->MaKhachHang)
            ->where('MaSanPham', $productId)
            ->update(['SoLuong' => $quantity]);

        return response()->json(['success' => 'Cập nhật số lượng thành công.']);
    }
}
