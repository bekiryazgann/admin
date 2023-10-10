@extends('layouts.layout')
@section('title', 'Tema Slider Ayarları')
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
                            <a class="nav-link active" href="{{siteUrl('theme-settings/slider-settings')}}">
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
                <div class="card" style="padding: 0 0 0 60px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="slider-status" class="col-sm-3 col-form-label-lg">Slider Durumu</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="slider-status" checked="">
                                            <label class="form-check-label" for="slider-status">
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
                                    <label for="default-slider-design" class="col-sm-3 col-form-label-lg">Varsayılan Slider Tasarımı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <select name="" id="default-slider-design" class="form-select">
                                            <option value="1">Slider 1</option>
                                            <option value="2">Slider 2</option>
                                            <option value="3">Slider 3</option>
                                            <option value="4">Slider 4</option>
                                            <option value="5">Slider 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="slider-auto-play" class="col-sm-3 col-form-label-lg">Slider Otomatik Oynatma</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="slider-auto-play" checked="">
                                            <label class="form-check-label" for="slider-auto-play">
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
                                    <label for="slider-display-time" class="col-sm-3 col-form-label-lg">Slider Görüntülenme Süresi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9 d-flex align-items-center">
                                        <input type="number" class="form-control mt-3"
                                               id="slider-display-time"
                                               placeholder="5000">
                                        <div class="mt-3" style="margin-left: 10px">ms</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="slider-transition-time" class="col-sm-3 col-form-label-lg">Slider Geçiş Süresi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9 d-flex align-items-center">
                                        <input type="number" class="form-control mt-3"
                                               id="slider-transition-time"
                                               placeholder="500">
                                        <div class="mt-3" style="margin-left: 10px">ms</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="slider-direction-arrows" class="col-sm-3 col-form-label-lg">Slider Yön Okları</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="form-check form-switch form-check-primary">
                                            <input type="checkbox" class="form-check-input" id="slider-direction-arrows" checked="">
                                            <label class="form-check-label" for="slider-direction-arrows">
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
                                    <label for="slider-direction-arrow-background-design" class="col-sm-3 col-form-label-lg">Slider Yön Oku Arkaplan Tasarımı</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <select name="" id="slider-direction-arrow-background-design" class="form-select">
                                            <option value="0">Yok</option>
                                            <option value="1">Kare</option>
                                            <option value="2">Oval</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="slider-direction-arrow-color" class="col-sm-3 col-form-label-lg">Slider Yön Oku Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="slider-direction-arrow-color" class="custom-color">
                                            <input type="color" class="color" id="slider-direction-arrow-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="slider-direction-arrow-background-color" class="col-sm-3 col-form-label-lg">Slider Yön Oku Arkaplan Rengi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <label for="slider-direction-arrow-background-color" class="custom-color">
                                            <input type="color" class="color" id="slider-direction-arrow-background-color">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label class="col-sm-3 col-form-label-lg">Slider Çerçevesi</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check form-switch form-check-primary">
                                                    <input type="checkbox" class="form-check-input" id="slider-border-status" checked="">
                                                    <label class="form-check-label" for="slider-border-status">
                                                        <span class="switch-icon-left">
                                                            <i class="far fa-check"></i>
                                                        </span>
                                                        <span class="switch-icon-right">
                                                            <i class="far fa-times"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label for="slider-border-color" class="custom-color">
                                                    <input type="color"
                                                           name=""
                                                           class="color"
                                                           id="slider-border-color">
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <select name="" class="form-select">
                                                    <option value="0">Yok</option>
                                                    <option value="1">1 px</option>
                                                    <option value="2">2 px</option>
                                                    <option value="3">3 px</option>
                                                    <option value="4">4 px</option>
                                                    <option value="5">5 px</option>
                                                    <option value="6">6 px</option>
                                                    <option value="7">7 px</option>
                                                    <option value="8">8 px</option>
                                                    <option value="9">9 px</option>
                                                    <option value="10">10 px</option>
                                                </select>
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