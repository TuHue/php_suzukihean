@extends('web.layouts.master')
@section('content')

<div class="home-1" style="background-image: url(' {{ URL::asset('web/img/background/banner.png') }}  ')"></div>
<div class="detail-1">
    <div class="container">
        <p>Home > Cửa Hàng > Suzuki XL7</p>
    </div>
</div>

<div class="news-1">
    <div class="container">
        <div class="news-1-title">
            <h3>
                MẪU XE ĐEP NHẤT NĂM 2020 MẪU XE ĐEP NHẤT NĂM 2020 MẪU XE ĐEP
            </h3>
            <p>3 ngày trước 17:50</p>
        </div>
        <div class="news-1-content">
            <p>
                Mẫu xe đẹp nhất năm 2020 Mẫu xe đẹp nhất năm 2020 Mẫu xe đẹp nhất năm 2020 Mẫu xe đẹp nhất năm 2020 Mẫu
                xe đẹp nhất năm Mẫu xe đẹp nhất năm 2020 Mẫu xe đẹp nhất
            </p>
        </div>
    </div>
</div>
<div class="detail-6 detail-6-news">
    <div class="detail-6_cars">
        <div class="detail-6_cars--item detail-6-news--item">
            <img src="{{ URL::asset('web/img/carts/car1.png') }} " alt="" />
            <div class="detail-6_cars--infor">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
            <div class="see-more">
                <a href="">Xem thêm</a>
            </div>
        </div>

        <div class="detail-6_cars--item detail-6-news--item">
            <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
            <div class="detail-6_cars--infor">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
            <div class="see-more">
                <a href="">Xem thêm</a>
            </div>
        </div>

        <div class="detail-6_cars--item detail-6-news--item">
            <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
            <div class="detail-6_cars--infor">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
            <div class="see-more">
                <a href="">Xem thêm</a>
            </div>
        </div>

        <div class="detail-6_cars--item detail-6-news--item">
            <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="" />
            <div class="detail-6_cars--infor">
                <h2>SUZUKI SWIFT</h2>
                <p>249.300.000 đ</p>
            </div>
            <div class="see-more">
                <a href="">Xem thêm</a>
            </div>
        </div>
    </div>
</div>
<div class="news-2">
    <div class="container">
        <div class="news-2__form">
            <div class="news-2__form--title">
                <h3>Bình Luận</h3>
            </div>
            <form action="" class="news-2__form--feedback">
                <div class="form__feedback--row">
                    <div class="form__feedback--col">
                        <label for="" class="form__feedback--lable">Họ và tên</label>
                        <input type="text" class="form__feedback--input" />
                    </div>
                    <div class="form__feedback--col">
                        <label for="" class="form__feedback--lable">Loại xe</label>
                        <select class="form__feedback--select">
                            <option value="0">Select car:</option>
                            <option value="1">Audi</option>
                            <option value="2">BMW</option>
                            <option value="3">Citroen</option>
                            <option value="4">Ford</option>
                            <option value="5">Honda</option>
                            <option value="6">Jaguar</option>
                            <option value="7">Land Rover</option>
                            <option value="8">Mercedes</option>
                            <option value="9">Mini</option>
                            <option value="10">Nissan</option>
                            <option value="11">Toyota</option>
                            <option value="12">Volvo</option>
                        </select>
                    </div>
                </div>
                <div class="form__feedback--row">
                    <div class="form__feedback--col-1">
                        <label for="" class="form__feedback--lable">Nội dung</label>
                        <textarea class="form__feedback--textarea"></textarea>
                    </div>
                </div>
                <div class="form__feedback--row">
                    <button type="text" type="submit" value="" class=" btn-feedback">Feedback</button>
                </div>
            </form>
        </div>
        <div class="news-2-feedback">
            <div class="news-2-feedback--item">
                <img src="{{ URL::asset('assets/img/face/52231994-studio-shot-of-young-man-looking-at-the-camera-isolated-on-white-background-horizontal-format-he-has.webp') }} "
                    alt="" />
                <h2>Ng. Hương</h5>
                    <p><strong>Phân loại xe:</strong> Xe Swift</p>
                    <p>
                        Xe vừa nhỏ xinh, em thấy di chuyển trên đường phố hay ra vào ngõ đều rất dễ dàng. Mức giá thì
                        phù hợp với điều kiện kinh tế của em và gia đình
                    </p>
                    <p class="feedback--date">01-06-2010 17:30</p>
            </div>
            <div class="news-2-feedback--item">
                <img src="{{ URL::asset('assets/img/face/52231994-studio-shot-of-young-man-looking-at-the-camera-isolated-on-white-background-horizontal-format-he-has.webp') }}"
                    alt="" />
                <h2>Ng. Hương</h5>
                    <p><strong>Phân loại xe:</strong> Xe Swift</p>
                    <p>
                        Xe vừa nhỏ xinh, em thấy di chuyển trên đường phố hay ra vào ngõ đều rất dễ dàng. Mức giá thì
                        phù hợp với điều kiện kinh tế của em và gia đình
                    </p>
                    <p class="feedback--date">01-06-2010 17:30</p>
            </div>
            <div class="news-2-feedback--item">
                <img src="{{ URL::asset('assets/img/face/52231994-studio-shot-of-young-man-looking-at-the-camera-isolated-on-white-background-horizontal-format-he-has.webp') }}"
                    alt="" />
                <h2>Ng. Hương</h5>
                    <p><strong>Phân loại xe:</strong> Xe Swift</p>
                    <p>
                        Xe vừa nhỏ xinh, em thấy di chuyển trên đường phố hay ra vào ngõ đều rất dễ dàng. Mức giá thì
                        phù hợp với điều kiện kinh tế của em và gia đình
                    </p>
                    <p class="feedback--date">01-06-2010 17:30</p>
            </div>
        </div>
    </div>
</div>

@endsection()