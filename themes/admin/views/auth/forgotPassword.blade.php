<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@trans(Şifremi Unuttum) - @trans(Socore Dijital Sistemler)</title>
    <link rel="apple-touch-icon" href="{{themeAssets('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{themeAssets('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/pages/authentication.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('assets/css/style.css')}}">
</head>
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static"
      data-open="click"
      data-menu="vertical-menu-modern"
      data-col="blank-page">
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-cover">
                <div class="auth-inner row m-0">
                    <a class="brand-logo" href="{{siteUrl()}}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 50 50">
                            <defs>
                                <linearGradient id="linear-gradient" y1="0.5" x2="1" y2="0.5" gradientUnits="objectBoundingBox">
                                    <stop offset="0" stop-color="#5756a2"></stop>
                                    <stop offset="0.313" stop-color="#5b5aa4"></stop>
                                    <stop offset="0.669" stop-color="#6664ab"></stop>
                                    <stop offset="1" stop-color="#7673b4"></stop>
                                </linearGradient>
                            </defs>
                            <g id="Group_2" transform="translate(-911 -48.024)">
                                <g id="socore" transform="translate(911 48.024)">
                                    <path id="Path_1" d="M38.752,46,14.2,48.314a9.976,9.976,0,0,1-10.875-9L1.012,14.765a9.978,9.978,0,0,1,9-10.875L34.556,1.572a9.977,9.977,0,0,1,10.875,9l2.318,24.549a9.993,9.993,0,0,1-9,10.879Z" transform="translate(-0.967 -1.528)" fill="url(#linear-gradient)"></path>
                                    <g id="Group_1" transform="translate(18.576 11.55)">
                                        <path id="Path_2" d="M44.117,49.225h-4.6v-5.2h4.6a2.469,2.469,0,0,0,1.749-4.216l-3.946-3.946A6.072,6.072,0,0,1,46.212,25.5h1.195v5.2h-1.2a.873.873,0,0,0-.617,1.489l3.946,3.946a7.664,7.664,0,0,1-5.42,13.086Z" transform="translate(-39.52 -25.5)" fill="#fff"></path>
                                    </g>
                                </g>

                            </g>
                        </svg>
                        <h2 class="brand-text text-primary ms-1">Socore</h2>
                    </a>
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                            <img class="img-fluid" src="{{themeAssets('app-assets/images/pages/forgot-password-v2-dark.svg')}}" alt="Forgot password V2" />
                        </div>
                    </div>
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h2 class="card-title fw-bold mb-1">@trans(Şifreni mi Unuttun?) 🔒</h2>
                            <p class="card-text mb-2">@trans(E-posta adresini girerek şifre sıfırlama isteği gönderebilirsin)</p>
                            <form class="auth-forgot-password-form mt-2"
                                  method="POST">
                                <div class="mb-1">
                                    <label class="form-label"
                                           for="forgot-password-email">@trans(E-posta)</label>
                                    <input class="form-control"
                                           id="forgot-password-email"
                                           type="text"
                                           name="forgot-password-email"
                                           placeholder="john@example.com"
                                           aria-describedby="forgot-password-email"
                                           autofocus=""
                                           tabindex="1" />
                                </div>
                                <button class="btn btn-primary w-100" tabindex="2">@trans(Sıfırlama Linki Gönder)</button>
                            </form>
                            <p class="text-center mt-2">
                                <a href="{{siteUrl('auth/login')}}">
                                    <i data-feather="chevron-left"></i>
                                    @trans(Giriş Ekranına Dön)
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{themeAssets('app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{themeAssets('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{themeAssets('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{themeAssets('app-assets/js/core/app.js')}}"></script>
<script src="{{themeAssets('app-assets/js/scripts/pages/auth-forgot-password.js')}}"></script>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
</html>