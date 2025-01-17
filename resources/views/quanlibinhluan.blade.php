@extends('layouts.admin')

@section('title', 'Quản Lý Bình Luận')

@section('content')
<link rel="stylesheet" href="{{ asset('css/QLBinhLuan.css') }}">
<div class="container">
    <div class="search-section">
        <h2>Tìm Kiếm Bình Luận</h2>
        <form class="search-form">
            <label for="customer-id">Tìm Kiếm Bình Luận Qua Mã Khách Hàng</label>
            <input type="text" id="customer-id" placeholder="Nhập mã khách hàng" />
            <button type="button" class="filter-button">Hiển Thị Tất Cả</button>
            <div class="date-section">
                <label for="date">Nhập Giới Giới Hạn Ngày Giờ</label>
                <input type="datetime-local" id="date" />
                <span class="current-date">Jun 10, 2024 9:41 AM</span>
            </div>
        </form>
    </div>

    <div class="comment-section">
        <h2>Danh Sách Các Bình Luận</h2>
        <table>
            <thead>
                <tr>
                    <th>Mã Khách Hàng</th>
                    <th>Email</th>
                    <th>Nội Dung Bình Luận</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->user_id }}</td>
                    <td>{{ $comment->TenDangNhap }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>
                        <form action="{{ route('destroy.comments', $comment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?');">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection