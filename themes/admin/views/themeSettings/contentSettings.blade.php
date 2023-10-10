@extends('layouts.layout')
@section('title', 'Tema Genel Ayarları')
@section('content')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-0 d-flex justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/general-settings')}}">
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
                            <a class="nav-link active" href="{{siteUrl('theme-settings/content-settings')}}">
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
                        <h3 class="card-title">İçerik Ayarları</h3>
                        <div>
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                            <button class="btn btn-outline-primary" type="reset">Vazgeç</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="padding: 0px 0px 0px 60px">

                            <h3 class="card-title mt-4 text-uppercase font-medium-5">Genel</h3>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="anasayfa-vitrin-basligi" class="col-sm-3 col-form-label-lg">Ansayfa Vitrin Başlığı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="anasayfa-vitrin-basligi" placeholder="Öne Çıkanlar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="acilir-sepet-basligi" class="col-sm-3 col-form-label-lg">Açılır Sepet Başlığı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="acilir-sepet-basligi" placeholder="Sepetiniz">
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title mt-4 text-uppercase font-medium-5">Header</h3>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="favorilere-ekle-butonu" class="col-sm-3 col-form-label-lg">Favorilere Ekle Butonu</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="favorilere-ekle-butonu" placeholder="Favorilere Ekle">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="favorilerim-basligi" class="col-sm-3 col-form-label-lg">Favorilerim Başlığı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="favorilerim-basligi" placeholder="Favorilerim">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="giris-yap-basligi-ve-butonu" class="col-sm-3 col-form-label-lg">Giriş Yap Başlığı ve Butonu</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="giris-yap-basligi-ve-butonu" placeholder="Giriş yap">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="kayit-ol-basligi-ve-butonu" class="col-sm-3 col-form-label-lg">Kayıt Ol Başlığı ve Butonu</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="kayit-ol-basligi-ve-butonu" placeholder="Kayıt Ol">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="hesabim-basligi" class="col-sm-3 col-form-label-lg">Hesabım Başlığı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="hesabim-basligi" placeholder="Hesabım">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="cikis-yap-butonu" class="col-sm-3 col-form-label-lg">Çıkış Yap Butonu</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="cikis-yap-butonu" placeholder="Çıkış Yap">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="sepet-butonu" class="col-sm-3 col-form-label-lg">Sepet Butonu</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="sepet-butonu" placeholder="Sepetim">
                                    </div>
                                </div>
                            </div>
                            <h3 class="card-title mt-4 text-uppercase font-medium-5">Ürün Detay</h3>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="benzer-urunler-basligi" class="col-sm-3 col-form-label-lg">Benzer Ürünler Başlığı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="benzer-urunler-basligi" placeholder="Benzer Ürünler">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="tavsiye-edilenler-basligi" class="col-sm-3 col-form-label-lg">Tavsiye Edilenler Başlığı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="tavsiye-edilenler-basligi" placeholder="Tavsiye Edilenler">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="yeni-etiket" class="col-sm-3 col-form-label-lg">Yeni Etiket</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="yeni-etiket" placeholder="Yeni">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="tukendi-etiket" class="col-sm-3 col-form-label-lg">Tükendi Etkiket</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="tukendi-etiket" placeholder="Tükendi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="sepete-ekle-butonu" class="col-sm-3 col-form-label-lg">Sepete Ekle Butonu</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="sepete-ekle-butonu" placeholder="Sepete Ekle">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="urun-detay-kategori-oneri-metni" class="col-sm-3 col-form-label-lg">Ürün Detay Kategori Öneri Metni</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="urun-detay-kategori-oneri-metni" placeholder="Aynı Kategori Diğer Ürünler">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="urun-detayi-marka-oneri-metni" class="col-sm-3 col-form-label-lg">Ürün Detayı Marka Öneri Metni</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="urun-detayi-marka-oneri-metni" placeholder="Aynı Marka Diğer Ürünler">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="urun-detayi-paylas-butonu" class="col-sm-3 col-form-label-lg">Ürün Detayı Paylaş Butonu</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="urun-detayi-paylas-butonu" placeholder="Ürünü Paylaş">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="urun-aciklama-basligi" class="col-sm-3 col-form-label-lg">Ürün Açıklama Başlığı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="urun-aciklama-basligi" placeholder="Ürün Açıklaması">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="taksit-secenekleri-basligi" class="col-sm-3 col-form-label-lg">Taksit Seçenekleri Başlığı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="taksit-secenekleri-basligi" placeholder="Taksit Seçenekleri">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="yorumlar-basligi" class="col-sm-3 col-form-label-lg">Yorumlar Başlığı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="yorumlar-basligi" placeholder="Yorumlar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="yorum-yaz-butonu" class="col-sm-3 col-form-label-lg">Yorum Yaz Butonu</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="yorum-yaz-butonu" placeholder="Yorum Yaz">
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title mt-4 text-uppercase font-medium-5">Mesajlar</h3>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="urun-sepetinize-eklendi-mesaji" class="col-sm-3 col-form-label-lg">Ürün Sepetinize Eklendi Mesajı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text" class="form-control form-control mt-3" id="urun-sepetinize-eklendi-mesaji" placeholder="Ürün Sepetinize Eklendi">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-transparent box-shadow-0">
                    <div class="card-header">
                        <div>&nbsp;</div>
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