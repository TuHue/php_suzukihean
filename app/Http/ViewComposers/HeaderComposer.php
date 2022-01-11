<?php

namespace App\Http\ViewComposers;

use App\Models\common\Product;
use Illuminate\View\View;

class HeaderComposer
{
    public function __construct()
    {
    }
    public function compose(View $view)
    {
        $productOto = Product::select()->where('category_id','=',90)->take(3)->get();
        $productXeTai = Product::select()->where('category_id','=',91)->take(4)->get();

        $view->with('danhsachOto', $productOto)->with('danhsachXeTai',$productXeTai);
    }
}
