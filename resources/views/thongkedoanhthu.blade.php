@extends('layouts.admin')

@section('content')
    <!-- resources/views/thongke/index.blade.php -->

    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <!-- Thêm Chart.js từ CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Thêm Chart.js từ CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="{{ asset('css/thongke.css') }}">
    </head>

    <body class="content ">

        <div style="width: 80%; margin: 0 auto; padding-top: 50px;">
            <canvas id="doanhThuChart"></canvas>
        </div>

        <script>
            var ctx = document.getElementById('doanhThuChart').getContext('2d');

            // Lấy dữ liệu từ controller
            var labels = @json($thongkeData->pluck('Ngay'));
            var data = @json($thongkeData->pluck('TongDoanhThu'));

            // Cấu hình và hiển thị biểu đồ
            var doanhThuChart = new Chart(ctx, {
                type: 'line', // Loại biểu đồ: line chart
                data: {
                    labels: labels, // Các ngày
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
                                text: 'Ngày'
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
        </script>

    </body>

    </html>
@endsection
