@extends('web.layouts.master')
@section('content')
<div class="home-1" style="background-image: url('{{ URL::asset('web/img/background/banner.png') }}')"></div>
<div class="detail-1">
    <div class="container">
        <p>Home > Cửa Hàng > Suzuki XL7</p>
    </div>
</div>
<div class="services">
    <div class="container">
        <div class="services__title">
            <h2>Bảo Dưỡng, bảo hành</h2>
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
                    <a href="/dich-vu/dong-thung-xe-tai"
                        class="services__content-header--item services__content-header--item--active ">
                        <img src="{{ URL::asset('web/img/logo/icondichvu3.png')}}" alt=" " />
                        <p>ĐÓNG THÙNG XE TẢI</p>
                    </a>
                    <a href="/dich-vu/phu-thung-xe-suzuki" class="services__content-header--item ">
                        <img src="{{ URL::asset('web/img/logo/icondichvu4.png')}}" alt=" " />
                        <p>PHỤ TÙNG XE SUZUKI</p>
                    </a>
                </div>
                <div class="services__content--context">
                    <div class="tags">
                        <div class="tag--item">
                            <span class="tag--text tag--text--active">Tất cả</span>
                            <span class="tag--line">|</span>
                        </div>
                        <div class="tag--item">
                            <span class="tag--text">Super Carry Pro</span>
                            <span class="tag--line">|</span>
                        </div>
                        <div class="tag--item">
                            <span class="tag--text">Carry Truck</span>
                        </div>
                    </div>
                    <div class="services__content--cars">
                        <div class="services__content--cars--item">
                            <img src="web/img/carts/transportVehicle6.png" alt="" />
                            <div class="services__content--cars--item--title">
                                <h3>Carry Pro thùng mui bạt</h3>
                            </div>
                            <div class="seemore-car">
                                <p>
                                    Super Carry Pro 2021 thùng mui bạt màu xanh đạt chuẩn chất lượng cao. Đóng thùng
                                    theo tiêu chuẩn của Cục Đăng kiểm Việt Nam.
                                </p>
                                <div class="seemore-car--row">
                                    <p>- Kích thước (dài x rộng x cao): 2.670 x 1.660 x 1.800 (mm) - Tiêu chuẩn chất
                                        lượng an toàn kỹ thuật và bảo vệ môi trường ô tô sản xuất lắp ráp của xe ô tô
                                        tải của Cục đăng kiểm VN.</p>
                                    <img src="web/img/carts/transportVehicle8.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="services__content--cars--item">
                            <img src="web/img/carts/transportVehicle6.png" alt="" />
                            <div class="services__content--cars--item--title">
                                <h3>Carry Pro thùng mui bạt</h3>
                            </div>
                        </div>
                        <div class="services__content--cars--item">
                            <img src="web/img/carts/transportVehicle6.png" alt="" />
                            <div class="services__content--cars--item--title">
                                <h3>Carry Pro thùng mui bạt</h3>
                            </div>
                        </div>
                        <div class="services__content--cars--item">
                            <img src="web/img/carts/transportVehicle6.png" alt="" />
                            <div class="services__content--cars--item--title">
                                <h3>Carry Pro thùng mui bạt</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="detail-6 detail-6-news ">
    <div class="detail-6_cars ">
        <div class="detail-6_cars--item detail-6-news--item ">
            <img src=" {{ URL::asset('web/img/carts/car1.png')}}" alt=" " />
            <div class="detail-6_cars--infor ">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
            <div class="see-more ">
                <a href=" ">Xem thêm</a>
            </div>
        </div>

        <div class="detail-6_cars--item detail-6-news--item ">
            <img src="{{ URL::asset('web/img/carts/car1.png')}}" alt=" " />
            <div class="detail-6_cars--infor ">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
            <div class="see-more ">
                <a href=" ">Xem thêm</a>
            </div>
        </div>

        <div class="detail-6_cars--item detail-6-news--item ">
            <img src="{{ URL::asset('web/img/carts/car1.png')}}" alt=" " />
            <div class="detail-6_cars--infor ">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
            <div class="see-more ">
                <a href=" ">Xem thêm</a>
            </div>
        </div>

        <div class="detail-6_cars--item detail-6-news--item ">
            <img src="{{ URL::asset('web/img/carts/car1.png')}}" alt=" " />
            <div class="detail-6_cars--infor ">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
            <div class="see-more ">
                <a href=" ">Xem thêm</a>
            </div>
        </div>
    </div>
</div>
<div class="news-promotion">
    <div class="container">
        <div class="news-promotion__title">
            <h3>TIN TỨC KHUYẾN MÃI</h3>
        </div>
        <div class="news-promotion__list">
            <div class="news-promotion__item">
                <div class="news-promotion__item--title">
                    <a href="">
                        <h5>MẪU XE ĐEP NHẤT NĂM 2020 MẪU XE ĐEP NHẤT NĂM 2020 MẪU XE ĐEP</h5>
                    </a>
                </div>
                <div class="news-promotion__item--date">
                    <p>14-12-2021 07:01</p>
                </div>
            </div>
            <div class="news-promotion__item">
                <div class="news-promotion__item--title">
                    <a href="">
                        <h5>MẪU XE ĐEP NHẤT NĂM 2020 MẪU XE ĐEP NHẤT NĂM 2020 MẪU XE ĐEP</h5>
                    </a>
                </div>
                <div class="news-promotion__item--date">
                    <p>14-12-2021 07:01</p>
                </div>
            </div>
            <div class="news-promotion__item">
                <div class="news-promotion__item--title">
                    <a href="">
                        <h5>MẪU XE ĐEP NHẤT NĂM 2020 MẪU XE ĐEP NHẤT NĂM 2020 MẪU XE ĐEP</h5>
                    </a>
                </div>
                <div class="news-promotion__item--date">
                    <p>14-12-2021 07:01</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
@section('style')
<link rel="stylesheet" href="{{ URL::to('assets/css/news.css') }}" />
<link rel="stylesheet" href="{{ URL::to('assets/css/services_xetail.css') }}" />
@endsection