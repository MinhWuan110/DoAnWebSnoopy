<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LienHeController extends Controller
{

    public function index()
    {
        $lienhes = DB::table('lienhe')->get(); // Lấy danh sách sản phẩm
        return view('quanlilienhe', compact('lienhes')); // Truyền dữ liệu đến view
    }


    // Phương thức chỉnh sửa bản liên hệ
    // public function edit($id)
    // {
    //     $lienHe = DB::table('lienhe')->where('id', $id)->first(); // Lấy bản liên hệ theo ID
    //     if (!$lienHe) {
    //         return redirect()->back()->with('error', 'Không tìm thấy bản liên hệ.');
    //     }
    //     return view('edit_lienhe', compact('lienHe')); // Truyền dữ liệu đến view để chỉnh sửa
    // }

    // Phương thức cập nhật bản liên hệ
    public function update(Request $request, $id)
    {
        $lienhes = DB::table('lienhe')->where('id', $id)->first(); // Tìm bản liên hệ theo ID

        if (!$lienhes) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy bản liên hệ!',
                'data' => [],
            ], 404);
        }

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'hoVaTen' => 'required|string|max:255',
            'email' => 'required|email',
            'sdt' => 'required|string|max:15',
            'noiDung' => 'required|string',
        ]);

        // Cập nhật thông tin liên hệ
        DB::table('lienhe')->where('id', $id)->update([
            'hoVaTen' => $request->hoVaTen,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'noiDung' => $request->noiDung,
        ]);

        return redirect()->route('quanlilienhe')->with('success', 'Cập nhật bản liên hệ thành công!');
    }

    // Phương thức xóa bản liên hệ
    public function destroy($id)
    {
        $lienHe = DB::table('lienhe')->where('id', $id)->first(); // Tìm bản liên hệ theo ID

        if (!$lienHe) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy bản liên hệ!',
                'data' => [],
            ], 404);
        }

        // Xóa bản ghi
        DB::table('lienhe')->where('id', $id)->delete();

        return redirect()->route('quanlilienhe')->with('success', 'Xóa bản liên hệ thành công!');
    }
}
