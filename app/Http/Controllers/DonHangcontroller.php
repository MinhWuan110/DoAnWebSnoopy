<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    public function index()
    {
        $orders = DB::table('donhang')->get();
        return view('quanlidonhang', compact('orders'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $orders = DB::table('donhang')->where('MaDonHang', 'LIKE', "%{$query}%")->get();
        return view('quanlidonhang', compact('orders'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'MaDonHang' => 'required|string|max:10|unique:donhang,MaDonHang,' . $id . ',MaDonHang',
        'MaKhachHang' => 'required|string|max:10',
        'NgayDatHang' => 'required|date',
        'NgayGiaoHangDuKien' => 'nullable|date',
        'NgayGiaoHangThucTe' => 'nullable|date',
        'TrangThaiDonHang' => 'nullable|string|max:20',
        'TongTien' => 'nullable|integer',
        'Ma_PTVanChuyen' => 'nullable|string|max:10',
        'GhiChu' => 'nullable|string',
    ]);

    $data = $request->only([
        'MaDonHang',
        'MaKhachHang',
        'NgayDatHang',
        'NgayGiaoHangDuKien',
        'NgayGiaoHangThucTe',
        'TrangThaiDonHang',
        'TongTien',
        'Ma_PTVanChuyen',
        'GhiChu',
    ]);

    DB::table('donhang')->where('MaDonHang', $id)->update($data);

    return redirect()->route('quanlidonhang')->with('success', 'Đơn hàng đã được cập nhật thành công.');
}


    public function destroy($id)
    {
        DB::table('donhang')->where('MaDonHang', $id)->delete();

        return redirect()->route('quanlidonhang')->with('success', 'Đơn hàng đã được xóa thành công.');
    }
}
