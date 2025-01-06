<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost; // Đảm bảo thêm dòng này để import model BlogPost
use App\Models\Blog;
use Carbon\Carbon;  // Đảm bảo đã import Carbon
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



    public function edit($id)
    {
        $blog = Blog::findOrFail($id);  // Lấy blog theo ID
        return view('blog.edit', compact('blog'));  // Trả về view với dữ liệu blog
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->tieu_de = $request->input('tieu_de');
        $blog->noi_dung = $request->input('noi_dung');
        $blog->tac_gia = $request->input('tac_gia');

         // Cập nhật ngày đăng thành ngày hiện tại
    $blog->ngay_dang = Carbon::now();  // Sử dụng Carbon để lấy thời gian hiện tại

        $blog->save();

        return redirect()->route('blog.edit', $id)->with('success', 'Cập nhật blog thành công!');
    }
    
       public function quanliblog()
    {
        // Lấy tất cả các blog từ cơ sở dữ liệu
        $blogs = Blog::all();  // Đảm bảo biến $blogs được khởi tạo

        // Trả về view và truyền dữ liệu $blogs vào view
        return view('blog.quanliblog', compact('blogs')); // Sử dụng compact('blogs') để truyền biến vào view
    }

    // Phương thức để hiển thị form tạo blog mới
  public function create()
    {
        return view('blog.create');  // Trả về view 'blog.create'
    }

     public function destroy($id)
    {
        // Tìm blog theo ID và xóa
        $blog = Blog::findOrFail($id);
        $blog->delete();

        // Chuyển hướng về trang danh sách blog với thông báo
        return redirect()->route('blogs.quanliblog')->with('success', 'Blog đã được xóa thành công.');
    }

    public function store(Request $request)
{
    // Xác thực dữ liệu nhập vào
    $request->validate([
        'tieu_de' => 'required|string|max:255',
        'noi_dung' => 'required',
        'tac_gia' => 'required|string|max:255',
    ]);

    // Tạo blog mới và lưu vào cơ sở dữ liệu
    Blog::create([
        'tieu_de' => $request->tieu_de,
        'noi_dung' => $request->noi_dung,
        'tac_gia' => $request->tac_gia,
        'ngay_dang' => now(),  // Ngày đăng là hiện tại
        'status' => 'draft',    // Trạng thái mặc định là bản nháp
    ]);

    // Sau khi lưu xong, chuyển hướng đến trang quản lý blog
    return redirect()->route('blogs.quanliblog')->with('success', 'Blog đã được tạo thành công!');
}


}




    



//         $blog = Blog::find($id);
// if (!$blog) {
//     return redirect()->route('blog.index')->with('error', 'Blog không tồn tại');
// }




    


    



