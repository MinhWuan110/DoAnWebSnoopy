@extends('layouts.User')

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



@endsection
