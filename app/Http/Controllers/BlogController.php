<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost; // Đảm bảo thêm dòng này để import model BlogPost

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword', '');

        // Lọc bài viết theo từ khóa nếu có
        $query = BlogPost::query();

        if ($keyword) {
            $query->where('tieu_de', 'like', '%' . $keyword . '%')
                  ->orWhere('noi_dung', 'like', '%' . $keyword . '%');
        }

        // Phân trang dữ liệu
        $perPage = 5; // Số bài viết trên mỗi trang
        $blogPosts = $query->paginate($perPage);

        // Trả về view với bài viết và từ khóa tìm kiếm
        return view('blog', ['blogPosts' => $blogPosts, 'keyword' => $keyword]);
    }

    public function show($id)
    {
        // Lấy bài viết theo ID từ cơ sở dữ liệu
        $blogPost = BlogPost::find($id);

        if (!$blogPost) {
            return redirect()->route('blog.index')->with('error', 'Bài viết không tồn tại!');
        }

        // Trả về view với bài viết chi tiết
        return view('hienthiblog', compact('blogPost'));
    }
}
