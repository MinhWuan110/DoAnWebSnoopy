<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost; // Đảm bảo thêm dòng này để import model BlogPost
use App\Models\Blog;
use Carbon\Carbon;  // Đảm bảo đã import Carbon
class BlogController extends Controller
{
  

// public function index(Request $request)
// {
//     $keyword = $request->input('keyword', '');

//     // Tạo query cơ bản cho BlogPost
//     $query = BlogPost::query();

//     if ($keyword) {
//         // Tìm kiếm theo tiêu đề và nội dung
//         $query->where('tieu_de', 'like', '%' . $keyword . '%')
//               ->orWhere('noi_dung', 'like', '%' . $keyword . '%')
//               // Thêm điều kiện với bảng 'sanpham' dựa vào MaSanPham và TenSanPham
//               ->orWhereHas('sanpham', function ($query) use ($keyword) {
//                   $query->where('MaSanPham', '=', \DB::raw('blog.MaSanPham'))
//                         ->where('TenSanPham', 'like', '%' . $keyword . '%');
//               });
//     }

//     // Số lượng bài viết trên mỗi trang
//     $perPage = 5;
//     // Lấy danh sách blog post phân trang
//     $blogPosts = $query->paginate($perPage);

//     // Trả về view với dữ liệu
//     return view('blog', ['blogPosts' => $blogPosts, 'keyword' => $keyword]);
// }
public function index(Request $request)
{
    $keyword = $request->input('keyword', '');

    // Tạo query cơ bản cho BlogPost
    $query = BlogPost::query();

    if ($keyword) {
        // Thực hiện join với bảng sanpham và thêm điều kiện tìm kiếm theo keyword
        $query->leftJoin('sanpham', 'blog.MaSanPham', '=', 'sanpham.MaSanPham')
              ->where('tieu_de', 'like', '%' . $keyword . '%')
              ->orWhere('noi_dung', 'like', '%' . $keyword . '%')
              ->orWhere('sanpham.TenSanPham', 'like', '%' . $keyword . '%');
    }

    // Số lượng bài viết trên mỗi trang
    $perPage = 5;
    // Lấy danh sách blog post phân trang và giữ lại từ khóa tìm kiếm trong URL
    $blogPosts = $query->select('blog.*')->paginate($perPage)->appends(['keyword' => $keyword]);

    // Trả về view với dữ liệu
    return view('blog', ['blogPosts' => $blogPosts, 'keyword' => $keyword]);
}




    public function show($id)
    {
        
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

        return redirect()->route('blogs.quanliblog', $id)->with('success', 'Cập nhật blog thành công!');
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




    


    



