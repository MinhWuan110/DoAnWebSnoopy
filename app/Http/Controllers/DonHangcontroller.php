<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    public function index()
    {
        $donHangs = DB::table('donhang')->get();
        return view('quanlidonhang', compact('donHangs'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $donHangs = DB::table('donhang')->where('MaDonHang', 'LIKE', "%{$query}%")->get();
        return view('quanlidonhang', compact('donHangs'));
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

    DB::table('donhang')->where('MaDonHang', $id)->update([
        'MaDonHang' => $request->input('MaDonHang'),
        'MaKhachHang' => $request->input('MaKhachHang'),
        'NgayDatHang' => $request->input('NgayDatHang'),
        'NgayGiaoHangDuKien' => $request->input('NgayGiaoHangDuKien'),
        'NgayGiaoHangThucTe' => $request->input('NgayGiaoHangThucTe'),
        'TrangThaiDonHang' => $request->input('TrangThaiDonHang'),
        'TongTien' => $request->input('TongTien'),
        'Ma_PTVanChuyen' => $request->input('Ma_PTVanChuyen'),
        'GhiChu' => $request->input('GhiChu'),
    ]);

    return redirect()->route('quanlidonhang')->with('success', 'Đơn hàng đã được cập nhật thành công.');
}

public function destroy($id)
{
    DB::table('donhang')->where('MaDonHang', $id)->delete();

    return redirect()->route('quanlidonhang')->with('success', 'Đơn hàng đã được xóa thành công.');
}

}
