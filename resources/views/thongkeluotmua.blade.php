@extends('layouts.Admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/thongkeluotmua.css') }}">

    <h1>Thống Kê Lượt Mua</h1>
    <div class="container ">
        <!-- Form để chọn tháng và năm -->
        <form method="GET" action="{{ route('thongkeluotmua.theo-thoi-gian') }}">
            @csrf
            <label for="month">Chọn tháng:</label>
            <select name="month" id="month">
                <option value="">Tất cả</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                        Tháng {{ $i }}
                    </option>
                @endfor
            </select>

            <label for="year">Chọn năm:</label>
            <select name="year" id="year">
                <option value="">Tất cả</option>
                @for ($i = 2020; $i <= 2025; $i++)
                    <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>
                        Năm {{ $i }}
                    </option>
                @endfor
            </select>

            <button type="submit">Xem Thống Kê</button>
            <a href="{{ route('thongke.export', ['month' => request('month'), 'year' => request('year')]) }}"
                class="btn btn-success">
                Xuất Excel
            </a>
        </form>

        <!-- Hiển thị biểu đồ nếu có dữ liệu -->
        {{-- <div style="width: 80%; margin: 0 auto; padding-top: 50px;">
            <canvas id="luotmuaChart"></canvas>
        </div> --}}

        <!-- Hiển thị bảng thống kê nếu có dữ liệu -->
        @if (isset($luotMua) && $luotMua->isNotEmpty())
            <h2>Danh Sách Sản Phẩm Bán Được</h2>
            <table>
                <thead>
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Lượt Mua </th>
                        <th>ngày</th>
                        {{-- <th>Tháng</th>
                        <th>Năm</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($luotMua as $item)
                        <tr>
                            <td>{{ $item->MaSanPham }}</td>
                            <td>{{ $item->TenSanPham }}</td>
                            <td>{{ $item->SoLuongMua }}</td>
                            <td>{{ $item->NgayMua }}</td>
                            {{-- <td>{{ $item->Thang }}</td> --}}
                            {{-- <td>{{ $item->Nam }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Không có dữ liệu thống kê trong khoảng thời gian này.</p>
        @endif
    </div>


@endsection
