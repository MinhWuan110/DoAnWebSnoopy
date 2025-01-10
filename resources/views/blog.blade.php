{{-- @extends('layouts.User')

@section('title', 'blog')

@section('content')
    <html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    </head>

    <body>
        <div class="blog-container">
            @foreach ($blogPosts as $post)
                <div class="blog-post">
                    <div class="post-title">
                        <h2>{{ $post['tieu_de'] }}</h2>
                    </div>
                    <div class="post-meta">
                        <p><strong>Tác giả:</strong> {{ $post['tac_gia'] }}</p>
                        <p><strong>Ngày đăng:</strong> {{ $post['ngay_dang'] }}</p>
                    </div>
                    <div class="post-content">
                        <p>{{ $post['noi_dung'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </body>

    </html>



@endsection --}}


@extends('layouts.User')

@section('content')
    <div class="container">
        <h1>Danh sách bài viết</h1>
        <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

        <!-- Form tìm kiếm -->
        <form action="{{ route('blog.index') }}" method="GET">
            <input type="text" name="keyword" value="{{ old('keyword', $keyword ?? '') }}"
                placeholder="Tìm kiếm bài viết...">
            <button type="submit">Tìm kiếm</button>
        </form>

        <!-- Danh sách bài viết -->
        {{-- @forelse ($blogPosts as $post)
            <div>
                <h2><a href="{{ route('blog.show', $post['id']) }}">{{ $post['tieu_de'] }}</a></h2>
                <p>{{ \Illuminate\Support\Str::limit($post['noi_dung'], 100) }}</p>
                <p><strong>Tác giả:</strong> {{ $post['tac_gia'] }}</p>
                <p><strong>Ngày đăng:</strong> {{ $post['ngay_dang'] }}</p>
            </div>
        @empty
            <p>Không tìm thấy bài viết nào.</p>
        @endforelse --}}







        <!-- Hiển thị danh sách các bài viết -->
        <div class="blog-posts">
            @forelse ($blogPosts as $post)
                <div>
                    <h2><a href="{{ route('blog.show', ['id' => $post['id']]) }}">{{ $post['tieu_de'] }}</a></h2>
                    <p>{{ \Illuminate\Support\Str::limit($post['noi_dung'], 100) }}</p>
                    <p><strong>Tác giả:</strong> {{ $post['tac_gia'] }}</p>
                    <p><strong>Ngày đăng:</strong> {{ $post['ngay_dang'] }}</p>
                </div>
            @empty
                <p>Không tìm thấy bài viết nào.</p>
            @endforelse
        </div>



        <!-- Hiển thị liên kết phân trang -->
        <div class="pagination">
            {{ $blogPosts->links() }}
        </div>
    </div>
@endsection
