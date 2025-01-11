@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/thongtintrangwebedit.css') }}">
    <div class="main-content">
        <form action="{{ route('thongtin.update') }}" method="POST">
            @csrf
            <div>
                <label for="tentrangweb">Tên trang web</label>
                <input type="text" name="tentrangweb" id="tentrangweb" value="{{ $thongTin->tentrangweb }}">
            </div>

            <div>
                <label for="hotline">Hotline</label>
                <input type="text" name="hotline" id="hotline" value="{{ $thongTin->hotline }}">
            </div>

            <div>
                <label for="goimua">Gọi mua</label>
                <input type="text" name="goimua" id="goimua" value="{{ $thongTin->goimua }}">
            </div>

            <div>
                <label for="khieunai">Khiếu nại</label>
                <input type="text" name="khieunai" id="khieunai" value="{{ $thongTin->khieunai }}">
            </div>

            <div>
                <label for="baohanh">Bảo hành</label>
                <input type="text" name="baohanh" id="baohanh" value="{{ $thongTin->baohanh }}">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $thongTin->email }}">
            </div>

            <div>
                <label for="diachi">Địa chỉ</label>
                <input type="text" name="diachi" id="diachi" value="{{ $thongTin->diachi }}">
            </div>

            <div>
                <label for="giolamviec">Giờ làm việc</label>
                <input type="text" name="giolamviec" id="giolamviec" value="{{ $thongTin->giolamviec }}">
            </div>

            <button type="submit">Cập nhật</button>
        </form>
    </div>
@endsection
