@extends('web.layouts.master')
@section('content')
<div class="home-1" style="background-image: url('{{ URL::asset('web/img/background/banner.png') }}')"></div>
<div class="detail-1">
    <div class="container">
        <p>Dịch vụ > Phụ tùng xe suzuki</p>

    </div>
</div>
<div class="services">
    <div class="container">
        <div class="services__title">
            <h2>Sửa Chữa Xe Suzuki</h2>
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
                    <a href="/dich-vu/bao-hanh-bao-duong"
                        class="services__content-header--item ">
                        <img src="{{ URL::asset('web/img/logo/icondichvu1.png')}} " alt="" />
                        <p>BẢO DƯỠNG, BẢO HÀNH</p>
                    </a>
                    <a href="/dich-vu/sua-chua-xe-suzuki" class="services__content-header--item services__content-header--item--active">
                        <img src="{{ URL::asset('web/img/logo/icondichvu2.png')}}" alt="" />
                        <p>SỬA CHỮA XE SUZUKI</p>
                    </a>
                    <a href="/dich-vu/dong-thung-xe-tai" class="services__content-header--item ">
                        <img src="{{ URL::asset('web/img/logo/icondichvu3.png')}}" alt=" " />
                        <p>ĐÓNG THÙNG XE TẢI</p>
                    </a>
                    <a href="/dich-vu/phu-thung-xe-suzuki" class="services__content-header--item ">
                        <img src="{{ URL::asset('web/img/logo/icondichvu4.png')}}" alt=" " />
                        <p>PHỤ TÙNG XE SUZUKI</p>
                    </a>
                </div>
                <div class="services__content--context">
                    <p>Suzuki Vinh l&agrave; một trong c&aacute;c đơn vị chuy&ecirc;n cung cấp xe du lịch Suzuki , xe tải suzuki v&agrave; c&aacute;c dịch vụ d&agrave;nh cho xe &ocirc; t&ocirc; uy t&iacute;n tại TP Vinh. <br /> Với đội ngũ nh&acirc;n vi&ecirc;n sửa chữa bảo &ocirc; t&ocirc; được đ&agrave;o tạo chuy&ecirc;n nghiệp theo ti&ecirc;u chuẩn của nh&agrave; sản xuất. Xe của bạn sẽ được sữa chữa v&agrave; bảo h&agrave;nh ch&iacute;nh h&atilde;ng theo quy định của nh&agrave; sản xuất. Dịch vụ sửa chữa xe Suzuki v&agrave; thay thế phụ t&ugrave;ng ch&iacute;nh h&atilde;ng c&oacute; xuất xứ nguồn gốc r&otilde; r&agrave;ng, mang đến sự an t&acirc;m nhất cho Qu&yacute; kh&aacute;ch h&agrave;ng.</p>
                    <img style="width: 100%; margin: 20px 0 "src="{{ URL::asset('web/img/services/sevice1.png') }}" alt="">

                    <h4>TẠI SAO SUZUKI VINH LU&Ocirc;N L&Agrave; NƠI SỬA CHỮA &Ocirc; T&Ocirc;, XE TẢI ĐƯỢC TIN D&Ugrave;NG?</h4>
                   
                        <p>- Đội sửa chữa m&aacute;y gầm, điểm, thợ g&ograve;, thợ h&agrave;n v&agrave; thợ sơn được đ&agrave;o tạo c&oacute; tay nghề cao.<br /> - C&oacute; dụng cụ th&aacute;o lắp chuy&ecirc;n d&ugrave;ng, thiết bị phục vụ cho việc sửa chữa, hệ thống cầu n&acirc;ng, ph&ograve;ng sơn hiện đại.<br /> - Phụ t&ugrave;ng v&agrave; gi&aacute; cam kết ch&iacute;nh h&atilde;ng, n&oacute;i kh&ocirc;ng với h&agrave;ng nh&aacute;i h&agrave;ng lậu.<br /> - Xe được kiểm tra độ an to&agrave;n nhất, hệ thống ga, phanh xe đảm bảo xe xuất xưởng được an to&agrave;n nhất.</p>
                    <h4>1.SỬA CHỮA BẢO H&Agrave;NH H&Atilde;NG:</h4>
                    
                        <p>- Sửa chữa c&aacute;c hư hỏng, thay thế chi tiết do lỗi sản xuất của nh&agrave; sản xuất SUZUKI VIỆT NAM.<br /> - C&aacute;c chi tiết được thay thế, sữa chữa trong phạm vi bảo h&agrave;nh c&oacute; ghi trong sổ bảo h&agrave;nh. Sửa chữa bảo h&agrave;nh kh&ocirc;ng thay thế cụm chi tiết, to&agrave;n bộ động cơ hoặc cả xe với bất cứ l&yacute; do g&igrave;.</p>
                    <h4>2.SỬA CHỮA ĐỘNG CƠ, KHUNG GẦM, HỆ THỐNG ĐIỆN, HỆ THỐNG ĐIỀU H&Ograve;A NHIỆT ĐỘ:</h4>
                  
                        <p>- Sửa chữa lỗi hỏng h&oacute;c động cơ, hệ thống điện, m&aacute;y lạnh hoạt động kh&ocirc;ng ổn định hay kh&ocirc;ng đ&uacute;ng hiệu suất ti&ecirc;u chuẩn h&atilde;ng. Ch&uacute;ng t&ocirc;i sẽ khắc phục cho kh&aacute;ch h&agrave;ng (viet nam yamamoto) hoặc thay thế với thiết bị ch&iacute;nh h&atilde;ng.</p>
                    <h4>3.SỬA CHỮA TH&Acirc;N VỎ PHỤC HỒI XE TAI NẠN (SỬA CHỮA ĐỒNG SƠN):</h4>
                    
                        <p>- Sửa chữa nhỏ: Sửa chữa đồng sơn nhanh d&agrave;nh cho sửa chữa tai nạn nhẹ, trầy xướt, m&oacute;p m&eacute;o th&acirc;n vỏ xe t&ugrave;y theo mức độ cần sửa chữa ch&uacute;ng t&ocirc;i sẽ giảm thiểu thời gian sửa chữa cho kh&aacute;ch h&agrave;ng từ 1 đến 4 giờ. Trường hợp n&agrave;y được ưu ti&ecirc;n thực hiện dịch vụ.<br /> - Sửa chữa vừa v&agrave; lớn : L&agrave; c&aacute;c dịch vụ sửa chữa đồng sơn c&oacute; hỏng h&oacute;c từ 20% th&acirc;n vỏ xe trở l&ecirc;n, hoặc Sơn lại to&agrave;n bộ xe.</p>
                    <h4>SUZUKI VINH CAM KẾT VỚI QU&Yacute; KH&Aacute;CH H&Agrave;NG:</h4>
                    
                        <p>1. Kiểm tra xe chuy&ecirc;n nghiệp, ch&iacute;nh x&aacute;c lỗi <br />2. Bảng gi&aacute; c&aacute;c dịch vụ <br />3. Kỹ thuật vi&ecirc;n đ&agrave;o tạo chuy&ecirc;n nghiệp <br />4. Hỗ trợ kỹ thuật tr&ecirc;n đường, k&eacute;o xe <br />5. Ph&ograve;ng chờ thoải m&aacute;i, thuận tiện <br />6. Cung cấp phụ t&ugrave;ng ch&iacute;nh h&atilde;ng<br />7. Chỉ sửa khi kh&aacute;ch đồng &yacute;<br />8. Hotline hỗ trợ 24/7<br />9. Rửa xe miễn ph&iacute;<br />10. Dụng cụ ti&ecirc;u chuẩn</p>
                </div>
            </div>
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
<div class="news-promotion">
    <div class="container">
        <div class="news-promotion__title">
            <h3>TIN TỨC KHUYẾN MÃI</h3>
        </div>
        <div class="news-promotion__list">
            @foreach ($news as $new)
            <div class="news-promotion__item">
                <div class="news-promotion__item--title">
                    <a href="/tin-tuc/chi-tiet-tin-tuc/{{ $new->id }}">
                        <h5>
                            {{ $new->name }}
                        </h5>
                    </a>
                </div>
                <div class="news-promotion__item--date">
                    <p>{{ $new->created_at }}</p>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</div>

    @endsection()