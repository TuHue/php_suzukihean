@extends('web.layouts.master')
@section('content')
<div class="home-1" style="background-image: url('{{ URL::asset('web/img/background/banner.png') }}')"></div>
<div class="detail-1">
    <div class="container">
        <p>Home > Cửa Hàng > {{ $product->name }}</p>
    </div>
</div>
<div class="detail-2">
    <div class="container">
        <div class="detail-2__top">
            <div class="detail-2__top--name">
                <h3>{{ $product->name }}</h3>
                <p>Sẵn sàng cho khởi đầu mới</p>
            </div>
            <div class="detail-2__top--price">
                <h4>{{ number_format($product->price, 0, '', ',') }} đ</h4>
                <p>Giá niêm yết</p>
            </div>
        </div>
        <div class="detail-2__content">
            <div class="detail-2__content--detail">
                <img src="{{$product->image }}" alt="" />
                <p style="margin-top:20px">Màu cam</p>
            </div>
            <div class="detail-2__content--carts">
                <div class="detail-2__content--cart">
                    <img class="detail-2__content--img" src="{{$product->image }}" alt="" />
                </div>
                <div class="detail-2__content--cart">
                    <img class="detail-2__content--img" src="{{$product->image }}" alt="" />
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
                        <span class="tag--text tag--text--active" data-value="kich-thuc-trong-tai">Kích thức - Tải
                            trọng</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text" data-value="dong-co-hop-so">Động cơ - Hộp số</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text" data-value="ngoai-that">Ngoại thất</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text" data-value="tam-nhin">Tầm nhìn</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text" data-value="tay-lai-bang-dieu-khien">Tay lái - Bảng điều khiển</span>
                        <span class="tag--line">|</span>
                    </div>
                    <div class="tag--item">
                        <span class="tag--text" data-value="khung-gam">Khung gầm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-3__content">
            <div class="detail-3__content--item" id="kich-thuc-trong-tai">
                <table>
                    <tr>
                        <td colspan="2">Chiều dài tổng thể</td>
                        <td class="col">4.450mm</td>
                    </tr>
                    <tr>
                        <td colspan="2">Chiều rồng tổng thể</td>

                        <td class="col">1.775 mm</td>
                    </tr>
                    <tr>
                        <td colspan="2">Chiều cao tổng thể</td>
                        <td class="col">1.710 mm</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Khoảng cách bánh xe</td>
                        <td>Trước </td>
                        <td class="col">1.515 mm</td>
                    </tr>
                    <tr>
                        <td>Sau</td>
                        <td class="col">1.530 mm</td>
                    </tr>
                    <tr>
                        <td colspan="2">Bán kính vòng quày tối thiếu</td>
                        <td class="col">5,2 m</td>
                    </tr>
                    <tr>
                        <td colspan="2">Khoảng sáng gầm xe</td>
                        <td class="col">200 mm</td>
                    </tr>
                    <tr>
                        <td colspan="2">Số chỗ ngồi</td>
                        <td class="col">7 người</td>
                    </tr>
                    <tr>
                        <td colspan="2">Dung tích bình xăng</td>
                        <td class="col">45 lít</td>
                    </tr>
                    <tr>
                        <td rowspan="3">Dung tích khoang hành lý</td>
                        <td>Tối đa</td>
                        <td class="col">803 lít</td>
                    </tr>
                    <tr>
                        <td>Khi gập hàng ghế thứ 3 (phương pháp VDA)</td>
                        <td class="col">550 lít</td>
                    </tr>
                    <tr>
                        <td>Khi gập hàng ghế thứ 3 (phương pháp VDA)</td>
                        <td class="col">153 lít</td>
                    </tr>

                    <tr>
                        <td>Trọng lương không tải</td>
                        <td></td>
                        <td class="col">1.175 kg</td>
                    </tr>
                    <tr>
                        <td>Trọng lương toàn tải</td>
                        <td></td>
                        <td class="col">1.175 kg</td>
                    </tr>
                </table>
            </div>
            <div class="detail-3__content--item" id="dong-co-hop-so">
                <h2>Chứ có dữ liệu 1</h2>
            </div>
            <div class="detail-3__content--item" id="ngoai-that">
                <h2>Chứ có dữ liệu 2</h2>

            </div>
            <div class="detail-3__content--item" id="tam-nhin">
                <h2>Chứ có dữ liệu 3</h2>

            </div>
            <div class="detail-3__content--item" id="tay-lai-bang-dieu-khien">
                <h2>Chứ có dữ liệu 4</h2>

            </div>
            <div class="detail-3__content--item" id="khung-gam">
                <h2>Chứ có dữ liệu 5</h2>

            </div>
            <div class="detail-3__content--item" id="khung-gam">
                <h2>Chứ có dữ liệu 6</h2>

            </div>

        </div>
    </div>
</div>
<div class="detail-4">
    <div class="container">
        <div class="detail-4__top">
            <div class="detail-4__title">
                <h4>ngoại thất đậm chất suv</h4>
            </div>
            <div class="detail-4__top--content">
                <div class="detail-4__top--content--item detail-4__top--content--item--1">
                    <div class="detail-4__content">
                        <h2>NGOẠI HÌNH MẠNH MẼ</h2>
                        <p>
                            - Từ cản trước gồ ghề đến đèn pha LED và lưới tản nhiệt mạ crôm đều tạo nên điểm nhấn. Không
                            gì ngăn cản bạn làm điều mình muốn!
                        </p>
                        <h2>SỐNG MẠNH MẼ</h2>
                        <p>
                            - Kiểu dáng thể thao cùng những đường gân bảo vệ, Suzuki XL7 mang đến sự tự tin và niềm vui
                            lái xe
                        </p>
                    </div>
                </div>
                <div class="detail-4__top--content--item detail-4__top--content--item--2">
                    <img src="{{ URL::asset('web/img/carts/Suzuki-XL7-song-manh-me.png') }}" alt="" />
                </div>
                <div class="detail-4__top--content--item detail-4__top--content--item--3">
                    <img src="{{ URL::asset('web/img/carts/Suzuki-XL7-san-sang-cho-khoi-dau-moi.png') }}" alt="" />
                </div>
                <div class="detail-4__top--content--item detail-4__top--content--item--4">
                    <div class="detail-4__content">
                        <p>
                            Thanh giá nóc và 7 chỗ ngồi linh hoạt đảm bảo cho mọi kế hoạch yêu thích. Mạnh mẽ và táo bạo
                            không chỉ là một phong cách. Đó là cuộc sống của bạn!
                        </p>
                    </div>
                </div>
                <div class="detail-4__top--content--item detail-4__top--content--item--5">
                    <img src="{{ URL::asset('web/img/carts/suzuki-xl7-2020-3 (image).png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="detail-4__center">
            <div class="detail-4__title">
                <h4>NỘI THẤT THOẢI MÁI</h4>
            </div>
            <div class="detail-4__center--content">
                <div class="detail-4__center--content--left">
                    <div class="detail-4__content">
                        <h2>HỆ THỐNG ÂM THANH</h2>
                        <p>
                            - Hệ thống âm thanh được trang bị màn hình cảm ứng 10 inch hoạt động tương thích với Apple
                            CarPlay và Android Auto. Kết nối USB, AUX, hoặc Bluetooth. Tích hợp camera lùi được đặt ở vị
                            trí cao giúp mở rộng tầm quan sát. Gọi điện và truyền âm thanh rảnh
                            tay thông qua Bluetooth. ( Cổng sạc và hộc đựng chai nước hàng ghế thứ 3, Cổng sạc và giá đỡ
                            điện thoại ở hàng ghế thứ 2 )
                        </p>
                        <h2>HỆ THỐNG ÂM THANH</h2>
                        <p>
                            - Hệ thống âm thanh được trang bị màn hình cảm ứng 10 inch hoạt động tương thích với Apple
                            CarPlay và Android Auto. Kết nối USB, AUX, hoặc Bluetooth. Tích hợp camera lùi được đặt ở vị
                            trí cao giúp mở rộng tầm quan sát. Gọi điện và truyền âm thanh rảnh
                            tay thông qua Bluetooth. ( Cổng sạc và hộc đựng chai nước hàng ghế thứ 3, Cổng sạc và giá đỡ
                            điện thoại ở hàng ghế thứ 2 )
                        </p>
                    </div>
                </div>
                <div class="detail-4__center--content--right">
                    <img src="{{ URL::asset('web/img/carts/homecar1.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="detail-4__bottom">
            <div class="detail-4__content">
                <h2>HỆ THỐNG ÂM THANH</h2>
                <p>
                    - Hệ thống âm thanh được trang bị màn hình cảm ứng 10 inch hoạt động tương thích với Apple CarPlay
                    và Android Auto. Kết nối USB, AUX, hoặc Bluetooth. Tích hợp camera lùi được đặt ở vị trí cao giúp mở
                    rộng tầm quan sát. Gọi điện và truyền âm thanh rảnh
                    tay thông qua Bluetooth. ( Cổng sạc và hộc đựng chai nước hàng ghế thứ 3, Cổng sạc và giá đỡ điện
                    thoại ở hàng ghế thứ 2 )
                </p>
            </div>
        </div>
    </div>
</div>
<div class="detail-5">
    <div class="container">
        <div class="detail-5__title">
            <h2>Ảnh 360 Độ</h2>
        </div>
        <div class="detail-5__content">
            <div class="tags">
                <div class="tag--item">
                    <span class="tag--text">Ngoại thất</span>
                    <span class="tag--line">|</span>
                </div>
                <div class="tag--item">
                    <span class="tag--text tag--text--active">Nội thất</span>
                </div>
            </div>
            <div class="detail-5__content-map"></div>
        </div>
    </div>
</div>
<div class="detail-6">
    <div class="detail-6_cars">
        @foreach ( $productXeTais as $productXeTai )
        <a href="/cua-hang/o-to/{{ $productXeTai->id }}" class="detail-6_cars--item">
            <img src="{{ $productXeTai->image }}" alt="" style="width: 100%; height: 200px" />
            <div class="detail-6_cars--infor">
                <h2>{{ $productXeTai->name }}</h2>
                <p>{{ number_format($productXeTai->price, 0, '', ',') }} đ</p>
                <div class="detail-6_cars--line"></div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="container ">
        <div class="detail-6_cars detail-6_oto">
            @foreach ( $productOtos as $productOto )
            <a href="/cua-hang/o-to/{{ $productOto->id }}" class="detail-6_cars--item">
                <img src="{{ $productOto->image}}" alt="" style="width: 100%; height: 200px">
                <div class="detail-6_cars--infor">
                    <h2>{{ $productOto->name }}</h2>
                    <p>{{ number_format($productOto->price, 0, '', ',') }} đ</p>
                    <div class="detail-6_cars--line"></div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection()
@section('style')
<link rel="stylesheet" href="{{ URL::to('web/css/table.css') }}">
@endsection()