@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/thongkedoanhthu.css') }}">

    <h1>Thống Kê Doanh Thu</h1>
    <div class="container">
        <!-- Form để chọn tháng và năm -->
        <form method="GET" action="{{ route('thongke.doanhthu') }}">
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
            <!-- Nút xuất Excel -->
            {{-- <a href="{{ route('thongke.doanhthu', ['month' => request('month'), 'year' => request('year')]) }}"
                class="btn btn-success">
                Xuất Excel
            </a> --}}
            <a href="{{ route('thongke.doanhthu.export', ['month' => request('month'), 'year' => request('year')]) }}"
                class="btn btn-success">
                Xuất Excel
            </a>

        </form>


        @if ($thongKe->isNotEmpty())
            <h2>Danh Sách Sản Phẩm Bán Được</h2>
            <table>
                <thead>
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Tổng Doanh Thu</th>
                        <th>Tháng</th>
                        <th>Năm</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($thongKe as $item)
                        <tr>
                            <td>{{ $item->MaSanPham }}</td>
                            <td>{{ $item->TenSanPham }}</td>
                            <td>{{ number_format($item->TongDoanhThu, 0, ',', '.') }} VND</td>
                            <td>{{ $item->Thang }}</td>
                            <td>{{ $item->Nam }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Không có dữ liệu thống kê trong khoảng thời gian này.</p>
        @endif
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('doanhThuChart').getContext('2d');

        // Lấy dữ liệu từ controller
        var labels = @json($thongKe->pluck('Thang'));
        var data = @json($thongKe->pluck('TongDoanhThu'));

        // Cấu hình và hiển thị biểu đồ
        var doanhThuChart = new Chart(ctx, {
            type: 'line', // Loại biểu đồ: line chart
            data: {
                labels: labels, // Các tháng
                datasets: [{
                    label: 'Biểu Đồ Doanh Thu',
                    data: data, // Doanh thu tương ứng
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false, // Không tô màu dưới đường
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tháng'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Tổng Doanh Thu'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}
@endsection
