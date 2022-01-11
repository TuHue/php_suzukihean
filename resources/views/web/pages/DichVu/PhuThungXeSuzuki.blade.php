@extends('web.layouts.master')
@section('content')
<div class="home-1" style="background-image: url('{{ URL::asset('web/img/background/banner.png') }}')"></div>
<div class="detail-1">
    <div class="container">
        <p>Dịch vụ > Dóng thùng xe tải</p>

    </div>
</div>
<div class="services">
    <div class="container">
        <div class="services__title">
            <h2>Phụ Tùng Xe SUZUKi</h2>
        </div>
        <div class="services__content">
            <div class="services__content--left">
                <div class="services__content--box">
                    <div class="services__content--box--title">
                        <h4 clas>hotline: 0386 252 168</h4>
                    </div>
                    <div class="services__content--box--content">
                        <p>Tư vấn bảo hành, bảo dưỡng</p>
                        <p>Tư vấn phụ tùng, phụ kiện chính hãng</p>
                        <p>Tư vấn đồng sơn, sửa chữa, đổi màu</p>
                        <p>Tư vấn thủ tục đền bù bảo hiểm ô tô</p>
                    </div>
                    <img src="{{ URL::asset('web/img/services/talk.png')}}" alt="" />
                </div>
            </div>
            <div class="services__content--right">
                <div class="services__content-header">
                    <a href="/dich-vu/bao-hanh-bao-duong" class="services__content-header--item ">
                        <img src="{{ URL::asset('web/img/logo/icondichvu1.png')}} " alt="" />
                        <p>BẢO DƯỠNG, BẢO HÀNH</p>
                    </a>
                    <a href="/dich-vu/sua-chua-xe-suzuki" class="services__content-header--item">
                        <img src="{{ URL::asset('web/img/logo/icondichvu2.png')}}" alt="" />
                        <p>SỬA CHỮA XE SUZUKI</p>
                    </a>
                    <a href="/dich-vu/dong-thung-xe-tai" class="services__content-header--item ">
                        <img src="{{ URL::asset('web/img/logo/icondichvu3.png')}}" alt=" " />
                        <p>ĐÓNG THÙNG XE TẢI</p>
                    </a>
                    <a href="/dich-vu/phu-thung-xe-suzuki"
                        class="services__content-header--item--active services__content-header--item ">
                        <img src="{{ URL::asset('web/img/logo/icondichvu4.png')}}" alt=" " />
                        <p>PHỤ TÙNG XE SUZUKI</p>
                    </a>
                </div>
                <div class="services__content--context">
                    <p>
                        Phụ tùng ô tô Suzuki chính hãng với chất lượng tốt nhất, option trang trí xe dành cho các dòng
                        xe: Suzuki Swift, Suzuki Vitara, Suzuki Ertiga,Ciaz và các xe tải Suzuki Pro, Truck, Van. Đại lý
                        cung cấp các phụ tùng thay thế, giá cạnh tranh, dịch vụ chăm sóc khách hàng uy tín chuyên
                        nghiệp. Quý khách hàng có nhu cầu mua phụ tùng ô tô và đồ chơi Suzuki liên hệ: 0386 252 168 để
                        đặt hàng. </p>
                        <img style="width: 100%; "src="{{ URL::asset('web/img/services/sevice1.png') }}" alt="">
                        <img style="width: 100%; margin-top: 10px "src="{{ URL::asset('web/img/services/sevice1.png') }}" alt="">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="detail-6 detail-6-news ">
    <div class="detail-6_cars ">
        @foreach ( $productXeTais as $productXeTai )
        <div class="detail-6_cars--item detail-6-news--item ">
            <img src=" {{ $productXeTai->image }}" alt=" " style="width: 100%; height: 200px"/>
            <div class="detail-6_cars--infor ">
                <h2>{{ $productXeTai->name }}</h2>
                <p>{{ number_format($productXeTai->price, 0, '', ',') }}</p>
                <div class="detail-6_cars--line"></div>

            </div>
            <div class="see-more ">
                <a href="/cua-hang/xe-tai/{{ $productXeTai->id }} ">Xem thêm</a>
            </div>
        </div>
        @endforeach
       

     
    </div>
</div> 
<div class="news-promotion">
    <div class="container">
        <div class="news-promotion__title">
            <h3>TIN TỨC KHUYẾN MÃI</h3>
        </div>
        <div class="news-promotion__list">
            @foreach ($news as $new)
            <div class="news-promotion__item">
                <div class="news-promotion__item--title">
                    <a href="/tin-tuc/chi-tiet-tin-tuc/{{ $new->id }}">
                        <h5>
                            {{ $new->name }}
                        </h5>
                    </a>
                </div>
                <div class="news-promotion__item--date">
                    <p>{{ $new->created_at }}</p>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</div>

@endsection()