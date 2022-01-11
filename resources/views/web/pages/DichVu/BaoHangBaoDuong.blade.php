@extends('web.layouts.master')
@section('content')
<div class="home-1" style="background-image: url('{{ URL::asset('web/img/background/banner.png') }}')"></div>
<div class="detail-1">
    <div class="container">
        <p>Dịch vụ > Bảo dưởng, bảo hành</p>
    </div>
</div>
<div class="services">
    <div class="container">
        <div class="services__title">
            <h2>Bảo Dưỡng, bảo hành</h2>
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
                        class="services__content-header--item services__content-header--item--active">
                        <img src="{{ URL::asset('web/img/logo/icondichvu1.png')}} " alt="" />
                        <p>BẢO DƯỠNG, BẢO HÀNH</p>
                    </a>
                    <a href="/dich-vu/sua-chua-xe-suzuki" class="services__content-header--item">
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
                <div class="services__content--context ">
                    <p>
                        Suzuki Vinh được lắp đặt trang thiết bị hiện đại theo ti&ecirc;u chuẩn quốc tế: M&aacute;y chẩn
                        đo&aacute;n hư hỏng v&agrave; hướng dẫn sửa chữa GDS của Suzuki, thiết bị k&eacute;o nắn khung,
                        ph&ograve;ng sơn ti&ecirc;u chuẩn, thiết bị sửa chữa nhanh
                        v&agrave; nhiều trang thiết bị hiện đại v&agrave; dụng cụ chuy&ecirc;n d&ugrave;ng
                        kh&aacute;c&hellip; c&ugrave;ng đội ngũ nh&acirc;n vi&ecirc;n b&aacute;n h&agrave;ng, dịch vụ
                        được đ&agrave;o tạo b&agrave;i bản, chuy&ecirc;n
                        nghiệp, c&oacute; khả năng đ&aacute;p ứng nhanh nhất v&agrave; l&agrave;m h&agrave;i l&ograve;ng
                        tất cả c&aacute;c nhu cầu kh&aacute;ch h&agrave;ng.
                    </p>
                    <p>
                        - Là m&ocirc;̣t trong những Đại lý 3S chính thức của Suzuki Việt Nam, Qu&yacute;
                        kh&aacute;ch c&oacute; thể ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m với chất lượng dịch vụ,
                        bảo h&agrave;nh v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng của
                        ch&uacute;ng t&ocirc;i.
                    </p>
                    <p>
                        - Suzuki Vinh l&agrave; đại l&yacute; ch&iacute;nh h&atilde;ng Suzuki lớn nhất khu vực Miền
                        Trung.
                    </p>
                    <p>
                        - Suzuki Vinh l&agrave; đại l&yacute; c&oacute; doanh số xe &ocirc; t&ocirc; lớn nhất
                        to&agrave;n quốc.
                    </p>
                    <p>
                        - Qu&yacute; kh&aacute;ch ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m với hệ thống thẻ thanh
                        vi&ecirc;n ưu đ&atilde;i cho c&aacute;c dịch vụ hậu b&aacute;n h&agrave;ng.
                    </p>
                    <p>
                        - C&oacute; xưởng đồng sơn đạt chất lượng của Suzuki to&agrave;n cầu.
                    </p>
                    <p>- Li&ecirc;n kết đầu đủ c&aacute;c đơn vị bảo hiểm.</p>
                    <p>
                        - Xưởng đ&oacute;ng th&ugrave;ng xe tải Suzuki Vinh được cục Đăng kiểm Việt Nam cấp giấy chứng
                        nhận; Cơ sở sản xuất, lăp r&aacute;p th&ugrave;ng xe &ocirc; t&ocirc; tải theo ti&ecirc;u chuẩn
                        của Cục Đăng kiểm.
                    </p>

                    <div class="tableofcontents ">
                        <div class="title ">MỤC LỤC</div>
                        <p>1.THỜI HẠN BẢO H&Agrave;NH</p>
                        <p>2. ĐIỆU KIỆN BẢO H&Agrave;NH</p>
                        <p>3. THAY ĐỔI THIẾT KẾ</p>
                        <p>
                            4. THAY ĐỔI CHỦ SỞ HỮU V&Agrave; SỬ DỤNG XE Ở NƯỚC NGO&Agrave;I
                        </p>
                        <p>5. BẢO DƯỠN ĐỊNH KỲ MIỄN PH&Iacute;</p>
                        <p>6. TR&Aacute;CH NHIỆM BẢO H&Agrave;NH</p>
                        <p>7. SỮA CHỮA BẢO H&Agrave;NH</p>
                        <p>8. TR&Aacute;CH NHIỆM CỦA KH&Aacute;CH H&Agrave;NG</p>
                    </div>
                    <h4>1.THỜI HẠN BẢO H&Agrave;NH</h4>
                    <p class="indent ">Thời hạn bảo h&agrave;nh cho xe &ocirc; t&ocirc; Suzuki l&agrave; 36 th&aacute;ng
                        kể từ ng&agrave;y giao xe cho người chủ đầu ti&ecirc;n hay ng&agrave;y đăng k&yacute; bảo
                        h&agrave;nh hoặc l&agrave; cho đến khi xe chạy được
                        100.000 km, t&ugrave;y theo trường hợp n&agrave;o xảy ra trước.</p>
                    <h4>2.ĐIỀU KIỆN BẢO H&Agrave;NH</h4>
                    <p>- Xe phải được b&aacute;n, được ho&agrave;n chỉnh, v&agrave; kiểm tra bởi c&aacute;c Đại
                        L&yacute; của Suzuki Vinh.</p>
                    <p>- Phiếu Bảo H&agrave;nh phải được điền đầy đủ chi tiết v&agrave; gửi về trong v&ograve;ng 10
                        ng&agrave;y sau khi giao xe cho người chủ đầu ti&ecirc;n.</p>
                    <p>- Xe phải được vận h&agrave;nh đ&uacute;ng theo những chỉ dẫn trong S&aacute;ch Hướng Dẫn Sử Dụng
                        v&agrave; phải được kiểm tra, bảo dưỡng định kỳ thực hiện bởi Đại L&yacute; của C&ocirc;ng ty
                        S&agrave;i G&ograve;n Ng&ocirc;i
                        Sao ph&ugrave; hợp với những chỉ dẫn trong S&aacute;ch Hướng Dẫn Sử Dụng đầy đủ.</p>
                    <h4>3.THAY ĐỔI THIẾT KẾ</h4>
                    <p class="indent ">Suzuki Vinh được quy&ecirc;̀n, v&agrave;o b&acirc;́t cứ l&uacute;c n&agrave;o,
                        thay đ&ocirc;̉i thi&ecirc;́t k&ecirc;́ hay c&aacute;c đặc t&iacute;nh kỹ thu&acirc;̣t của
                        b&acirc;́t kỳ chi ti&ecirc;́t, b&acirc;́t kỳ ki&ecirc;̉u
                        xe n&agrave;o m&agrave; kh&ocirc;ng c&acirc;̀n th&ocirc;ng b&aacute;o cũng như kh&ocirc;ng
                        c&oacute; tr&aacute;ch nhi&ecirc;̣m thực hi&ecirc;̣n vi&ecirc;̣c thay đ&ocirc;̉i tương tự
                        đ&ocirc;́i với những xe đ&atilde; sản
                        xu&acirc;́t trước đ&oacute;.</p>
                    <h4>4.THAY Đ&Ocirc;̉I CHỦ SỞ HỮU V&Agrave; SỬ DỤNG XE Ở NƯỚC NGO&Agrave;I</h4>
                    <p>- Thời gian bảo h&agrave;nh c&ograve;n lại sẽ v&acirc;̃n c&oacute; hi&ecirc;̣u lực đ&ocirc;́i với
                        chủ xe mới n&ecirc;́u c&aacute;c chi ti&ecirc;́t v&ecirc;̀ vi&ecirc;̣c chuy&ecirc;̉n đ&ocirc;̉i
                        chủ sỡ hữu xe được th&ocirc;ng
                        b&aacute;o cho C&ocirc;ng ty S&agrave;i G&ograve;n Ng&ocirc;i Sao.</p>
                    <p>- Vi&ecirc;̣c bảo h&agrave;nh chỉ c&oacute; hi&ecirc;̣u lực tại qu&ocirc;́c gia nơi xe được đăng
                        k&yacute; l&acirc;̀n thứ nh&acirc;́t.</p>
                    <h4>5.BẢO DƯỠNG ĐỊNH KỲ MIỄN PH&Iacute;</h4>
                    <p>- Xe của bạn sẽ được kiểm tra bảo dưỡng miễn ph&iacute; c&ocirc;ng 3 lần ở 1.000km (1
                        th&aacute;ng), 7.500km (6 th&aacute;ng), 15.000km (12 th&aacute;ng).</p>
                    <p>- Những lần kiểm tra bảo dưỡng ngo&agrave;i những lần kiểm tra bảo dưỡng định kỳ miễn ph&iacute;,
                        kh&aacute;ch h&agrave;ng c&oacute; tr&aacute;ch nhiệm trả tiền c&ocirc;ng v&agrave; cho những
                        phụ t&ugrave;ng, vật liệu thay
                        thế.
                    </p>
                    <h4>6.TR&Aacute;CH NHIỆM BẢO H&Agrave;NH</h4>
                    <p>- Nếu c&oacute; bất kỳ hư hỏng n&agrave;o xảy ra đối với xe Suzuki thỏa m&atilde;n c&aacute;c
                        điều kiện bảo h&agrave;nh, Suzuki Vinh chịu tr&aacute;ch nhiệm thay thế miễn ph&iacute;
                        ho&agrave;n to&agrave;n tất cả c&aacute;c
                        chi tiết hư hỏng bằng phụ t&ugrave;ng mới hay tương đương nếu Suzuki Vinh x&aacute;c nhận rằng
                        nguy&ecirc;n nh&acirc;n hư hỏng l&agrave; do chất lượng vật liệu hay do sai s&oacute;t trong
                        qu&aacute; tr&igrave;nh sản xuất.
                        Điều lệ bảo h&agrave;nh n&agrave;y &aacute;p dụng để sửa chữa hay thay thế chỉ c&aacute;c chi
                        tiết bị hư hỏng v&agrave; khắc phục ho&agrave;n hảo c&aacute;c sự cố hư hỏng. Điều lệ bảo
                        h&agrave;nh n&agrave;y kh&ocirc;ng
                        &aacute;p dụng để thay thế cụm chi tiết, to&agrave;n bộ động cơ hay cả xe với bất cứ l&yacute;
                        do n&agrave;o.</p>
                    <p>- Kh&aacute;ch h&agrave;ng c&oacute; tr&aacute;ch nhiệm chi trả ph&iacute; tổn đối với c&aacute;c
                        c&ocirc;ng việc sửa chữa kh&ocirc;ng thuộc phạm vi bảo h&agrave;nh.</p>
                    <h4>7.SỬA CHỮA BẢO H&Agrave;NH</h4>
                    <p>a) Vi&ecirc;̣c sửa chữa, thay th&ecirc;́ c&aacute;c chi ti&ecirc;́t hư hỏng v&agrave; giải
                        quy&ecirc;́t c&aacute;c khi&ecirc;́u nại v&ecirc;̀ bảo h&agrave;nh của kh&aacute;ch h&agrave;ng
                        phải được thực hi&ecirc;̣n bởi Suzuki
                        Vinh.
                    </p>
                    <p>b) T&acirc;́t cả c&aacute;c chi ti&ecirc;́t được thay th&ecirc;́ trong phạm vi bảo h&agrave;nh sẽ
                        thu&ocirc;̣c sở hữu của Suzuki Vinh.</p>
                    <p>c) Phụ t&ugrave;ng ch&iacute;nh g&ocirc;́c của SUZUKI phải được d&ugrave;ng đ&ecirc;̉ thay
                        th&ecirc;́ cho t&acirc;́t cả c&aacute;c chi ti&ecirc;́t hư hỏng thu&ocirc;̣c phạm vi bảo
                        h&agrave;nh.</p>
                    <p>d) Khi thay th&ecirc;́ c&aacute;c chi ti&ecirc;́t trong phạm vi bảo h&agrave;nh, c&aacute;c
                        th&aacute;o lắp phụ thu&ocirc;̣c phải giới hạn trong phạm vi &iacute;t nh&acirc;́t c&oacute;
                        th&ecirc;̉ được như đ&atilde; m&ocirc;
                        tả trong s&aacute;ch Parts catalogue.</p>
                    <p>e) C&aacute;c chi ti&ecirc;́t được thay th&ecirc;́ hoặc sửa chữa trong phạm vi bảo h&agrave;nh
                        chỉ được bảo đảm trong phạm vi thời gian bảo h&agrave;nh g&ocirc;́c của xe.</p>
                    <h4>8.TR&Aacute;CH NHIỆM CỦA KH&Aacute;CH H&Agrave;NG</h4>
                    <p>a) Kiểm tra chắc chắn rằng cửa h&agrave;ng m&agrave; bạn mua xe l&agrave; Đại l&yacute; ủy nhiệm
                        ch&iacute;nh thức của Suzuki Vinh.</p>
                    <p>b) Đọc kỹ Điều Lệ Bảo H&agrave;nh.</p>
                    <p>c) Kiểm tra chắc chắn rằng Phiếu Bảo H&agrave;nh đ&atilde; được điền đầy đủ bao gồm cả chữ
                        k&yacute; của bạn, của đại diện Đại l&yacute; v&agrave; được Đại l&yacute; đ&oacute;ng dấu hợp
                        lệ.</p>
                    <p>d) Thực hiện kiểm tra bảo dưỡng định kỳ đầy đủ cho xe bạn tại c&aacute;cĐại l&yacute; ủy nhiệm
                        của Suzuki Vinh v&agrave; lưu giữ đầy đủ nhữngGhi Nhận Kiểm Tra Bảo Dưỡng Định Kỳ.</p>
                    <p>e) Kiểm tra chắc chắn rằng Đại l&yacute; thực hiện đ&uacute;ng v&agrave; đầy đủ c&aacute;c
                        c&ocirc;ng việc kiểm tra bảo dưỡng định kỳ cho chiếc xe của bạn.</p>
                    <p>f ) Xuất tr&igrave;nh Sổ Bảo H&agrave;nh mỗi khi bạn đưa xe đến Đại l&yacute; để tiếp nhận
                        c&aacute;c dịch vụ hậu m&atilde;i.</p>
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