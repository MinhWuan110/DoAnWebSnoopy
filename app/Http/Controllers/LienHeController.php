<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LienHeController extends Controller
{
    public function index()
    {
        return view('lienhe');
    }

    public function store(Request $request)
    {
        $request->validate([
            'HoVaTen' => 'required',
            'email' => 'required|email',
            'sdt' => 'required',
            'noiDung' => 'required',
        ]);
        try {
            DB::table('lienhe')->insert([
                'HoVaTen' => $request->HoVaTen,
                'email' => $request->email,
                'sdt' => $request->sdt,
                'noiDung' => $request->noiDung,
                'thoigian' => now(),
                'TrangThai' => 1,
            ]);
            return redirect()->route('lienhe.index')->with('success', 'Thông tin liên hệ đã được gửi.');
        } catch (\Exception $e) {
            // response()->json([
            //     'success' => false,
            //     'message' => 'Lỗi: ' . $e->getMessage()
            // ], 500);
            return redirect()->route('lienhe.index')->with('error', 'Thông tin liên hệ không gửi được!');
        }
    }
}
