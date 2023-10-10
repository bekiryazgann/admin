<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item">
            <a class="d-flex align-items-center"
               href="<?php echo e(siteUrl()); ?>">
                <i class="fal fa-home-lg-alt"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Yönetim Paneli") ?>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center"
               href="<?php echo e(siteUrl('main/statistic')); ?>">
                <i class="far fa-chart-line"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("İstatistikler") ?>
                </span>
            </a>
        </li>

        <li class="navigation-header">
            <span><?php echo trans("Mağaza") ?></span>
        </li>

        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-shopping-bag"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Siparişler") ?>
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('orders')); ?>">
                        <i class="far fa-shopping-bag"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Siparişler") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('orders/payments')); ?>">
                        <i class="far fa-credit-card"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Ödemeler") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('orders/bills')); ?>">
                        <i class="far fa-receipt"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Faturalar") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('orders/cancellation-and-refund')); ?>">
                        <i class="far fa-undo-alt"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("İptal ve İade") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('orders/basket-reminder')); ?>">
                        <i class="far fa-clock"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Sepet Hatırlatma") ?>
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <?php if(0 > 1): ?>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="<?php echo e(siteUrl('b2b/orders')); ?>">
                    <i class="far fa-boxes"></i>
                    <span class="menu-title text-truncate">
                    <?php echo trans("B2B Siparişler") ?>
                </span>
                    <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('b2b/orders')); ?>">
                            <i class="far fa-boxes"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Siparişler") ?>
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('b2b/payments')); ?>">
                            <i class="far fa-credit-card"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Ödemeler") ?>
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('b2b/invoices')); ?>">
                            <i class="far fa-receipt"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Faturalar") ?>
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('b2b/cancellation-and-refund')); ?>">
                            <i class="far fa-undo-alt"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("İptal İade") ?>
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="<?php echo e(siteUrl('catalog')); ?>">
                <i class="far fa-layer-group"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Katalog") ?>
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('catalog')); ?>">
                        <i class="far fa-box"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Ürünler") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('catalog/categories')); ?>">
                        <i class="far fa-bars"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Kategoriler") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('catalog/brands')); ?>">
                        <i class="far fa-shield"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Markalar") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('catalog/filters')); ?>">
                        <i class="far fa-filter"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Filtreler") ?>
                        </span>
                    </a>
                </li>
                <?php if(isset($a)): ?>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('catalog/tags')); ?>">
                            <i class="far fa-tag"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Etiketler") ?>
                        </span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-megaphone"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Pazarlama") ?>
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('marketing/coupons')); ?>">
                        <i class="far fa-arrow-alt-down"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Kuponlar") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('marketing/campaigns')); ?>">
                        <i class="far fa-bell"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Kampanyalar") ?>
                        </span>
                    </a>
                </li>
                <?php if(isset($a)): ?>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('marketing/newsletter')); ?>">
                            <i class="far fa-paper-plane"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Bülten Aboneliği") ?>
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('marketing/comments')); ?>">
                        <i class="far fa-comment"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Yorumlar") ?>
                        </span>
                    </a>
                </li>
                <?php if(isset($a)): ?>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('marketing/google-ads')); ?>">
                            <i class="fab fa-google"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Google Reklamlar") ?>
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('marketing/meta-ads')); ?>">
                            <i class="fab fa-facebook"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Meta Reklamlar") ?>
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-user-tag"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Müşteriler") ?>
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('customers/customers')); ?>">
                        <i class="far fa-person-carry"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Müşteriler") ?>
                        </span>
                    </a>
                </li>
                <?php if(isset($a)): ?>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('customers/b2b-customers')); ?>">
                            <i class="far fa-person-dolly"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("B2B Müşteriler") ?>
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-text-size"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("İçerikler") ?>
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('contents/pages')); ?>">
                        <i class="far fa-pager"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Sayfalar") ?>
                        </span>
                    </a>
                </li>
                <?php if(1 !== 1): ?>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('contents/blogs')); ?>">
                            <i class="far fa-quote-right"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Bloglar") ?>
                        </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(isset($a)): ?>
                    <li>
                        <a class="d-flex align-items-center justify-content-between" href="javascript: void(0);">
                            <i class="far fa-file-contract"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Sözleşmeler") ?>
                        </span>
                            <span class="badge badge-light-warning rounded-pill ms-auto">Yakında</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(1 !== 1): ?>
                    <li>
                        <a class="d-flex align-items-center" href="<?php echo e(siteUrl('contents/frequently-asked-questions')); ?>">
                            <i class="far fa-question"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("SS Sorular") ?>
                        </span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-bezier-curve"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Tasarım Ayarları") ?>
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('web-builder')); ?>">
                        <i class="far fa-window-restore"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Tasarımı Özelleştir") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('design-settings/menu-settings')); ?>">
                        <i class="far fa-sliders-h"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Menü Ayarları") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('design-settings/slider-settings')); ?>">
                        <i class="far fa-images"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Slider Ayarları") ?>
                        </span>
                    </a>
                </li>
                <?php if(1 !== 1): ?>
                    <li>
                        <a class="d-flex align-items-center" href="javascript: void(0);">
                            <i class="far fa-rectangle-landscape"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Banner Ayarları") ?>
                        </span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a class="d-flex align-items-center" href="javascript: void(0);">
                        <i class="far fa-share-alt"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Sosyal Medya") ?>
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="d-flex align-items-center" href="javascript: void(0);">
                <i class="far fa-cog"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Ayarlar") ?>
                </span>
            </a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('settings/system-settings')); ?>">
                        <i class="far fa-server"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Sistem Ayarları") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="<?php echo e(siteUrl('settings/payment-settings')); ?>">
                        <i class="far fa-credit-card-front"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Ödeme Ayarları") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="javascript: void(0);">
                        <i class="far fa-truck"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("Kargo Ayarları") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="javascript: void(0);">
                        <i class="far fa-at"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("E-posta Ayarları") ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="javascript: void(0);">
                        <i class="far fa-phone-alt"></i>
                        <span class="menu-item text-truncate">
                            <?php echo trans("İletişim Ayarları") ?>
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <?php if(1 !== 1): ?>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="javascript: void(0);">
                    <i data-feather="mail"></i>
                    <span class="menu-title text-truncate">
                    <?php echo trans("Uygulamalar") ?>
                </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="javascript: void(0);">
                            <i data-feather="message-square"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Uygulamalarım") ?>
                        </span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="javascript: void(0);">
                            <i data-feather="message-square"></i>
                            <span class="menu-item text-truncate">
                            <?php echo trans("Uygulama Mağazası") ?>
                        </span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
        <li class="navigation-header">
            <span><?php echo trans("ARAÇLAR") ?></span>
        </li>
        <?php if(isset($a)): ?>
            <li class="nav-item">
                <a class="d-flex align-items-center"
                   href="javascript: void(0);">
                    <i class="far fa-image"></i>
                    <span class="menu-title text-truncate">
                    <?php echo trans("Görsel Düzenleyici") ?>
                </span>
                </a>
            </li>
        <?php endif; ?>
        <li class=" nav-item">
            <a class="d-flex align-items-center"
               href="<?php echo e(siteUrl('media-manager')); ?>">
                <i class="far fa-photo-video"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Medya Yöneticisi") ?>
                </span>
            </a>
        </li>
        <li class="navigation-header">
            <span><?php echo trans("YÖNETİM") ?></span>
        </li>
        <li class=" nav-item">
            <a class="d-flex align-items-center"
               href="<?php echo e(siteUrl('my-account')); ?>">
                <i class="far fa-user"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Hesabım") ?>
                </span>
            </a>
        </li>
        <li class=" nav-item">
            <a class="d-flex align-items-center"
               href="<?php echo e(siteUrl('users')); ?>">
                <i class="far fa-users"></i>
                <span class="menu-title text-truncate">
                    <?php echo trans("Kullanıcılar") ?>
                </span>
            </a>
        </li>
    </ul>
</div><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/layouts/navigation.blade.php ENDPATH**/ ?>