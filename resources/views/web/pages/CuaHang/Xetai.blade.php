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
                    <img class="detail-2__content--img" src="{{ $product->image }}" alt="" />
                </div>
                <div class="detail-2__content--cart">
                    <img class="detail-2__content--img" src="{{ $product->image }}" alt="" />
                </div>
                <div class="detail-2__content--cart">
                    <img class="detail-2__content--img" src="{{ $product->image }}" alt="" />
                </div>
                <div class="detail-2__content--cart">
                    <img class="detail-2__content--img" src="{{ $product->image }}" alt="" />
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
                    <p>{{ number_format($productOto->price, 0, '', ',') }}đ </p>
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

@endsection