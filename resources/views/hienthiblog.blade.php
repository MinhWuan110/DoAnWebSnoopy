@extends('layouts.User') <!-- Kế thừa layout chung của trang -->
<!-- resources/views/blog/show.blade.php -->

@section('content')
    <div class="container">
        <link rel="stylesheet" href="{{ asset('css/hienthiblog.css') }}">
        <h1>{{ $blogPost->tieu_de }}</h1> <!-- Hiển thị tiêu đề bài viết -->
        <p><strong>Tác giả:</strong> {{ $blogPost->tac_gia }}</p> <!-- Hiển thị tác giả -->
        <p><strong>Ngày đăng:</strong> {{ \Carbon\Carbon::parse($blogPost->ngay_dang)->format('d/m/Y') }}</p>
        <!-- Hiển thị ngày đăng -->
        <div>
            <p>{{ $blogPost->noi_dung }}</p> <!-- Hiển thị nội dung bài viết -->
        </div>
        <a href="{{ route('blog.index') }}" class="btn btn-primary">Quay lại danh sách bài viết</a>
        <!-- Nút quay lại danh sách bài viết -->
    </div>
@endsection


<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
