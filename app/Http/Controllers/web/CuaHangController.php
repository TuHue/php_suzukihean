<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuaHangController extends Controller
{
    //
    public function getCuaHang()
    {
        return view('web.pages.CuaHang.CuaHang');
    }
    public  function getOto()
    {
        return view('web.pages.CuaHang.Oto');
    }
    public function getXeTai()
    {
        return view('web.pages.CuaHang.XeTai');
    }
}
