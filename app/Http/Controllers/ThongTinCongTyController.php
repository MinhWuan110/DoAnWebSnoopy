<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ThongTinCongTyController extends Controller
{
    public function index()
    {
        $companyInfo = DB::table('ThongTinCongTy')->first();


        return view('ThongTinCongTy', compact('companyInfo'));
    }
}
