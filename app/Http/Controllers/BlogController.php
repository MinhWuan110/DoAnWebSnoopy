<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogPosts = [
            [
                'id' => 1,
                'tieu_de' => 'Sự phát triển của trí tuệ nhân tạo',
                'noi_dung' => 'Trí tuệ nhân tạo đang thay đổi cách chúng ta sống và làm việc...',
                'tac_gia' => 'Nguyễn Văn A',
                'ngay_dang' => '2024-11-29'
            ],
            [
                'id' => 2,
                'tieu_de' => 'Các xu hướng công nghệ năm 2025',
                'noi_dung' => 'Năm 2025 sẽ chứng kiến sự bùng nổ của các công nghệ...',
                'tac_gia' => 'Trần Thị B',
                'ngay_dang' => '2024-11-28'
            ],
            [
                'id' => 3,
                'tieu_de' => 'Tác động của ChatGPT trong lĩnh vực giáo dục',
                'noi_dung' => 'Công nghệ GPT đang hỗ trợ học sinh và giáo viên...',
                'tac_gia' => 'Lê Văn C',
                'ngay_dang' => '2024-11-27'
            ]
        ];

        return view('blog', ['blogPosts' => $blogPosts]);
    }
}
