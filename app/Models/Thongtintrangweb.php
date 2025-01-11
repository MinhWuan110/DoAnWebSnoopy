<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinTrangWeb extends Model
{
    use HasFactory;

    // Chỉ định tên bảng
    protected $table = 'thongtintrangweb';

    // Chỉ định các cột có thể gán
    protected $fillable = ['tentrangweb', 'hotline', 'goimua', 'khieunai', 'baohanh', 'email', 'diachi', 'giolamviec'];
}
