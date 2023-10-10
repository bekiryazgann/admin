<?php
    $layout = \Illuminate\Database\Capsule\Manager::table('user')
        ->where('user_key', auth()->get('login'))
        ->get()
        ->all()[0]->layout;
?><!DOCTYPE html>
<html class="loading {{$layout}}" lang="en" data-layout="{{$layout}}"
      data-textdirection="ltr">
<head>
    <!--

    ███████████████ ███████████████
    ████████████    ████████████
    █████████       █████████
    ██████          ██████
    ███             ███
    █               █
    ███████████████ ███████████████
    ████████████    ████████████
    █████████       █████████
    ██████          ██████
    ███             ███
    █               █


    ███████╗ ██████╗  ██████╗ ██████╗ ██████╗ ███████╗
    ██╔════╝██╔═══██╗██╔════╝██╔═══██╗██╔══██╗██╔════╝
    ███████╗██║   ██║██║     ██║   ██║██████╔╝█████╗
    ╚════██║██║   ██║██║     ██║   ██║██╔══██╗██╔══╝
    ███████║╚██████╔╝╚██████╗╚██████╔╝██║  ██║███████╗
    ╚══════╝ ╚═════╝  ╚═════╝ ╚═════╝ ╚═╝  ╚═╝╚══════╝

    @if(1 !== 1)
     ____
    / ___|  ___   ___ ___  _ __ ___
    \___ \ / _ \ / __/ _ \| '__/ _ \
     ___) | (_) | (_| (_) | | |  __/
    |____/ \___/ \___\___/|_| _\___|
    |  _ \(_) __ _(_) |_ __ _| |
    | | | | |/ _\` | | __/ _\` | |
    | |_| | | (_| | | || (_| | |
    |____/|_|\__, |_|\__\__,_|_|
    / ___| _ |___/__| |_ ___ _ __ ___  ___
    \___ \| | | / __| __/ _ \ '_ \` _ \/ __|
     ___) | |_| \__ \ ||  __/ | | | | \__ \
    |____/ \__, |___/\__\___|_| |_| |_|___/
           |___/
@endif
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
    <script src="{{themeAssets('assets/js/media.js')}}"></script>
    @yield('styles')
</head>
<body class="vertical-layout vertical-menu-modern navbar-floating footer-static"
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
@include('layouts.topNavbar')
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow"
     data-scroll-to-active="true">
    @include('layouts.headerNavbar')
    @include('layouts.navigation')
</div>
<div class="app-content content @yield('contentClass')">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl" style="padding-left: 0!important;padding-right: 0!important;">
        @yield('content')
    </div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
@include('layouts.scripts')
@include('media.popup')
@yield('scripts')
<script src="{{siteUrl('last-data-load')}}"></script>
</body>
</html>