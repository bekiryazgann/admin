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
                            <a class="nav-link active" href="{{siteUrl('theme-settings/paint-settings')}}">
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
                        <h3 class="card-title">Renk Ayarları</h3>
                        <div>
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                            <button class="btn btn-outline-primary" type="reset">Vazgeç</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">

                            <h3 class="card-title">Tema Renkleri</h3>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="theme-main-color" class="col-sm-3 col-form-label-lg">Tema Ana Renk</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="theme-main-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="theme-main-color">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="theme-secondary-color" class="col-sm-3 col-form-label-lg">Tema İkincil Renk</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="theme-secondary-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="theme-secondary-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="theme-font-color" class="col-sm-3 col-form-label-lg">Tema Yazı Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="theme-font-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="theme-font-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="theme-icon-color" class="col-sm-3 col-form-label-lg">İkon Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="theme-icon-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="theme-icon-color">
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <h3 class="card-title mt-4">Buton Renkleri</h3>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="buttons-text-color" class="col-sm-3 col-form-label-lg">Buton Yazıları</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="buttons-text-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="buttons-text-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="button-color" class="col-sm-3 col-form-label-lg">Buton Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="button-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="button-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="button-hover-color" class="col-sm-3 col-form-label-lg">Buton Hover Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="button-hover-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="button-hover-color">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title mt-4">Header Renkleri</h3>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="bar-color-on-header" class="col-sm-3 col-form-label-lg">Header Üstündeki Bar Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="bar-color-on-header" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="bar-color-on-header">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="main-menu-color" class="col-sm-3 col-form-label-lg">Ana Menü Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="main-menu-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="main-menu-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="menu-text-color" class="col-sm-3 col-form-label-lg">Menü Yazı Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="menu-text-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="menu-text-color">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title mt-4">Footer Renkleri</h3>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="footer-background-color" class="col-sm-3 col-form-label-lg">Footer Arkaplan Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="footer-background-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="footer-background-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="footer-text-color" class="col-sm-3 col-form-label-lg">Footer Yazı Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="footer-text-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="footer-text-color">
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <h3 class="card-title mt-4">Ürün Detay Sayfası Renkleri</h3>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="gift-tag-background-color" class="col-sm-3 col-form-label-lg">Hediye Etiket Arkaplan Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="gift-tag-background-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="gift-tag-background-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="gift-tag-text-color" class="col-sm-3 col-form-label-lg">Hediye Etiket Yazı Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="gift-tag-text-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="gift-tag-text-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="discount-sticker-background-color" class="col-sm-3 col-form-label-lg">İndirimli Etiket Arkaplan Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="discount-sticker-background-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="discount-sticker-background-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="Discounted Label Text Color" class="col-sm-3 col-form-label-lg">İndirimli Etiket Yazı Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="Discounted Label Text Color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="Discounted Label Text Color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="new-label-background-color" class="col-sm-3 col-form-label-lg">Yeni Etiket Arkaplan Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="new-label-background-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="new-label-background-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="new-label-text-color" class="col-sm-3 col-form-label-lg">Yeni Etiket Yazı Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="new-label-text-color" class="custom-color">
                                            <input type="color"
                                                   name=""
                                                   class="color"
                                                   id="new-label-text-color">
                                        </label>
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