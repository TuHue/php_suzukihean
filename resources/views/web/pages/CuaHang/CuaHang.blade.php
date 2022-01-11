@extends('web.layouts.master')
@section('content')

<div class="home-1" style="background-image: url('web/img/background/banner.png')">
    <div class="action--list">
        <button class="btn btn-sm btn-while" type="button" id="btn--advise">
            Yêu cầu tư vấn
        </button>
        <button class="btn btn-sm btn-red" id="btn--test-driver" type="button">
            Đăng ký Lái thử
        </button>
    </div>
    <div class="home-1__form-1 from" id="home-1__form-1">
        <img src="web/img/background/che-do-lai-2-1563872459-width986height555.png" alt="" />
        <div class="form__close" id="from1__close">
            <span>
                <i class="fas fa-times"></i>
            </span>
        </div>
        <form class="form__res">
            <div class="form__title">
                <h5>Đăng ký lái thử</h5>
            </div>
            <div class="form__row">
                <div class="form__col">
                    <label for="" class="col__lable">Họ và tên</label>
                    <input type="text" class="col__input" />
                </div>
                <div class="form__col">
                    <label for="" class="col__lable">Số điện thoại</label>
                    <input type="text" class="col__input" />
                </div>
            </div>
            <div class="form__row">
                <div class="form__col">
                    <label for="" class="col__lable">Email</label>
                    <input type="text" class="col__input" />
                </div>
                <div class="form__col">
                    <label for="" class="col__lable">Loại xe</label>
                    <select class="col__input col__select">
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
            <div class="form__row">
                <div class="form__col">
                    <label for="" class="col__lable">Địa Chỉ</label>
                    <select class="col__input col__select">
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
                <div class="form__col">
                    <label for="" class="col__lable">THời gian</label>
                    <select class="col__input col__select">
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
            <div class="form__row form__submit">
                <input type="submit" value="Đăng ký" class="col_submit btn" />
            </div>
        </form>
    </div>
    <div class="home-1__form-2 from" id="home-1__form-2">
        <img src="web/img/background/f37a47fe-20190731_081913.jpg" alt="" />
        <div class="form__close" id="from2__close">
            <span>
                <i class="fas fa-times"></i>
            </span>
        </div>
        <form class="form__res">
            <div class="form__title">
                <h5>Yêu cầu tư vấn</h5>
            </div>
            <div class="form__row">
                <div class="form__col">
                    <label for="" class="col__lable">Họ và tên</label>
                    <input type="text" class="col__input" />
                </div>
                <div class="form__col">
                    <label for="" class="col__lable">Số điện thoại</label>
                    <input type="text" class="col__input" />
                </div>
            </div>
            <div class="form__row">
                <div class="form__col">
                    <label for="" class="col__lable">Email</label>
                    <input type="text" class="col__input" />
                </div>
                <div class="form__col">
                    <label for="" class="col__lable">Loại xe</label>
                    <select class="col__input col__select">
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

            <div class="form__row form__submit">
                <input type="submit" value="Đăng ký" class="col_submit btn" />
            </div>
        </form>
    </div>
</div>
<div class="home-2">
    <div class="ratings">
        @foreach ($feedbacks as $feedback )
        <div class="ratings__item">
            <div class="ratings__item--title">
                <div class="ratings__item--avatar">
                    <img src="{{ $feedback->image }}" alt="" />
                    <p>{{ $feedback->name }}</p>
                </div>
                <div class="ratings__item--start">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
            <div class="ratings__item--content">
                <h5>Phân loại xe: <span>Xe {{ $feedback->product->name }}</span></h5>
                <p>
                    {{ $feedback->description }}
                </p>
            </div>
            <p class="ratings__item--date">{{ $feedback->created_at }}</p>
        </div>
        @endforeach

    </div>
</div>
<div class="home-3">
    <form class="from-3">
        <div class="form__row">
            <div class="form__col from__search">
                <input type="text" class="col__search" placeholder="Tìm kiếm..." />
                <button class="btn--search" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="form__col from__search">
                <select class="form__select">
                    <option class="form__select--option" selected disabled>
                        Cửa hàng...
                    </option>
                    <option value="1 ">Audi</option>
                    <option value="2 ">BMW</option>
                    <option value="3 ">Citroen</option>
                    <option value="4 ">Ford</option>
                    <option value="5 ">Honda</option>
                    <option value="6 ">Jaguar</option>
                    <option value="7 ">Land Rover</option>
                    <option value="8 ">Mercedes</option>
                    <option value="9 ">Mini</option>
                    <option value="10 ">Nissan</option>
                    <option value="11 ">Toyota</option>
                    <option value="12 ">Volvo</option>
                </select>
            </div>
        </div>
    </form>
</div>
<div class="home-4">
    <div class="home-4__header">
        <h5 class="h-5">Xe ô tô nhỏ cho tương lại lớn</h5>
        <div class="tags">
            <div class="tag--item">
                <a href="/" class="tag--text tag--text--active">Cửa hàng</a>
                <span class="tag--line">|</span>
            </div>
            <div class="tag--item">
                <a href="/tin-tuc/danh-sach-tin-tuc" class="tag--text">Tin tức</a>
                <span class="tag--line">|</span>
            </div>
            <div class="tag--item">
                <a href="/khuyen-mai/danh-sach-khuyen-mai" class="tag--text">Khuyến Mãi</a>
            </div>
        </div>
    </div>
    <div class="home-4__content">
        <div class="home-4__cars">
            @foreach ($products as $product )
            <div class="home-4__car" style="background-image: url({{ $product->image }})">
                <h4 class="home-4__car--name">{{ $product->name }}</h4>
                <a href="/cua-hang/o-to/{{ $product->id }}" class="home-4__car--link">Xem thêm</a>
            </div>
            @endforeach

        </div>
    </div>
</div>
<section class="home-5">
    <div class="home-5__header">
        <h5 class="h-5">Dịch vụ chuyên nghiệp</h5>
        <p>"Sẵn sàng cho khởi đầu mới - Suzuki XL7"</p>
    </div>
    <div class="home-5_context">
        <a href="/dich-vu/bao-hanh-bao-duong" class="home-5_context-item">
            <img src="web/img/services/sevice1.png" alt="" />
            <div class="home-5_context-item--content">
                <p>BẢO HÀNH, BẢO DƯỠNG</p>
            </div>
        </a>
        <a href="/dich-vu/sua-chua-xe-suzuki" class="home-5_context-item">
            <img src="web/img/services/sevice2.png" alt="" />
            <div class="home-5_context-item--content">
                <p>SỬA CHỮA XE SUZUKI</p>
            </div>
        </a>
        <a href="dich-vu/dong-thung-xe-tai" class="home-5_context-item">
            <img src="web/img/services/sevice3.png" alt="" />
            <div class="home-5_context-item--content">
                <p>ĐÓNG THÙNG XE TẢI</p>
            </div>
        </a>
        <a href="dich-vu/phu-thung-xe-suzuki" class="home-5_context-item">
            <img src="web/img/services/sevice4.png" alt="" />
            <div class="home-5_context-item--content">
                <p>PHỤ TÙNG XE SUZUKI</p>
            </div>
        </a>
    </div>
</section>
@endsection()