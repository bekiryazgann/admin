<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<head>
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
    @yield('styles')
</head>
<body class="vertical-layout vertical-menu-modern navbar-floating footer-static"
      data-open="click"
      data-menu="vertical-menu-modern"
      data-col="">
@include('theme-editor.components.top-bar')
<div class="app-content content @yield('contentClass')">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl" style="padding-left: 0!important;padding-right: 0!important;">
        @yield('content')
    </div>
</div>
@include('layouts.scripts')
@include('media.popup')
@yield('scripts')
<script>
    $("#selectMedia").on("hidden.bs.modal",function(e){$("#selectMedia input.media-select").each(function(e,t){t.checked=!1})}),$("#selectMedia").on("show.bs.modal",function(e){$.post(url+"api/getModal",{modal:"media-content"},function(e){$("#selectMedia").html(e.html)},"json")}),$(window).on("load",function(){feather&&feather.replace({width:14,height:14})});
</script>
</body>
</html>