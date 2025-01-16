<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ThongKeDoanhThuExport implements FromView
{
    protected $thongKe;

    public function __construct($thongKe)
    {
        $this->thongKe = $thongKe;
    }

    public function view(): View
    {
        return view('thongke.doanhthuexcel', ['thongKe' => $this->thongKe]);
    }
}
