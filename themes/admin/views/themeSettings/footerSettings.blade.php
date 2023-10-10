@extends('layouts.layout')
@section('title', trans('Tema Footer Ayarları'))
@section('content')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-0 d-flex justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/general-settings')}}">
                                <i class="far fa-medal font-medium-3 me-50"></i>
                                <span class="fw-bold">@trans(Genel Ayarlar)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/paint-settings')}}">
                                <i class="fas fa-palette me-50 font-medium-3"></i>
                                <span class="fw-bold">@trans(Renk Ayarları)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/content-settings')}}">
                                <i class="far fa-text font-medium-3 me-50"></i>
                                <span class="fw-bold">@trans(İçerik Ayarları)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/slider-settings')}}">
                                <i class="far fa-sliders-h-square font-medium-3 me-50"></i>
                                <span class="fw-bold">@trans(Slider Ayarları)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{siteUrl('theme-settings/banner-settings')}}">
                                <i class="far fa-bookmark font-medium-3 me-50"></i>
                                <span class="fw-bold">@trans(Banner Ayarları)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{siteUrl('theme-settings/footer-settings')}}">
                                <i class="far fa-copyright font-medium-3 me-50"></i>
                                <span class="fw-bold">@trans(Footer Ayarları)</span>
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
                        <h3 class="card-title">@trans(Footer Ayarları)</h3>
                        <div>
                            <button class="btn btn-primary" type="submit">@trans(Kaydet)</button>
                            <button class="btn btn-outline-primary" type="reset">@trans(Vazgeç)</button>
                        </div>
                    </div>
                </div>
                <div class="card" style="padding: 0 0 0 60px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="default-footer-design" class="col-sm-3 col-form-label-lg">@trans(Varsayılan Footer Tasarımı)</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <select name="" id="default-footer-design" class="form-select">
                                            <option value="1">Footer 1</option>
                                            <option value="2">Footer 2</option>
                                            <option value="3">Footer 3</option>
                                            <option value="4">Footer 4</option>
                                            <option value="5">Footer 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="social-media-head-text" class="col-sm-3 col-form-label-lg">@trans(Sosyal Medya Başlık Metni)</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text"
                                               class="form-control form-control mt-3"
                                               id="social-media-head-text"
                                               placeholder="@trans(Sosyal Medya)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="newsletter-subscription-header-text" class="col-sm-3 col-form-label-lg">@trans(Bülten Aboneliği Başlık Metni)</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text"
                                               class="form-control form-control mt-3"
                                               id="newsletter-subscription-header-text"
                                               placeholder="@trans(Bülten Aboneliği)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="newsletter-subscription-text" class="col-sm-3 col-form-label-lg">@trans(Bülten Aboneliği Metni)</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <input type="text"
                                               class="form-control form-control mt-3"
                                               id="newsletter-subscription-text"
                                               placeholder="@trans(E-posta Adresiniz)">
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
                            <button class="btn btn-primary" type="submit">@trans(Kaydet)</button>
                            <button class="btn btn-outline-primary" type="reset">@trans(Vazgeç)</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection