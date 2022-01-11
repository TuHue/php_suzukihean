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
                        <h5 style="font-weight: bold">Xe du lịch</h5>
                        <div class="header-nav-item__cars--list">
                            @foreach ($danhsachOto as $Oto)
                            <a href="/cua-hang/o-to/{{ $Oto->id }}" class="header-nav-item__cars--item" style="margin:1rem;">
                                <img src="{{ $Oto->image }}" alt="" style="width: 120px; height: 60px" />
                                <p>{{ $Oto->name }}</p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="header-nav-item__cars">
                        <h5  style="font-weight: bold">Xe du lịch</h5>
                        <div class="header-nav-item__cars--list">
                            @foreach ($danhsachXeTai as $Xetai)
                            <a href="/cua-hang/xe-tai/{{ $Xetai->id }}" class="header-nav-item__cars--item"  style="margin:1rem;">
                                <img src="{{ $Xetai->image }}" alt=""  style="width: 120px; height: 60px" />
                                <p>{{ $Xetai->name }}</p>
                            </a>
                            @endforeach
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