@extends('web.layouts.master')
@section('content')

<div class="home-1" style="background-image: url(' {{ URL::asset('web/img/background/banner.png') }}  ')"></div>
<div class="detail-1">
    <div class="container">
        <p>Tin tức > Chi tiết tin tức</p>
    </div>
</div>

<div class="news-1">
    <div class="container">
        <div class="news-1-title">
            <h3>
                {{ $news->name }}
            </h3>
            <p>{{ $news->created_at }}</p>
        </div>
        <div class="news-1-content">
            {!! $news->content !!}
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
<div class="news-2">
    <div class="container">
        <div class="news-2__form">
            <div class="news-2__form--title">
                <h3>Bình Luận</h3>
            </div>
            <form method="post" action="/tin-tuc/binh-luan" class="news-2__form--feedback">
                @csrf
                <div class="form__feedback--row">
                    <div class="form__feedback--col">
                        <label for="" class="form__feedback--lable">Họ và tên</label>
                        <input type="text" class="form__feedback--input" name="input_hovaten"/>
                    </div>
                    <div class="form__feedback--col">
                        <label for="" class="form__feedback--lable">Loại xe</label>
                        <select  name="select_loaixe" style="color:#000;border:1px solid var(--blue-4);padding:1.25rem; font-size: 1.5rem ">
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
                        <textarea class="form__feedback--textarea" name="textarea_noidung"></textarea>
                    </div>
                </div>
                <div class="form__feedback--row">
                    <button type="text" type="submit" value="" class=" btn-feedback">Bình luận</button>
                </div>
            </form>
        </div>
        <div class="news-2-feedback">
                <div class="news-2-feedback--item">
                <img src="{{ URL::asset('web/img/face/52231994-studio-shot-of-young-man-looking-at-the-camera-isolated-on-white-background-horizontal-format-he-has.webp') }} "
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