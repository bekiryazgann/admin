<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl mx-auto"
     style="margin-right: calc(auto + var(--bs-gutter-x, 1rem)); margin-left: calc(auto + var(--bs-gutter-x, 1rem));box-sizing: border-box">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link"
                       href="{{siteUrl('app/mail')}}"
                       data-bs-toggle="tooltip"
                       data-bs-placement="bottom"
                       title="@trans(Mail)">
                        <i class="ficon" data-feather="mail"></i>
                    </a>
                </li>
            </ul>
        </div>

        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle"
                   target="_blank"
                   href="{{siteUrl()}}">
                    <i class="far fa-eye"></i>
                    <span class="selected-language">@trans(Önizleme)</span>
                </a>
            </li>
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style">
                    <i class="ficon" data-feather="sun"></i>
                </a>
            </li>
            <li class="nav-item nav-search">
                <a class="nav-link nav-link-search">
                    <i class="ficon" data-feather="search"></i>
                </a>
                <div class="search-input">
                    <div class="search-input-icon">
                        <i data-feather="search"></i>
                    </div>
                    <input class="form-control input"
                           type="text"
                           placeholder="@trans(Yönetim Panelinde Arayın)"
                           tabindex="-1"
                           data-search="search">
                    <div class="search-input-close">
                        <i data-feather="x"></i>
                    </div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-notification me-25">
                <a class="nav-link" href="#" data-bs-toggle="dropdown">
                    <i class="ficon" data-feather="bell"></i>
                    <span class="badge rounded-pill bg-danger badge-up">4</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">@trans(Bildirimler)</h4>
                            <div class="badge rounded-pill badge-light-primary">6 @trans(Yeni)</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
                        <div class="alert alert-info p-2 m-1">
                            <div class="text-center alert-body" style="font-size: 20px; text-align: center;"> Yakında </div>
                        </div>
                       @if(1 !== 1)
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar">
                                            <img src="{{themeAssets('app-assets/images/portrait/small/avatar-s-15.jpg')}}"
                                                 alt="avatar"
                                                 width="32"
                                                 height="32">
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading">
                                            <span class="fw-bolder">Tebrikler Sam 🎉kazanan!</p>
                                        <small class="notification-text"> Aylık en çok satan rozetini kazandı.</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar"><img src="{{themeAssets('app-assets/images/portrait/small/avatar-s-3.jpg')}}" alt="avatar" width="32" height="32"></div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">New message</span>&nbsp;received</p><small class="notification-text"> You have 10 unread messages</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content">MD</div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Revised Order 👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order updated</small>
                                    </div>
                                </div>
                            </a>
                            <div class="list-item d-flex align-items-center">
                                <h6 class="fw-bolder me-auto mb-0">@trans(Sistem Bildirimleri)</h6>
                                <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                            </div>
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to high CPU usage</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-success">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Sales report</span>&nbsp;generated</p><small class="notification-text"> Last month sales report generated</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-warning">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
                                    </div>
                                </div>
                            </a>
                       @endif
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Tümünü Gör...</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link"
                   id="dropdown-user"
                   href="#"
                   data-bs-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        @php
                            $userDetail = \Illuminate\Database\Capsule\Manager::table('user')
                                ->where('user_key', '=', auth()->get('login'))
                                ->get()
                                ->all()['0'];
                        @endphp
                        <span class="user-name fw-bolder">{{$userDetail->firstname}} {{$userDetail->lastname}}</span>
                        <span class="user-status">@trans(Yönetici)</span>
                    </div>
                    <span class="avatar">
                        <img class="round"
                             src="{{imageUrl($userDetail->profile_photo)}}"
                             alt="avatar"
                             id="topNavbarPP"
                             height="40"
                             width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end"
                     aria-labelledby="dropdown-user">
                    <a class="dropdown-item"
                       href="{{siteUrl('my-account')}}">
                        <i class="me-50" data-feather="settings"></i>
                        @trans(Ayarlar)
                    </a>
                    <a class="dropdown-item"
                       href="{{siteUrl('app/mail')}}">
                        <i class="me-50" data-feather="mail"></i>
                        @trans(E-posta)
                    </a>
                    <a class="dropdown-item"
                       href="{{siteUrl('auth/logout')}}">
                        <i class="me-50" data-feather="power"></i>
                        @trans(Çıkış Yap)
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->