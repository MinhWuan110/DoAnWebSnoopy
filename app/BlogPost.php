<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_posts'; // Tên bảng (nếu bảng của bạn khác tên mặc định)

    protected $fillable = [
        'tieu_de', 'noi_dung', 'tac_gia', 'ngay_dang',
    ];
}
