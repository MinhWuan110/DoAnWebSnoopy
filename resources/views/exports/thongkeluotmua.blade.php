<table>
    <thead>
        <tr>
            <th>Mã Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng Đã Bán</th>
            <th>Tháng</th>
            <th>Năm</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($luotMua as $item)
            <tr>
                <td>{{ $item->MaSanPham }}</td>
                <td>{{ $item->TenSanPham }}</td>
                <td>{{ $item->TongSoLuongMua }}</td>
                <td>{{ $item->Thang }}</td>
                <td>{{ $item->Nam }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
