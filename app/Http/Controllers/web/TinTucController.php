<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\common\News;
use App\Models\common\Product;
use App\Models\common\Feedback;

use Illuminate\Http\Request;

class TinTucController extends Controller
{
    //
    public function getDanhSachTinTuc()
    {
        return view('web.pages.TinTuc.DanhSachTinTuc');
    }

    public function getChiTietTinTuc($id)
    {
        $news = News::findOrFail($id);
        $productXeTais = Product::select()->take(4)->get();
        return view('web.pages.TinTuc.ChiTietTinTuc',compact('news','productXeTais'));
    }
    public function postBinhLuan(Request $request){
        dd($request->textarea_noidung);
    }
}
