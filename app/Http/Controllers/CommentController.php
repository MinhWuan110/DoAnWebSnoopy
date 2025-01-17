<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {

        $comments = DB::table('comments')
            ->join('taikhoan', 'comments.user_id', '=', 'taikhoan.MaTaiKhoan')
            ->select('comments.*', 'taikhoan.TenDangNhap')
            ->get();
        return view('quanlibinhluan', compact('comments'));
    }

    public function destroy($id)
    {
        // Xóa bình luận
        $deleted = DB::table('comments')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Bình luận đã được xóa thành công.');
        }
        return redirect()->back()->with('error', 'Bình luận không tìm thấy.');
    }
}
