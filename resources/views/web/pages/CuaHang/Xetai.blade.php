@extends('web.layouts.master')
@section('content')
<div class="home-1" style="background-image: url('{{ URL::asset('web/img/background/banner.png') }}')"></div>
<div class="detail-1">
    <div class="container">
        <p>Home > Cửa Hàng > Suzuki XL7</p>
    </div>
</div>
<div class="detail-2">
    <div class="container">
        <div class="detail-2__top">
            <div class="detail-2__top--name">
                <h3>Suzuki XL7</h3>
                <p>Sẵn sàng cho khởi đầu mới</p>
            </div>
            <div class="detail-2__top--price">
                <h4>589.900.000 đ</h4>
                <p>Giá niêm yết</p>
            </div>
        </div>
        <div class="detail-2__content">
            <div class="detail-2__content--detail">
                <img src="{{ URL::asset('web/img/carts/xam4.png') }}" alt="" />
                <p>Màu trắng</p>
            </div>
            <div class="detail-2__content--carts">
                <div class="detail-2__content--cart">
                    <img class="detail-2__content--img" src="{{ URL::asset('web/img/carts/transportVehicle6.png') }}" alt="" />
                </div>
                <div class="detail-2__content--cart">
                    <img src="{{ URL::asset('web/img/carts/transportVehicle6.png') }}" class="detail-2__content--img" alt="" />
                </div>
            </div>
            <div class="detail-2__content--logo">
                <div class="detail-2__logo">
                    <img src="{{ URL::asset('web/img/logo/Path.png') }}" alt="" />
                </div>
                <p>Báo Giá lăn Bánh</p>
            </div>
        </div>
    </div>
</div>
<div class="detail-3">
    <div class="container">
        <div class="detail-3__header">
            <h5>Thông Số kỹ THuật</h5>
            <div class="detail-3__header-actions">
                <div class="detail-3__header-actions--item detail-3__header-actions--item--red">
                    The All New XL7
                </div>
                <div class="detail-3__header-actions--item detail-3__header-actions--item--blue">
                    The All New XL7 (ghế da)
                </div>
            </div>
            <div class="detail-3__tag">
                <div class="tags">
                    <div class="tag--item">
                        <span class="tag--text tag--text--active">Kích thức - Tải trọng</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text">Động cơ - Hộp số</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text">Ngoại thất</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text">Tầm nhìn</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text">Tay lái - Bảng điều khiển</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text">Khung gầm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-3__content"></div>
    </div>
</div>
<div class="detail-4">
    <div class="container">
        <div class="detail-4__top">
            <div class="detail-4__title">
                <h4>chuyên chở chuyên nghiệp</h4>
            </div>
            <div class="detail-4__top--content">
                <div class="detail-4__top--content--left">
                    <img src="{{ URL::asset('web/img/carts/transportVehicle1.png') }}" alt="" />
                </div>
                <div class="detail-4__top--content--right">
                    <div class="detail-4__content">
                        <h2>
                            SUPER CARRY TRUCK - BẰNG CHỨNG CỦA SỰ TIN CẬY - XE TẢI NHẸ HÀNG ĐẦU
                        </h2>
                        <p>
                            Được khai sinh từ khai niệm "công cụ chuyên chở chuyên nghiệp", xe tải Suzuki Super Carry
                            được trang bị động cơ mạnh mẽ, hệ thống phun xăng điện tử đạt tiêu chuẩn khí thải EURO IV
                            giúp tiết kiệm nhiên liệu và bảo vệ môi trường.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-4__extra">
            <h1>super carry truck</h1>
            <h2>xe tải hàng nhẹ</h2>
            <h2>hàng đầu</h2>
        </div>
        <div class="detail-4__center">
            <div class="detail-4__center--item">
                <div class="detail-4__content">
                    <h2>
                        SUPER CARRY TRUCK - BẰNG CHỨNG CỦA SỰ TIN CẬY - XE TẢI NHẸ HÀNG ĐẦU
                    </h2>
                    <p>
                        Được khai sinh từ khai niệm "công cụ chuyên chở chuyên nghiệp", xe tải Suzuki Super Carry được
                        trang bị động cơ mạnh mẽ, hệ thống phun xăng điện tử đạt tiêu chuẩn khí thải EURO IV giúp tiết
                        kiệm nhiên liệu và bảo vệ môi trường.
                    </p>
                </div>
                <div class="detail-4__center--content--right">
                    <img src="{{ URL::asset('web/img/carts/detailcark.png') }}" alt="" />
                </div>
            </div>
            <div class="detail-4__center--item">
                <div class="detail-4__content">
                    <h2>
                        SUPER CARRY TRUCK - BẰNG CHỨNG CỦA SỰ TIN CẬY - XE TẢI NHẸ HÀNG ĐẦU
                    </h2>
                    <p>
                        Được khai sinh từ khai niệm "công cụ chuyên chở chuyên nghiệp", xe tải Suzuki Super Carry được
                        trang bị động cơ mạnh mẽ, hệ thống phun xăng điện tử đạt tiêu chuẩn khí thải EURO IV giúp tiết
                        kiệm nhiên liệu và bảo vệ môi trường.
                    </p>
                </div>
                <div class="detail-4__center--content--right">
                    <img src="{{ URL::asset('web/img/carts/detailcark.png') }}" alt="" />
                </div>
            </div>
            <div class="detail-4__center--item">
                <div class="detail-4__content">
                    <h2>
                        SUPER CARRY TRUCK - BẰNG CHỨNG CỦA SỰ TIN CẬY - XE TẢI NHẸ HÀNG ĐẦU
                    </h2>
                    <p>
                        Được khai sinh từ khai niệm "công cụ chuyên chở chuyên nghiệp", xe tải Suzuki Super Carry được
                        trang bị động cơ mạnh mẽ, hệ thống phun xăng điện tử đạt tiêu chuẩn khí thải EURO IV giúp tiết
                        kiệm nhiên liệu và bảo vệ môi trường.
                    </p>
                </div>
                <div class="detail-4__center--content--right">
                    <img src="{{ URL::asset('web/img/carts/detailcark.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="detail-4__bottom">
            <div class="detail-4__bottom--title">
                <h2>Mạnh mẽ</h2>
                <h2>An toàn</h2>
                <p>Super Carry Truck, dòng xe tải nhẹ tiết kiệm nhiên liệu và bảo vệ môi trường.</p>
            </div>
            <img src="{{ URL::asset('web/img/carts/transportVehicle8.png') }}" alt="">
        </div>
    </div>
</div>
<div class="detail-6">
    <div class="detail-6_cars">
        <div class="detail-6_cars--item">
            <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
            <div class="detail-6_cars--infor">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
        </div>
        <div class="detail-6_cars--item">
            <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
            <div class="detail-6_cars--infor">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
        </div>
        <div class="detail-6_cars--item">
            <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
            <div class="detail-6_cars--infor">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
        </div>
        <div class="detail-6_cars--item">
            <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
            <div class="detail-6_cars--infor">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="detail-6_cars detail-6_oto">
            <div class="detail-6_cars--item">
                <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
                <div class="detail-6_cars--infor">
                    <h2>SUZUKI SWIFT</h2>
                    <p>249.300.000 đ</p>
                </div>
            </div>
            <div class="detail-6_cars--item">
                <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
                <div class="detail-6_cars--infor">
                    <h2>SUZUKI SWIFT</h2>
                    <p>249.300.000 đ</p>
                </div>
            </div>
            <div class="detail-6_cars--item">
                <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
                <div class="detail-6_cars--infor">
                    <h2>SUZUKI SWIFT</h2>
                    <p>249.300.000 đ</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
@section('style')
<link rel="stylesheet" href="web/css/detail_xetai.css" />
@endsection