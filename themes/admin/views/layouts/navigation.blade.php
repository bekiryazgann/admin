<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item">
            <a class="d-flex align-items-center"
               href="{{siteUrl()}}">
                <i class="fal fa-home-lg-alt"></i>
                <span class="menu-title text-truncate">
                    @trans(Yönetim Paneli)
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center"
               href="{{siteUrl('main/statistic')}}">
                <i class="far fa-chart-line"></i>
                <span class="menu-title text-truncate">
                    @trans(İstatistikler)
                </span>
            </a>
        </li>

        <li class="navigation-header">
            <span>@trans(Mağaza)</span>
        </li>

        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-shopping-bag"></i>
                <span class="menu-title text-truncate">
                    @trans(Siparişler)
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('orders')}}">
                        <i class="far fa-shopping-bag"></i>
                        <span class="menu-item text-truncate">
                            @trans(Siparişler)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('orders/payments')}}">
                        <i class="far fa-credit-card"></i>
                        <span class="menu-item text-truncate">
                            @trans(Ödemeler)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('orders/bills')}}">
                        <i class="far fa-receipt"></i>
                        <span class="menu-item text-truncate">
                            @trans(Faturalar)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('orders/cancellation-and-refund')}}">
                        <i class="far fa-undo-alt"></i>
                        <span class="menu-item text-truncate">
                            @trans(İptal ve İade)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('orders/basket-reminder')}}">
                        <i class="far fa-clock"></i>
                        <span class="menu-item text-truncate">
                            @trans(Sepet Hatırlatma)
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        @if(0 > 1)
            <li class="nav-item">
                <a class="d-flex align-items-center" href="{{siteUrl('b2b/orders')}}">
                    <i class="far fa-boxes"></i>
                    <span class="menu-title text-truncate">
                    @trans(B2B Siparişler)
                </span>
                    <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('b2b/orders')}}">
                            <i class="far fa-boxes"></i>
                            <span class="menu-item text-truncate">
                            @trans(Siparişler)
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('b2b/payments')}}">
                            <i class="far fa-credit-card"></i>
                            <span class="menu-item text-truncate">
                            @trans(Ödemeler)
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('b2b/invoices')}}">
                            <i class="far fa-receipt"></i>
                            <span class="menu-item text-truncate">
                            @trans(Faturalar)
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('b2b/cancellation-and-refund')}}">
                            <i class="far fa-undo-alt"></i>
                            <span class="menu-item text-truncate">
                            @trans(İptal İade)
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="nav-item">
            <a class="d-flex align-items-center" href="{{siteUrl('catalog')}}">
                <i class="far fa-layer-group"></i>
                <span class="menu-title text-truncate">
                    @trans(Katalog)
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('catalog')}}">
                        <i class="far fa-box"></i>
                        <span class="menu-item text-truncate">
                            @trans(Ürünler)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('catalog/categories')}}">
                        <i class="far fa-bars"></i>
                        <span class="menu-item text-truncate">
                            @trans(Kategoriler)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('catalog/brands')}}">
                        <i class="far fa-shield"></i>
                        <span class="menu-item text-truncate">
                            @trans(Markalar)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('catalog/filters')}}">
                        <i class="far fa-filter"></i>
                        <span class="menu-item text-truncate">
                            @trans(Filtreler)
                        </span>
                    </a>
                </li>
                @isset($a)
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('catalog/tags')}}">
                            <i class="far fa-tag"></i>
                            <span class="menu-item text-truncate">
                            @trans(Etiketler)
                        </span>
                        </a>
                    </li>
                @endisset
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-megaphone"></i>
                <span class="menu-title text-truncate">
                    @trans(Pazarlama)
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('marketing/coupons')}}">
                        <i class="far fa-arrow-alt-down"></i>
                        <span class="menu-item text-truncate">
                            @trans(Kuponlar)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('marketing/campaigns')}}">
                        <i class="far fa-bell"></i>
                        <span class="menu-item text-truncate">
                            @trans(Kampanyalar)
                        </span>
                    </a>
                </li>
                @isset($a)
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('marketing/newsletter')}}">
                            <i class="far fa-paper-plane"></i>
                            <span class="menu-item text-truncate">
                            @trans(Bülten Aboneliği)
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                @endisset
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('marketing/comments')}}">
                        <i class="far fa-comment"></i>
                        <span class="menu-item text-truncate">
                            @trans(Yorumlar)
                        </span>
                    </a>
                </li>
                @isset($a)
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('marketing/google-ads')}}">
                            <i class="fab fa-google"></i>
                            <span class="menu-item text-truncate">
                            @trans(Google Reklamlar)
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('marketing/meta-ads')}}">
                            <i class="fab fa-facebook"></i>
                            <span class="menu-item text-truncate">
                            @trans(Meta Reklamlar)
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                @endisset
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-user-tag"></i>
                <span class="menu-title text-truncate">
                    @trans(Müşteriler)
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('customers/customers')}}">
                        <i class="far fa-person-carry"></i>
                        <span class="menu-item text-truncate">
                            @trans(Müşteriler)
                        </span>
                    </a>
                </li>
                @isset($a)
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('customers/b2b-customers')}}">
                            <i class="far fa-person-dolly"></i>
                            <span class="menu-item text-truncate">
                            @trans(B2B Müşteriler)
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                @endisset
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-text-size"></i>
                <span class="menu-title text-truncate">
                    @trans(İçerikler)
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('contents/pages')}}">
                        <i class="far fa-pager"></i>
                        <span class="menu-item text-truncate">
                            @trans(Sayfalar)
                        </span>
                    </a>
                </li>
                @if(1 !== 1)
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('contents/blogs')}}">
                            <i class="far fa-quote-right"></i>
                            <span class="menu-item text-truncate">
                            @trans(Bloglar)
                        </span>
                        </a>
                    </li>
                @endif
                @isset($a)
                    <li>
                        <a class="d-flex align-items-center justify-content-between" href="javascript: void(0);">
                            <i class="far fa-file-contract"></i>
                            <span class="menu-item text-truncate">
                            @trans(Sözleşmeler)
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                @endisset
                @if(1 !== 1)
                    <li>
                        <a class="d-flex align-items-center" href="{{siteUrl('contents/frequently-asked-questions')}}">
                            <i class="far fa-question"></i>
                            <span class="menu-item text-truncate">
                            @trans(SS Sorular)
                        </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-bezier-curve"></i>
                <span class="menu-title text-truncate">
                    @trans(Tasarım Ayarları)
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('web-builder')}}">
                        <i class="far fa-window-restore"></i>
                        <span class="menu-item text-truncate">
                            @trans(Tasarımı Özelleştir)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('design-settings/menu-settings')}}">
                        <i class="far fa-sliders-h"></i>
                        <span class="menu-item text-truncate">
                            @trans(Menü Ayarları)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('design-settings/slider-settings')}}">
                        <i class="far fa-images"></i>
                        <span class="menu-item text-truncate">
                            @trans(Slider Ayarları)
                        </span>
                    </a>
                </li>
                @if(1 !== 1)
                    <li>
                        <a class="d-flex align-items-center" href="javascript: void(0);">
                            <i class="far fa-rectangle-landscape"></i>
                            <span class="menu-item text-truncate">
                            @trans(Banner Ayarları)
                        </span>
                        </a>
                    </li>
                @endif
                <li>
                    <a class="d-flex align-items-center" href="javascript: void(0);">
                        <i class="far fa-share-alt"></i>
                        <span class="menu-item text-truncate">
                            @trans(Sosyal Medya)
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-cog"></i>
                <span class="menu-title text-truncate">
                    @trans(Ayarlar)
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('settings/system-settings')}}">
                        <i class="far fa-server"></i>
                        <span class="menu-item text-truncate">
                            @trans(Sistem Ayarları)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{siteUrl('settings/payment-settings')}}">
                        <i class="far fa-credit-card-front"></i>
                        <span class="menu-item text-truncate">
                            @trans(Ödeme Ayarları)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="javascript: void(0);">
                        <i class="far fa-truck"></i>
                        <span class="menu-item text-truncate">
                            @trans(Kargo Ayarları)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="javascript: void(0);">
                        <i class="far fa-at"></i>
                        <span class="menu-item text-truncate">
                            @trans(E-posta Ayarları)
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="javascript: void(0);">
                        <i class="far fa-phone-alt"></i>
                        <span class="menu-item text-truncate">
                            @trans(İletişim Ayarları)
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        @if(1 !== 1)
            <li class="nav-item">
                <a class="d-flex align-items-center" href="javascript: void(0);">
                    <i data-feather="mail"></i>
                    <span class="menu-title text-truncate">
                    @trans(Uygulamalar)
                </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="javascript: void(0);">
                            <i data-feather="message-square"></i>
                            <span class="menu-item text-truncate">
                            @trans(Uygulamalarım)
                        </span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="javascript: void(0);">
                            <i data-feather="message-square"></i>
                            <span class="menu-item text-truncate">
                            @trans(Uygulama Mağazası)
                        </span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="navigation-header">
            <span>@trans(ARAÇLAR)</span>
        </li>
        @isset($a)
            <li class="nav-item">
                <a class="d-flex align-items-center"
                   href="javascript: void(0);">
                    <i class="far fa-image"></i>
                    <span class="menu-title text-truncate">
                    @trans(Görsel Düzenleyici)
                </span>
                </a>
            </li>
        @endisset
        <li class=" nav-item">
            <a class="d-flex align-items-center"
               href="{{siteUrl('media-manager')}}">
                <i class="far fa-photo-video"></i>
                <span class="menu-title text-truncate">
                    @trans(Medya Yöneticisi)
                </span>
            </a>
        </li>
        <li class="navigation-header">
            <span>@trans(YÖNETİM)</span>
        </li>
        <li class=" nav-item">
            <a class="d-flex align-items-center"
               href="{{siteUrl('my-account')}}">
                <i class="far fa-user"></i>
                <span class="menu-title text-truncate">
                    @trans(Hesabım)
                </span>
            </a>
        </li>
        <li class=" nav-item">
            <a class="d-flex align-items-center"
               href="{{siteUrl('users')}}">
                <i class="far fa-users"></i>
                <span class="menu-title text-truncate">
                    @trans(Kullanıcılar)
                </span>
            </a>
        </li>
    </ul>
</div>