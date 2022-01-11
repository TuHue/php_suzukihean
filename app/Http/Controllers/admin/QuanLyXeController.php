<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyXeController extends Controller
{
    //
    public function getDanhSachXe()
    {
        return view('admin.pages.Xe.DanhSachXe');
    }
}
