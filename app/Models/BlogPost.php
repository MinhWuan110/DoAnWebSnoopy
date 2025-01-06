<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    // Tên bảng (nếu không phải tên mặc định là blog_posts)
    protected $table = 'blog';

    // Các cột được phép điền dữ liệu
    protected $fillable = [
        'tieu_de', 'noi_dung', 'tac_gia', 'ngay_dang',
    ];
}
