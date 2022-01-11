<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    //
    public function getBaoHangBaoDuong()
    {
        return view('web.pages.DichVu.BaoHangBaoDuong');
    }

    public function getDongThungXeTai()
    {
        return view('web.pages.DichVu.DongThungXeTai');
    }

    public function getPhuThungXeSuzuki()
    {
        return view('web.pages.DichVu.PhuThungXeSuzuki');
    }

    public function getSuaChuaXeSuzuki()
    {
        return view('web.pages.DichVu.SuaChuaXeSuzuki');
    }
}
