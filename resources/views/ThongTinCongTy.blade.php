@extends('layouts.User')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" href="{{ asset('css/ThongTinCongty.css') }}">
    </head>

    <body>
        <div class="section">
            <div class="section-title">Địa chỉ</div>
            <div class="section-content">
                <p>{{ $companyInfo->DiaChi ?? 'Thông tin địa chỉ chưa có' }}</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Thông tin về công ty</div>
            <div class="section-content">
                <p>{{ $companyInfo->GioiThieu ?? 'Thông tin giới thiệu chưa có' }}</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Các chính sách của công ty</div>
            <div class="section-content">
                <p>{!! nl2br(e($companyInfo->ChinhSachCongTy ?? 'Không có thông tin chính sách.')) !!}</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Lĩnh vực chính</div>
            <div class="section-content">
                <p>{!! nl2br(e($companyInfo->LinhVuc ?? 'Không có thông tin lĩnh vực.')) !!}</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Chăm sóc khách hàng</div>
            <div class="section-content">
                <p>{!! nl2br(e($companyInfo->ChamSocKhachHang ?? 'Không có thông tin chăm sóc khách hàng.')) !!}</p>
            </div>
        </div>
    </body>

    </html>
@endsection
