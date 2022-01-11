<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\CuaHangController;
use App\Http\Controllers\web\DichVuController;
use App\Http\Controllers\web\TinTucController;
use App\Http\Controllers\web\KhuyenMaiController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\QuanLyXeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>' '],function(){
   
    Route::get('', function () {
        return redirect("/cua-hang");
    })->name('');

    Route::group(['prefix'=>'cua-hang'],function(){
        Route::get("/",[CuaHangController::class,'getCuaHang'])->name('web.CuaHang.getCuaHang');
        Route::get("/o-to/{id}",[CuaHangController::class,'getOto'])->name('web.CuaHang.getOto');
        Route::get("/xe-tai/{id}",[CuaHangController::class,'getXeTai'])->name('web.CuaHang.getXeTai');
    });

    Route::group(['prefix' => 'dich-vu'],function(){
        Route::get('/bao-hanh-bao-duong',[DichVuController::class,'getBaoHangBaoDuong'])->name('web.DichVu.getBaoHangBaoDuong');
        Route::get('/sua-chua-xe-suzuki',[DichVuController::class,'getSuaChuaXeSuzuki'])->name('web.DichVu.getSuaChuaXeSuzuki');
        Route::get('/dong-thung-xe-tai',[DichVuController::class,'getDongThungXeTai'])->name('web.DichVu.getDongThungXeTai');
        Route::get('/phu-thung-xe-suzuki',[DichVuController::class,'getPhuThungXeSuzuki'])->name('web.DichVu.getPhuThungXeSuzuki');
    });

    Route::group(['prefix' =>'tin-tuc'],function(){
        Route::get('/danh-sach-tin-tuc',[TinTucController::class,'getDanhSachTinTuc'])->name('web.TinTuc.getDanhSachTinTuc');
        Route::get('/chi-tiet-tin-tuc/{id}',[TinTucController::class,'getChiTietTinTuc'])->name('web.TinTuc.getChiTietTinTuc');
        Route::post('/binh-luan',[TinTucController::class,'postBinhLuan'])->name('web.TinTuc.postBinhLuan');
    
    });
    
    Route::group(['prefix' =>'khuyen-mai'],function(){
        Route::get('/danh-sach-khuyen-mai',[KhuyenMaiController::class,'getDanhSachKhuyenMai'])->name('web.KhuyenMai.getDanhSachKhuyenMai');
        Route::get('/chi-tiet-khuyen-mai',[KhuyenMaiController::class,'getChiTietKhuyenMai'])->name('web.TinTuc.getChiTietKhuyenMai');
    });
});

Route::group(['prefix' =>'cms'],function(){
    Route::group(['prefix' =>''],function(){
        Route::get('/dang-nhap',[MemberController::class,'getDangNhap'])->name('admin.Member.getDangNhap');
    });

    Route::group(['prefix' =>'quan-ly'],function(){
        Route::group(['prefix' =>'/xe'],function(){
            Route::get('/quan-ly-danh-sach-xe',[QuanLyXeController::class,'getDanhSachXe'])->name('admin.QuanLyXe.getDanhSachXe');
        });
    });
});

