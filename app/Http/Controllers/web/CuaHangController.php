<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\common\Product;
use App\Models\common\ProductCategory;
use App\Models\common\Feedback;
use Illuminate\Http\Request;

class CuaHangController extends Controller
{
    //
    public function getCuaHang()
    {
        $products = Product::select()->get();
        $feedbacks = Feedback::select()->where('status', '=',1)->orderBy('id', 'desc')->take(4)->get();
        return view('web.pages.CuaHang.CuaHang',compact('products','feedbacks'));
    }
    public  function getOto($id)
    {
        $product = Product::findOrFail($id);
        $productOtos = Product::select()->where('category_id','=',90)->take(3)->get();
        $productXeTais = Product::select()->where('category_id','=',91)->take(4)->get();
        return view('web.pages.CuaHang.Oto',compact('product','productOtos','productXeTais'));
    }
    public function getXeTai($id)
    {
        $product = Product::findOrFail($id);
        $productOtos = Product::select()->where('category_id','=',90)->take(3)->get();
        $productXeTais = Product::select()->where('category_id','=',91)->take(4)->get();
        return view('web.pages.CuaHang.XeTai',compact('product','productOtos','productXeTais'));
    }
}
