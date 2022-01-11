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
                        <img src="{{ URL::asset("web/img/carts/Màu cam.png") }}" alt="" />
                        <p>Màu cam</p>
                    </div>
                    <div class="detail-2__content--carts">
                        <div class="detail-2__content--cart">
                            <img class="detail-2__content--img" src="{{ URL::asset("web/img/carts/car11.png") }}" alt="" />
                        </div>
                        <div class="detail-2__content--cart">
                            <img src="{{ URL::asset("web/img/carts/car2.png") }} " class="detail-2__content--img" alt="" />
                        </div>
                        <div class="detail-2__content--cart">
                            <img src="{{ URL::asset("web/img/carts/car3.png") }} " class="detail-2__content--img" alt="" />
                        </div>
                        <div class="detail-2__content--cart">
                            <img src="{{ URL::asset("web/img/carts/car4.png") }} " class="detail-2__content--img" alt="" />
                        </div>
                    </div>
                    <div class="detail-2__content--logo">
                        <div class="detail-2__logo">
                            <img src="{{ URL::asset(" web/img/logo/Path.png") }} " alt="" />
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
                                <span class="tag--text tag--text--active">Kích thức - Tải trọng</span
                  >
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
                        <h4>ngoại thất đậm chất suv</h4>
                    </div>
                    <div class="detail-4__top--content">
                        <div class="detail-4__top--content--item detail-4__top--content--item--1">
                            <div class="detail-4__content">
                                <h2>NGOẠI HÌNH MẠNH MẼ</h2>
                                <p>
                                    - Từ cản trước gồ ghề đến đèn pha LED và lưới tản nhiệt mạ crôm đều tạo nên điểm nhấn. Không gì ngăn cản bạn làm điều mình muốn!
                                </p>
                                <h2>SỐNG MẠNH MẼ</h2>
                                <p>
                                    - Kiểu dáng thể thao cùng những đường gân bảo vệ, Suzuki XL7 mang đến sự tự tin và niềm vui lái xe
                                </p>
                            </div>
                        </div>
                        <div class="detail-4__top--content--item detail-4__top--content--item--2">
                            <img src="{{ URL::asset("web/img/carts/Suzuki-XL7-song-manh-me.png") }}" alt="" />
                        </div>
                        <div class="detail-4__top--content--item detail-4__top--content--item--3">
                            <img src="{{ URL::asset("web/img/carts/Suzuki-XL7-san-sang-cho-khoi-dau-moi.png") }}" alt="" />
                        </div>
                        <div class="detail-4__top--content--item detail-4__top--content--item--4">
                            <div class="detail-4__content">
                                <p>
                                    Thanh giá nóc và 7 chỗ ngồi linh hoạt đảm bảo cho mọi kế hoạch yêu thích. Mạnh mẽ và táo bạo không chỉ là một phong cách. Đó là cuộc sống của bạn!
                                </p>
                            </div>
                        </div>
                        <div class="detail-4__top--content--item detail-4__top--content--item--5">
                            <img src="{{ URL::asset("web/img/carts/suzuki-xl7-2020-3 (image).png") }}" alt="" />
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
                                    - Hệ thống âm thanh được trang bị màn hình cảm ứng 10 inch hoạt động tương thích với Apple CarPlay và Android Auto. Kết nối USB, AUX, hoặc Bluetooth. Tích hợp camera lùi được đặt ở vị trí cao giúp mở rộng tầm quan sát. Gọi điện và truyền âm thanh rảnh
                                    tay thông qua Bluetooth. ( Cổng sạc và hộc đựng chai nước hàng ghế thứ 3, Cổng sạc và giá đỡ điện thoại ở hàng ghế thứ 2 )
                                </p>
                                <h2>HỆ THỐNG ÂM THANH</h2>
                                <p>
                                    - Hệ thống âm thanh được trang bị màn hình cảm ứng 10 inch hoạt động tương thích với Apple CarPlay và Android Auto. Kết nối USB, AUX, hoặc Bluetooth. Tích hợp camera lùi được đặt ở vị trí cao giúp mở rộng tầm quan sát. Gọi điện và truyền âm thanh rảnh
                                    tay thông qua Bluetooth. ( Cổng sạc và hộc đựng chai nước hàng ghế thứ 3, Cổng sạc và giá đỡ điện thoại ở hàng ghế thứ 2 )
                                </p>
                            </div>
                        </div>
                        <div class="detail-4__center--content--right">
                            <img src="{{ URL::asset("web/img/carts/homecar1.png") }} " alt="" />
                        </div>
                    </div>
                </div>
                {{-- <div class="detail-4__bottom">
                    <div class="detail-4__content">
                        <h2>HỆ THỐNG ÂM THANH</h2>
                        <p>
                            - Hệ thống âm thanh được trang bị màn hình cảm ứng 10 inch hoạt động tương thích với Apple CarPlay và Android Auto. Kết nối USB, AUX, hoặc Bluetooth. Tích hợp camera lùi được đặt ở vị trí cao giúp mở rộng tầm quan sát. Gọi điện và truyền âm thanh rảnh
                            tay thông qua Bluetooth. ( Cổng sạc và hộc đựng chai nước hàng ghế thứ 3, Cổng sạc và giá đỡ điện thoại ở hàng ghế thứ 2 )
                        </p>
                    </div>
                    <div class="detail-4__bottom--content--oto">
                        <div class="detail-4__bottom-content--oto--item detail-4__bottom-content--oto--item--1">
                            <img src="web/img/carts/seat-height-adjuster-2.png" alt="" />
                        </div>
                        <div class="detail-4__bottom-content--oto--item detail-4__bottom-content--oto--item--2">
                            <div class="detail-4__content">
                                <p>
                                    Thanh giá nóc và 7 chỗ ngồi linh hoạt đảm bảo cho mọi kế hoạch yêu thích. Mạnh mẽ và táo bạo không chỉ là một phong cách. Đó là cuộc sống của bạn!
                                </p>
                            </div>
                        </div>
                        <div class="detail-4__bottom-content--oto--item detail-4__bottom-content--oto--item--3">
                            <img src="web/img/carts/Suzuki-XL7-NT2.png" alt="" />
                        </div>
                        <div class="detail-4__bottom-content--oto--item detail-4__bottom-content--oto--item--4">
                            <img src="web/img/carts/ample-luggage-space-1.png" alt="" />
                        </div>
                        <div class="detail-4__bottom-content--oto--item detail-4__bottom-content--oto--item--5">
                            <div class="detail-4__content">
                                <h2>NGOẠI HÌNH MẠNH MẼ</h2>
                                <p>
                                    - Từ cản trước gồ ghề đến đèn pha LED và lưới tản nhiệt mạ crôm đều tạo nên điểm nhấn. Không gì ngăn cản bạn làm điều mình muốn!
                                </p>
                                <h2>SỐNG MẠNH MẼ</h2>
                                <p>
                                    - Kiểu dáng thể thao cùng những đường gân bảo vệ, Suzuki XL7 mang đến sự tự tin và niềm vui lái xe
                                </p>
                            </div>
                        </div>
                    </div>
               
                </div> --}}
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
                <div class="detail-6_cars--item">
                    <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="">
                    <div class="detail-6_cars--infor">
                        <h2>SUZUKI SWIFT</h2>
                        <p>249.300.000 đ</p>
                    </div>
                </div>
                <div class="detail-6_cars--item">
                    <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="">
                    <div class="detail-6_cars--infor">
                        <h2>SUZUKI SWIFT</h2>
                        <p>249.300.000 đ</p>
                    </div>
                </div>
                <div class="detail-6_cars--item">
                    <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="">
                    <div class="detail-6_cars--infor">
                        <h2>SUZUKI SWIFT</h2>
                        <p>249.300.000 đ</p>
                    </div>
                </div>
                <div class="detail-6_cars--item">
                    <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="">
                    <div class="detail-6_cars--infor">
                        <h2>SUZUKI SWIFT</h2>
                        <p>249.300.000 đ</p>
                    </div>
                </div>
            </div>
            <div class="container ">
                <div class="detail-6_cars detail-6_oto">
                    <div class="detail-6_cars--item">
                        <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="">
                        <div class="detail-6_cars--infor">
                            <h2>SUZUKI SWIFT</h2>
                            <p>249.300.000 đ</p>
                        </div>
                    </div>
                    <div class="detail-6_cars--item">
                        <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="">
                        <div class="detail-6_cars--infor">
                            <h2>SUZUKI SWIFT</h2>
                            <p>249.300.000 đ</p>
                        </div>
                    </div>
                    <div class="detail-6_cars--item">
                        <img src="{{ URL::asset('web/img/carts/car1.png') }}" alt="">
                        <div class="detail-6_cars--infor">
                            <h2>SUZUKI SWIFT</h2>
                            <p>249.300.000 đ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection()
