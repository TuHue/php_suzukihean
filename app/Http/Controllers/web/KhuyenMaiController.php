<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    //
    public function getDanhSachKhuyenMai()
    {
        return view('web.pages.KhuyenMai.DanhSachKhuyenMai');
    }

    public function getChiTietKhuyenMai()
    {
        return view('web.papes.KhuyenMai.ChiTietKhuyenMai');
    }
}
