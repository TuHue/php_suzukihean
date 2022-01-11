<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    //
    public function getDanhSachTinTuc()
    {
        return view('web.pages.TinTuc.DanhSachTinTuc');
    }

    public function getChiTietTinTuc()
    {
        return view('web.pages.TinTuc.ChiTietTinTuc');
    }
}
