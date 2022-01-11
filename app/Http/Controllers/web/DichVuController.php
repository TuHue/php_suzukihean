<?php

namespace App\Http\Controllers\web;

use App\Models\common\Product;
use App\Models\common\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    //
    public function getBaoHangBaoDuong()
    {
        $productXeTais = Product::select()->take(4)->get();
        $news = News::select()->get();
        return view('web.pages.DichVu.BaoHangBaoDuong', compact(['productXeTais', 'news']));
    }

    public function getDongThungXeTai()
    {
        $products = Product::select()->where('category_id', '=', 91)->get();
        $productXeTais = Product::select()->take(4)->get();
        $news = News::select()->get();

        return view('web.pages.DichVu.DongThungXeTai', compact(['products', 'productXeTais','news']));
    }

    public function getPhuThungXeSuzuki()
    {
        $news = News::select()->get();
        $productXeTais = Product::select()->take(4)->get();
        return view('web.pages.DichVu.PhuThungXeSuzuki', compact(['news', 'productXeTais']));
    }

    public function getSuaChuaXeSuzuki()
    {
        $news = News::select()->get();
        $productXeTais = Product::select()->take(4)->get();

        return view('web.pages.DichVu.SuaChuaXeSuzuki', compact(['news', 'productXeTais']));
    }
}
