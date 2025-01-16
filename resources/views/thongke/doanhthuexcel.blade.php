<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Thống Kê Doanh Thu</h1>
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
</body>

</html>
