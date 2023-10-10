<!DOCTYPE html>
<html class="loading light-layout" lang="en" data-layout="light-layout"
      data-textdirection="ltr">
<head>
    <!--
     ________________ ________________
    |***************/|***************/
    |************/   |************/
    |*********/      |*********/
    |******/         |******/
    |***/            |***/
    |/_______________|/_______________
    |***************/|***************/
    |************/   |************/
    |*********/      |*********/
    |******/         |******/
    |***/            |***/
    |/               |/

      ____
     / ___|  ___   ___ ___  _ __ ___
     \___ \ / _ \ / __/ _ \| '__/ _ \
      ___) | (_) | (_| (_) | | |  __/
     |____/ \___/ \___\___/|_| _\___|
     |  _ \(_) __ _(_) |_ __ _| |
     | | | | |/ _\` | | __/ _\` | |
     | |_| | | (_| | | || (_| | |
     |____/|_|\__, |_|\__\__|_|_|
     / ___| _ |___/__| |_ ___ _ __ ___  ___
     \___ \| | | / __| __/ _ \ '_ \` _ \/ __|
      ___) | |_| \__ \ ||  __/ | | | | \__ \
     |____/ \__, |___/\__\___|_| |_| |_|___/
            |___/
    Powered By Eskiz.psd Creative Studio
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <meta name="description" content="{{sysConfig('SYS_DESCRIPTION')}}">
    <meta name="keywords" content="{{sysConfig('SYS_KEYWORDS')}}">
    <meta name="author" content="{{sysConfig('SYS_AUTHOR')}}">
    <title>@yield('title') - {{sysConfig('SYS_TITLE_PREFIX')}}</title>
    <link rel="apple-touch-icon" href="{{themeAssets('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{themeAssets('app-assets/images/ico/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/fonts/montserrat/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('vendor.min.css')}}">
    <script src="{{themeAssets('app-assets/css/plugins/tinymce/tinymce.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{themeAssets('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('assets/css/web-builder-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/dist/draggable.bundle.css">
    <style>
        .select2-selection.select2-selection--single{
            width: 200px!important;
        }
        .select2-search.select2-search--dropdown{
            display: none!important;
        }
        .draggable-mirror{
            width: 100%;
        }
    </style>
    <script>
        let element, data;
    </script>
    @yield('styles')
</head>
<body class="vertical-layout vertical-menu-modern navbar-floating footer-static"
      style="overflow: hidden!important;"
      data-open="click"
      data-menu="vertical-menu-modern"
      data-col="">
<div class='fallback-spinner app-loader'>
    <div class="fallback-logo">
        <svg version="1.1"
             id="Layer_1"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px"
             y="0px"
             style="enable-background:new 0 0 557.82 141.73;"
             xml:space="preserve"
             viewBox="0 0 141.73 141.73"
             width="60"
             height="60">
            <g>
                <g>
                    <path class="st0"
                          d="M72.48,134.48l0-61.69l61.69,0c0.79,0,1.46,0.31,1.93,0.79c0.98,0.99,1.16,2.7,0,3.86l-29.48,29.48 l-29.48,29.48c-0.43,0.43-0.93,0.68-1.45,0.76C74.14,137.44,72.48,136.3,72.48,134.48z"></path>
                    <path class="st0"
                          d="M72.48,72.79l0-68.27l61.69,0c0.87,0,1.59,0.38,2.07,0.94c0.86,1.01,0.96,2.61-0.14,3.71l-29.48,29.48 L72.48,72.79z"></path>
                    <path class="st0"
                          d="M4.21,134.48l0-61.69h68.27l-34.13,34.13L8.87,136.41c-1.05,1.05-2.56,1-3.57,0.25 C4.66,136.18,4.21,135.42,4.21,134.48z"></path>
                    <path class="st1"
                          d="M4.21,72.79l0-65.54c0-0.75,0.31-1.43,0.8-1.93c0.49-0.49,1.18-0.8,1.93-0.8l65.54,0L38.35,38.66L4.21,72.79z"></path>
                </g>
            </g>
        </svg>
    </div>
    <div class='loading'>
        <div class='effect-1 effects'></div>
        <div class='effect-2 effects'></div>
        <div class='effect-3 effects'></div>
    </div>
</div>
@include('web-builder.layouts.topNavbar')
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow"
     data-scroll-to-active="true">
    @include('web-builder.layouts.navigation')
</div>
<div class="app-content content @yield('contentClass')">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper" style="padding-left: 0!important;padding-right: 0!important;">
        @yield('content')
    </div>
</div>
<div class="offcanvas offcanvas-start web-builder-canvas"
     tabindex="-1"
     id="canvas"
     data-bs-backdrop="false"
     data-bs-scroll="true"
     aria-modal="true"
     role="dialog"
     aria-labelledby="offcanvasEndLabel"></div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
@include('web-builder.layouts.scripts')
@include('media.popup')
<div class="modal fade newComponentModal"
     id="newComponentModal"
     tabindex="-1"
     aria-labelledby="newComponentModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth">
        <div class="modal-content">
            <div class="modal-header bg-transparent" style="border-bottom: 1px solid #3b4253;">
                <h3 class="modal-title"> Lütfen eklemek istediğiniz bileşeni seçin. </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2 mx-50 overflow-scroll h-100" style="height: calc(100vh / 2) !important">
                <div class="row custom-options-checkable g-1">
                    <div class="col-md-12">
                        <input class="custom-option-item-check" disabled type="checkbox" name="customOptionsCheckableRadios" id="customOptionsCheckableRadios1">
                        <label class="custom-option-item p-1 d-flex align-items-center" for="customOptionsCheckableRadios1">
                            <div style="width: 100%">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">Header - 1</span>
                                </span>
                                <small class="d-block">Bu bileşen şık, sade tasarımlıdır. Teknolojik ürünler satan firmalara daha uygundur.</small>
                            </div>
                            <button class="fw-bolder btn btn-primary">Ekle</button>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <input class="custom-option-item-check" disabled type="checkbox" name="customOptionsCheckableRadios" id="customOptionsCheckableRadios1">
                        <label class="custom-option-item p-1 d-flex align-items-center" for="customOptionsCheckableRadios1">
                            <div style="width: 100%">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">Header - 2</span>
                                </span>
                                <small class="d-block">Bu bileşen şık, sade tasarımlıdır. Teknolojik ürünler satan firmalara daha uygundur.</small>
                            </div>
                            <button class="fw-bolder btn btn-primary">Ekle</button>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <input class="custom-option-item-check" disabled type="checkbox" name="customOptionsCheckableRadios" id="customOptionsCheckableRadios1">
                        <label class="custom-option-item p-1 d-flex align-items-center" for="customOptionsCheckableRadios1">
                            <div style="width: 100%">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">Header - 3</span>
                                </span>
                                <small class="d-block">Bu bileşen şık, sade tasarımlıdır. Teknolojik ürünler satan firmalara daha uygundur.</small>
                            </div>
                            <button class="fw-bolder btn btn-primary">Ekle</button>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <input class="custom-option-item-check" disabled type="checkbox" name="customOptionsCheckableRadios" id="customOptionsCheckableRadios1">
                        <label class="custom-option-item p-1 d-flex align-items-center" for="customOptionsCheckableRadios1">
                            <div style="width: 100%">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">Header - 4</span>
                                </span>
                                <small class="d-block">Bu bileşen şık, sade tasarımlıdır. Teknolojik ürünler satan firmalara daha uygundur.</small>
                            </div>
                            <button class="fw-bolder btn btn-primary">Ekle</button>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <input class="custom-option-item-check" disabled type="checkbox" name="customOptionsCheckableRadios" id="customOptionsCheckableRadios1">
                        <label class="custom-option-item p-1 d-flex align-items-center" for="customOptionsCheckableRadios1">
                            <div style="width: 100%">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">Header - 5</span>
                                </span>
                                <small class="d-block">Bu bileşen şık, sade tasarımlıdır. Teknolojik ürünler satan firmalara daha uygundur.</small>
                            </div>
                            <button class="fw-bolder btn btn-primary">Ekle</button>
                        </label>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@yield('scripts')
<script src="{{siteUrl('last-data-load')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.8/lib/sortable.min.js"></script>
<script src="{{themeAssets('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{themeAssets('assets/js/util/iframe.js')}}"></script>
<script src="{{themeAssets('assets/js/web-builder.js')}}"></script>
</body>
</html>
