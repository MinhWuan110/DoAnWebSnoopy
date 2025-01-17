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
        $gioHang = DB::table('giohang')->where('MaKhachHang', $currentUser->MaKhachHang)->get();

        if ($gioHang->isEmpty()) {
            return response()->json(['total' => 0], 200); // Giỏ hàng trống
        }

        // Tính tổng tiền cho tất cả sản phẩm trong giỏ hàng
        $totalPrice = $gioHang->sum(function ($item) {
            $sanPham = DB::table('sanpham')->where('MaSanPham', $item->MaSanPham)->first();
            return $sanPham ? $sanPham->Gia * $item->SoLuong : 0;
        });

        return response()->json(['total' => $totalPrice], 200);
    }

    public function updateQuantity(Request $request, $productId)
    {
        $currentUser = session('user');

        if (!$currentUser) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để cập nhật giỏ hàng.');
        }

        $quantity = $request->input('quantity');

        // Cập nhật số lượng sản phẩm trong giỏ hàng
        DB::table('giohang')
            ->where('MaKhachHang', $currentUser->MaKhachHang)
            ->where('MaSanPham', $productId)
            ->update(['SoLuong' => $quantity]);

        return redirect()->back()->with('success', 'Cập nhật số lượng sản phẩm thành công.');
    }

    public function removeFromCart($productId)
    {
        $currentUser = session('user');

        if (!$currentUser) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xóa sản phẩm.');
        }

        // Xóa sản phẩm khỏi giỏ hàng
        DB::table('giohang')
            ->where('MaKhachHang', $currentUser->MaKhachHang)
            ->where('MaSanPham', $productId)
            ->delete();

        return redirect()->back()->with('success', 'Xóa sản phẩm khỏi giỏ hàng thành công.');
    }

    public function clearCart()
    {
        $currentUser = session('user');

        if (!$currentUser) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xóa sản phẩm.');
        }

        // Xóa tất cả sản phẩm khỏi giỏ hàng
        DB::table('giohang')
            ->where('MaKhachHang', $currentUser->MaKhachHang)
            ->delete();

        return redirect()->back()->with('success', 'Đã xóa tất cả sản phẩm khỏi giỏ hàng.');
    }
}
