<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeDoanhThuExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // Trả về dữ liệu
    public function collection()
    {
        return collect($this->data);
    }

    // Trả về header
    public function headings(): array
    {
        return [
            'Mã Sản Phẩm',  // Cột 1
            'Tên Sản Phẩm', // Cột 2
            'Tổng Doanh Thu', // Cột 3
            'Ngày',
            'Tháng',        // Cột 4
            'Năm',          // Cột 5
        ];
    }
}
