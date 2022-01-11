<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ô tô</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ URL::to('web/css/base.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('web/css/home.css') }} " />
    <link rel="stylesheet" href="{{ URL::to('web/css/detail.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('web/css/detail_xetai.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('web/css/responsive.css') }} " />
    <link rel="stylesheet" href="{{ URL::to('assets/css/news.css') }} " />
    <link rel="stylesheet" href="{{ URL::to('assets/css/services_xetail.css') }}" />
    @yield('style')
</head>

<body>
    <div class="wrapper">
        <header class="header padding-1">
            <div class="header-nav">
                <nav class="header-nav__list">
                    <li class="header-nav__item header-nav__item--shop">
                        <a href="/cua-hang">cửa hàng
                            <i class="fas fa-chevron-right"></i>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="header-nav-item__car">
                            <div class="header-nav-item__cars">
                                <h5>Xe du lịch</h5>
                                <div class="header-nav-item__cars--list">
                                    <div class="header-nav-item__cars--item">
                                        <img src="web/img/carts/swift1.png" alt="" />
                                        <p>Suzuki XL7</p>
                                    </div>
                                    <div class="header-nav-item__cars--item">
                                        <img src="web/img/carts/slice-car1.png" alt="" />
                                        <p>Suzuki XL7</p>
                                    </div>
                                    <div class="header-nav-item__cars--item">
                                        <img src="web/img/carts/enriga1.png" alt="" />
                                        <p>Suzuki XL7</p>
                                    </div>
                                    <div class="header-nav-item__cars--item">
                                        <img src="web/img/carts/ciaz1.png" alt="" />
                                        <p>Suzuki XL7</p>
                                    </div>
                                </div>
                            </div>
                            <div class="header-nav-item__cars">
                                <h5>Xe du lịch</h5>
                                <div class="header-nav-item__cars--list">
                                    <div class="header-nav-item__cars--item">
                                        <img src="web/img/carts/transportVehicle7.png" alt="" />
                                        <p>Suzuki XL7</p>
                                    </div>
                                    <div class="header-nav-item__cars--item">
                                        <img src="web/img/carts/transportVehicle8.png" alt="" />
                                        <p>Suzuki XL7</p>
                                    </div>
                                    <div class="header-nav-item__cars--item">
                                        <img src="web/img/carts/transportVehicle6.png" alt="" />
                                        <p>Suzuki XL7</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="header-nav__item"><a href="news.html">tin tức</a></li>
                    <li class="header-nav__item"><a href="">khuyến mãi</a></li>
                    <li class="header-nav__item"><a href="/dich-vu/bao-hanh-bao-duong">dịch vụ</a></li>
                </nav>
            </div>
            <div class="header-logo">
                <div class="header-logo__img">
                    <img src="web/img/logo/suzuki-logo.png" alt="" />
                </div>
            </div>
            <div class="header-infor">
                <p class="header-infor__contact">
                    Liên hệ: <strong>0963 998 456</strong>
                </p>
                <div class="header-infor__logo">
                    <span>SUZUKi Vinh</span><img src="{{ URL::asset('web/img/logo/Rectangle 4.png') }}" alt="" />
                </div>
            </div>
        </header>
        <header class="header-mini">
            <div class="header-mini__logo">
                <div class="header-mini__logo--img">
                    <img src="web/img/logo/suzuki-logo.png" alt="" />
                    <div class="header-mini__logo--icon">
                        <button class="btn" id="btn--fa-bars">
                            <i class="fas fa-bars"></i>
                        </button>
                        <button class="btn" id="btn--fa-times">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="header-mini__nav" id="header-mini__nav">
                <li class="header-mini__nav--item"><a href="index.html">Cửa hàng</a></li>
                <li class="header-mini__nav--item"><a href="">tin tức</a></li>
                <li class="header-mini__nav--item"><a href="">khuyến mãi</a></li>
                <li class="header-mini__nav--item"><a href="services_maintenance.html">dịch vụ</a></li>
                <li class="header-mini__nav--item header-mini__nav--item--contact">
                    <p class="header-infor__contact">
                        Liên hệ: <strong>0963 998 456</strong>
                    </p>
                    <div class="header-infor__logo">
                        <span>SUZUKi Vinh</span>
                        <img src="web/img/logo/Rectangle 4.png" alt="" />
                    </div>
                </li>
            </nav>
        </header>
        @yield('content')
        <div class="footer">
            <div class="footer-header">
                <div class="footer-1">
                    <h4 class="footer-title">Suzuki Vinh</h4>
                    <div class="footer-1__content">
                        <p>XE Ô TÔ NHỎ CHO MỘT TƯƠNG LAI LỚN</p>
                    </div>
                </div>
                <div class="footer-1">
                    <h4 class="footer-title">Showroom</h4>
                    <div class="footer-1__content">
                        <p>
                            <strong>Cơ sở 1:</strong> Số 5B Nguyễn Trãi, TP Vinh Nghệ An.
                        </p>
                        <p>
                            <strong> Cơ sở 2:</strong> Khối Bắc, xã Diễn Hồng, huyện Diễn
                            Châu Nghệ An
                        </p>
                    </div>
                </div>
                <div class="footer-1">
                    <h4 class="footer-title">Liên Hệ</h4>
                    <div class="footer-1__content">
                        <p>
                            <strong>Địa điểm:</strong> Số 5B Nguyễn Trãi, TP Vinh Nghệ An.
                        </p>
                        <p><strong>Số điện thoại:</strong> 0963 988 456</p>
                        <p><strong>Email::</strong> suzukivinh@gmail.com</p>
                        <p><strong>Hotline:</strong> 0872 1234 567</p>
                    </div>
                </div>
                <div class="footer-1">
                    <h4 class="footer-title">Cửa hàng</h4>
                    <div class="footer-1__content">
                        <p>Suzuki XL7</p>
                        <p>Suzuki Swift</p>
                        <p>Suzuki Ertiga</p>
                        <p>Suzuki Ciaz</p>
                        <p>Suzuki Carry</p>
                        <p>Pro Suzuki</p>
                        <p>Carry Truck</p>
                        <p>Suzuki Blind Van</p>
                    </div>
                </div>
                <div class="footer-1">
                    <h4 class="footer-title">Tham gia vào Group</h4>
                    <div class="footer-1__content">
                        <img src="{{ URL::asset('web/img/logo/foot-page (image).png') }}" alt="" />
                    </div>
                </div>
                <div class="footer-1">
                    <h4 class="footer-title">Chứng chỉ</h4>
                    <div class="footer-1__content">
                        <img src="{{ URL::asset('web/img/logo/dathongbao (image).png') }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Copyright@ 2021 suzukinghean.vn</p>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('web/js/home.js') }} "></script>
    <script src="{{ URL::asset('web/js/detail.js') }} "></script>
    <script src="{{ URL::asset('web/js/main.js') }}  "></script>
</body>

</html>