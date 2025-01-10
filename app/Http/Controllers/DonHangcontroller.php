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

    public function destroy($id)
    {
        $deleted = DB::table('donhang')->where('MaDonHang', $id)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Đơn hàng đã được xóa thành công.');
        }
        return redirect()->back()->with('error', 'Đơn hàng không tìm thấy.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
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
    

}
