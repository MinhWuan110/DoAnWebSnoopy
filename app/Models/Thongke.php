<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongKe extends Model
{
    use HasFactory;

    // Tên bảng
    protected $table = 'thongke';

    // Các trường có thể gán giá trị
    protected $fillable = ['Ngay', 'TongDoanhThu'];

    // Khóa chính
    protected $primaryKey = 'MaThongKe';

    // Tắt timestamps nếu không cần
    public $timestamps = false;
}
