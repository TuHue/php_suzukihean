<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link id="favicon" rel="shortcut icon" href="{{ URL::to('web/img/logo/2000pxsuzukilogo2-8501.png') }}" type="image/x-icon" />
    <title>ô tô</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ URL::to('web/css/base.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('web/css/home.css') }} " />
    <link rel="stylesheet" href="{{ URL::to('web/css/detail.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('web/css/detail_xetai.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('web/css/responsive.css') }} " />
    <link rel="stylesheet" href="{{ URL::to('web/css/news.css') }} " />
    <link rel="stylesheet" href="{{ URL::to('web/css/services_xetail.css') }}" />
    @yield('style')
</head>

<body>
    <div class="wrapper">
        @include('web.component.header')
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