@extends('layouts.admin')

@section('title', 'Quản lý Blog')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/danhsachblog.css') }}">
    <div class="container">
        <h1>Quản lý Blog</h1>
        {{-- <a href="{{ route('blog.create') }}" class="btn btn-primary">Tạo Blog mới</a> --}}
        <a href="/admin/blog/create" class="btn-create-blog">Tạo Blog</a>



        <!-- Hiển thị danh sách blog -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->tieu_de }}</td>
                        <td>{{ $blog->tac_gia }}</td>
                        <td>{{ $blog->ngay_dang }}</td>
                        <td>{{ $blog->status == 'published' ? 'Đã xuất bản' : 'Bản nháp' }}</td>
                        <td>
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </tbody>
        </table>
    </div>
@endsection
