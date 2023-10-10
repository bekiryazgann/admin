@extends('layouts.layout')
@section('title', 'Tema Genel Ayarları')
@section('content')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-0 d-flex justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{siteUrl('theme-settings/general-settings')}}">
                                <i class="far fa-medal font-medium-3 me-50"></i>
                                <span class="fw-bold">Genel Ayarlar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/paint-settings')}}">
                                <i class="fas fa-palette me-50 font-medium-3"></i>
                                <span class="fw-bold">Renk Ayarları</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/content-settings')}}">
                                <i class="far fa-text font-medium-3 me-50"></i>
                                <span class="fw-bold">İçerik Ayarları</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/slider-settings')}}">
                                <i class="far fa-sliders-h-square font-medium-3 me-50"></i>
                                <span class="fw-bold">Slider Ayarları</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/banner-settings')}}">
                                <i class="far fa-bookmark font-medium-3 me-50"></i>
                                <span class="fw-bold">Banner Ayarları</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/footer-settings')}}">
                                <i class="far fa-copyright font-medium-3 me-50"></i>
                                <span class="fw-bold">Footer Ayarları</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <form method="POST">
                <div class="card bg-transparent box-shadow-0">
                    <div class="card-header">
                        <h3 class="card-title">Genel Ayarlar</h3>
                        <div>
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                            <button class="btn btn-outline-primary" type="reset">Vazgeç</button>
                        </div>
                    </div>
                </div>
                <div class="card" style="padding: 0 0 0 60px">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 mt-2">
                                <div class="mb-1 row">
                                    <label for="default-catalog-image" class="col-sm-3 col-form-label-lg">Varsayılan Katalog Görseli
                                        <small class="text-muted mt-1 d-block">Resmi yüklenmemiş, ürünler, kategoriler ve markalar için varsayılan oalrak gösterilecek görseldir. Görsel çözünürlüğü 375x450px tavsiye edilir. Format olarak <b>WEBP</b> tercih edin</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="file" class="form-control" name="file" id="default-catalog-image"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="brand-view-style" class="col-sm-3 col-form-label-lg">Marka Gösterim şekli
                                        <small class="text-muted mt-1 d-block">Markaların kategorilerde veya ürün detay sayfalarında gösterim biçimidir.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <select name="" id="brand-view-style" class="form-select">
                                            <option>Seçiniz</option>
                                            <option value="1">Marka Logosu</option>
                                            <option value="2">Marka İsmi</option>
                                            <option value="3">Marka Logosu ve Marka İsmi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="line-setting-in-showcase-products" class="col-sm-3 col-form-label-lg">Vitrindeki Ürünlerde Satır Ayarı
                                        <small class="text-muted mt-1 d-block">Vitrindeki ürünlerin her bir satırda kaç adet gösterileceğini seçebilirsiniz</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <select name="" id="line-setting-in-showcase-products" class="form-select">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="line-setting-of-posts-on-blog" class="col-sm-3 col-form-label-lg">Blogdaki Yazıların Satır Ayarı
                                        <small class="text-muted mt-1 d-block">Blog sayfasındaki yazıların her bir satırda kaç adet gösterileceğini seçebilirsiniz.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <select name="" id="line-setting-of-posts-on-blog" class="form-select">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="aspect-ratio-of-product-images" class="col-sm-3 col-form-label-lg">Ürün Görsellerinin En-Boy Oranı
                                        <small class="text-muted mt-1 d-block">Markaların kategorilerde veya ürün detay sayfalarında gösterim biçimidir.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <select name="" id="aspect-ratio-of-product-images" class="form-select">
                                            <option value="23">Dikey (2/3)</option>
                                            <option value="32">Yatay (3/2)</option>
                                            <option value="11">Kare (1/1)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="display-of-categories-in-product-details" class="col-sm-3 col-form-label-lg">Kategorilerin Ürün Detayında Gösterimi
                                        <small class="text-muted mt-1 d-block">Ürün detay sayfasında ürünün bağlı olduğu kategori sayfanın en üstünde görünür.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="display-of-categories-in-product-details" checked="">
                                            <label class="form-check-label" for="display-of-categories-in-product-details">
                                                <span class="switch-icon-left">
                                                    <i class="far fa-check"></i>
                                                </span>
                                                <span class="switch-icon-right">
                                                    <i class="far fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="display-of-category-logos" class="col-sm-3 col-form-label-lg">Kategori Logolarının Gösterimi
                                        <small class="text-muted mt-1 d-block">Kategori logoları menüde ve leftbarda görünür</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="display-of-category-logos" checked="">
                                            <label class="form-check-label" for="display-of-category-logos">
                                                <span class="switch-icon-left">
                                                    <i class="far fa-check"></i>
                                                </span>
                                                <span class="switch-icon-right">
                                                    <i class="far fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="display-of-sub-categories-by-category" class="col-sm-3 col-form-label-lg">Kategoriye Bağlı Alt Kategorilerin Gösterimi
                                        <small class="text-muted mt-1 d-block">Kategoriye bağlı alt kategoriler, o kategorinin ürünleri listelenirken üst kısımda gösterilir.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="display-of-sub-categories-by-category" checked="">
                                            <label class="form-check-label" for="display-of-sub-categories-by-category">
                                                <span class="switch-icon-left">
                                                    <i class="far fa-check"></i>
                                                </span>
                                                    <span class="switch-icon-right">
                                                    <i class="far fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="display-of-stock-codes" class="col-sm-3 col-form-label-lg">Stok Kodlarının Gösterimi
                                        <small class="text-muted mt-1 d-block">Ürünlerin stok kodları ürün detay sayfasında gösterilir.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="display-of-stock-codes" checked="">
                                            <label class="form-check-label" for="display-of-stock-codes">
                                                <span class="switch-icon-left">
                                                    <i class="far fa-check"></i>
                                                </span>
                                                    <span class="switch-icon-right">
                                                    <i class="far fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="display-of-stock-quantities" class="col-sm-3 col-form-label-lg">Stok Adetlerinin Gösterimi
                                        <small class="text-muted mt-1 d-block">Ürünün stoğu ürün detay sayfasında gösterilir.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="display-of-stock-quantities" checked="">
                                            <label class="form-check-label" for="display-of-stock-quantities">
                                                <span class="switch-icon-left">
                                                    <i class="far fa-check"></i>
                                                </span>
                                                    <span class="switch-icon-right">
                                                    <i class="far fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="jquery-lazy-load-feature" class="col-sm-3 col-form-label-lg">Jquery Lazy Load Özelliği
                                        <small class="text-muted mt-1 d-block">Web sitenizde görselllerin ilk başta değilde gezinirken yüklenmesini sağlayabilirsiniz. Bu sayede sitenizin hızı artacaktır.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="jquery-lazy-load-feature" checked="">
                                            <label class="form-check-label" for="jquery-lazy-load-feature">
                                                <span class="switch-icon-left">
                                                    <i class="far fa-check"></i>
                                                </span>
                                                    <span class="switch-icon-right">
                                                    <i class="far fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="cart-summary-pop-up-display" class="col-sm-3 col-form-label-lg">Sepet Özeti Pop-up Gösterimi
                                        <small class="text-muted mt-1 d-block">Sepete ürün eklendiğinde ekranda küçük pencere olarak sepeteeklenen ürünlerin açılmasını sağlar.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="cart-summary-pop-up-display" checked="">
                                            <label class="form-check-label" for="cart-summary-pop-up-display">
                                                <span class="switch-icon-left">
                                                    <i class="far fa-check"></i>
                                                </span>
                                                    <span class="switch-icon-right">
                                                    <i class="far fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="display-of-product-description-on-mobile" class="col-sm-3 col-form-label-lg">Mobilde Ürün Açıklamasının Gösterim Şekli
                                        <small class="text-muted mt-1 d-block">Ürün detay sayfasında ürün açıklamasının açık gelmesini sağlar.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="display-of-product-description-on-mobile" checked="">
                                            <label class="form-check-label" for="display-of-product-description-on-mobile">
                                                <span class="switch-icon-left">
                                                    <i class="far fa-check"></i>
                                                </span>
                                                    <span class="switch-icon-right">
                                                    <i class="far fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="up-button" class="col-sm-3 col-form-label-lg">Yukarı Çık Butonu
                                        <small class="text-muted mt-1 d-block">Web sitenizde sayfanın aşağısına doğru inerken ekranın sağında tek tıkla yukarı çıkmayı sağlayan bir buton belirir.</small>
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="up-button" checked="">
                                            <label class="form-check-label" for="up-button">
                                                <span class="switch-icon-left">
                                                    <i class="far fa-check"></i>
                                                </span>
                                                    <span class="switch-icon-right">
                                                    <i class="far fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label class="col-sm-3 col-form-label-lg">Ürün Detay Sayfasında Gösterilecek Bölümler
                                    </label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="row">
                                            <div class="col-12 mb-1">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-check form-switch form-check-primary">
                                                            <input type="checkbox" class="form-check-input" id="product-reviews" checked="">
                                                            <label class="form-check-label" for="product-reviews">
                                                            <span class="switch-icon-left">
                                                                <i class="far fa-check"></i>
                                                            </span>
                                                                <span class="switch-icon-right">
                                                                <i class="far fa-times"></i>
                                                            </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-10">
                                                        <label for="product-reviews"> Ürün Yorumları </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-check form-switch form-check-primary">
                                                            <input type="checkbox" class="form-check-input" id="payment-options" checked="">
                                                            <label class="form-check-label" for="payment-options">
                                                            <span class="switch-icon-left">
                                                                <i class="far fa-check"></i>
                                                            </span>
                                                                <span class="switch-icon-right">
                                                                <i class="far fa-times"></i>
                                                            </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-10">
                                                        <label for="payment-options"> Taksit Seçenekleri </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-transparent box-shadow-0">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div>
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                            <button class="btn btn-outline-primary" type="reset">Vazgeç</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection