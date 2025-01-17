<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeLuotMuaExport implements FromCollection, WithHeadings
{
    protected $data;

    // Constructor để nhận dữ liệu
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Trả về dữ liệu cho file Excel.
     */
    public function collection()
    {
        return collect($this->data);
    }

    /**
     * Định nghĩa các tiêu đề cột cho file Excel.
     */
    public function headings(): array
    {
        return [
            'Mã Sản Phẩm',
            'Tên Sản Phẩm',
             'Ngày',
            'Tổng Số Lượng Mua',
           
            // 'Tháng',
            // 'Năm',
        ];
    }
}
