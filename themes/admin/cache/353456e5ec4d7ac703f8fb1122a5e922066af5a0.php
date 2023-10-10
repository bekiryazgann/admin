<!DOCTYPE html>
<html class="loading" lang="en" data-layout="light-layout" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Socore Digital Systems">

    <title><?php echo trans("Giriş Yap") ?> - <?php echo trans("Socore Dijital Sistemler") ?></title>
    <link rel="apple-touch-icon" href="<?php echo e(themeAssets('app-assets/images/ico/apple-icon-120.png')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(themeAssets('app-assets/images/ico/favicon.ico')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/vendors.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/bootstrap-extended.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/colors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/components.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/themes/light-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/themes/bordered-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/themes/semi-light-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/core/menu/menu-types/vertical-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/plugins/forms/form-validation.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/pages/authentication.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('assets/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/extensions/toastr.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/plugins/extensions/ext-component-toastr.css')); ?>">
    <style type="text/css">
        .st0 {
            fill: #3E348A;
        }

        .st1 {
            fill: #4FB8C9;
        }
    </style>
</head>
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="blank-page">
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-cover">
                <div class="auth-inner row m-0">
                    <a class="brand-logo" href="<?php echo e(siteUrl('auth/login')); ?>">
                        <svg version="1.1"
                             id="Layer_1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                             y="0px"
                             style="enable-background:new 0 0 557.82 141.73;" xml:space="preserve"
                             viewBox="0 0 141.73 141.73" width="30" height="30">
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
                        <h2 class="brand-text text-primary ms-1">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="83"
                                 height="24"
                                 viewBox="0 0 386.8 109.8" style="enable-background:new 0 0 386.8 109.8;"
                                 xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path class="st0" d="M24.9,103.9H6V82.4h19c6.3,0,8.8-4.8,9.4-6.3s2.3-6.6-2.2-11.1L15.9,48.7c-7.2-7.2-9.3-17.9-5.4-27.3
                                                            C14.3,12,23.4,6,33.6,6h14v21.5h-14c-2.1,0-3,1.4-3.3,2.2c-0.3,0.8-0.7,2.4,0.8,3.9l16.3,16.3c9.2,9.2,11.9,22.4,6.9,34.5
                                                            C49.2,96.4,38,103.9,24.9,103.9z"/>
                                        </g>
                                        <path class="st0" d="M97.2,5.4L97.2,5.4c-14,0-25.4,11.3-25.4,25.3V78c0,14,11.4,25.3,25.4,25.3l0,0c14,0,25.4-11.3,25.4-25.3
                                                        V30.8C122.5,16.8,111.2,5.4,97.2,5.4z M97.2,81.9L97.2,81.9c-2.1,0-3.9-1.7-3.9-3.9V30.8c0-2.2,1.7-3.9,3.9-3.9l0,0
                                                        c2.1,0,3.9,1.7,3.9,3.9V78C101.1,80.1,99.3,81.9,97.2,81.9z"/>
                                        <path class="st1" d="M228.9,5.4L228.9,5.4c-14,0-25.4,11.3-25.4,25.3V78c0,14,11.4,25.3,25.4,25.3l0,0c14,0,25.4-11.3,25.4-25.3
                                                        V30.8C254.2,16.8,242.9,5.4,228.9,5.4z M228.9,81.9L228.9,81.9c-2.1,0-3.9-1.7-3.9-3.9V30.8c0-2.2,1.7-3.9,3.9-3.9l0,0
                                                        c2.1,0,3.9,1.7,3.9,3.9V78C232.8,80.1,231,81.9,228.9,81.9z"/>
                                        <path class="st1"
                                              d="M294.7,5.4c-14,0-25.4,11.3-25.4,25.3V78v25.3h21.5V78V30.8c0-2.2,1.7-3.9,3.9-3.9h25.4V5.4H294.7z"/>
                                        <path class="st1" d="M188.4,44.2V31.3C188.4,17.3,177,6,163,6s-25.4,11.3-25.4,25.3v47.2c0,14,11.4,25.4,25.4,25.4
                                                        c7,0,13.3-2.8,17.9-7.4c4.6-4.6,7.4-10.9,7.4-17.9V65.6h-21.5v12.9c0,2.2-1.7,3.9-3.9,3.9c-2.2,0-3.9-1.7-3.9-3.9V31.3
                                                        c0-2.2,1.7-3.9,3.9-3.9c1.1,0,2,0.4,2.7,1.1c0.7,0.7,1.1,1.7,1.1,2.7v12.9H188.4z"/>
                                        <path class="st1" d="M355.5,6c-14,0-25.4,11.3-25.4,25.3v47.2c0,14,11.4,25.4,25.4,25.4c7,0,13.3-2.8,17.9-7.4
                                                        c4.6-4.6,7.4-10.9,7.4-17.9V65.7h-21.5v12.9c0,2.2-1.7,3.9-3.9,3.9c-2.2,0-3.9-1.7-3.9-3.9V55.7h29.2V31.3
                                                        C380.8,17.3,369.5,6,355.5,6z M351.6,38v-6.7c0-2.2,1.7-3.9,3.9-3.9c1.1,0,2,0.4,2.7,1.1c0.7,0.7,1.1,1.7,1.1,2.7V38L351.6,38
                                                        L351.6,38z"/>
                                    </g>
                                </g>
                            </svg>
                        </h2>
                    </a>
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                            <img class="img-fluid" src="<?php echo e(themeAssets('app-assets/images/pages/login-v2.svg')); ?>"
                                 alt="Login V2"/>
                        </div>
                    </div>
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h2 class="card-title fw-bold mb-1"><?php echo e(trans("Socore'a Hoşgeldin!")); ?></h2>
                            <p class="card-text mb-2"><?php echo trans("Hesabına giriş yapabilirsin.") ?></p>
                            <form class="auth-login-form mt-2" method="POST" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="mb-1">
                                    <label class="form-label" for="login-email"><?php echo trans("E-posta") ?></label>
                                    <input class="form-control"
                                           id="login-email"
                                           type="text"
                                           name="email"
                                           placeholder="<?php echo trans("mertucar@example.com") ?>"
                                           aria-describedby="login-email"
                                           autofocus=""
                                           tabindex="1"/>
                                    <?php if (isset($errors['email'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['email'][0]?></div></div></div><?php endif; ?>
                                </div>
                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label"
                                               for="login-password">
                                            <?php echo trans("Parola") ?>
                                        </label>
                                        <a href="<?php echo e(siteUrl('auth/forgot-password')); ?>">
                                            <small><?php echo trans("Parolamı Unuttum") ?></small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge"
                                               id="login-password"
                                               type="password"
                                               name="password"
                                               placeholder="············"
                                               aria-describedby="login-password"
                                               tabindex="2"/>
                                        <span class="input-group-text cursor-pointer">
                                            <i data-feather="eye"></i>
                                        </span>
                                    </div>
                                    <?php if (isset($errors['password'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['password'][0]?></div></div></div><?php endif; ?>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3"/>
                                        <label class="form-check-label" for="remember-me"> <?php echo trans("Beni Hatırla") ?> </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" tabindex="4"> <?php echo trans("Giriş Yap") ?> </button>
                            </form>
                            <p class="text-center mt-2">
                                <span><?php echo trans("Yeni misin?") ?></span>
                                <a href="<?php echo e(siteUrl('auth/register')); ?>">
                                    <span> <?php echo trans("Hesap Oluştur!") ?> </span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    "use strict"
    let url = "<?php echo e(siteUrl()); ?>";
    let assetUrl = "<?php echo e(themeAssets('')); ?>";
</script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/js/core/app.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/extensions/toastr.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/js/scripts/pages/auth-login.js')); ?>"></script>
<script>
    <?php if(auth()->get('msg')): ?>
        toastr['info']("<?php echo auth()->get('msg'); ?>", "<?php echo trans("Bilgi") ?>", {
        closeButton: true,
        tapToDismiss: false,
        rtl: false
    });
    <?php endif; ?>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
</html><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/auth/login.blade.php ENDPATH**/ ?>