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
                            <a class="nav-link" href="{{siteUrl('theme-settings/slider-settings')}}">
                                <i class="far fa-sliders-h-square font-medium-3 me-50"></i>
                                <span class="fw-bold">@trans(Slider Ayarları)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{siteUrl('theme-settings/banner-settings')}}">
                                <i class="far fa-bookmark font-medium-3 me-50"></i>
                                <span class="fw-bold">@trans(Banner Ayarları)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"href="{{siteUrl('theme-settings/footer-settings')}}">
                                <i data-feather="bookmark" class="font-medium-3 me-50"></i>
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
                        <h3 class="card-title">@trans(Banner Ayarları)</h3>
                        <div>
                            <button class="btn btn-primary" type="submit">@trans(Kaydet)</button>
                            <button class="btn btn-outline-primary" type="reset">@trans(Vazgeç)</button>
                        </div>
                    </div>
                </div>
                <div class="card" style="padding: 0 0 0 60px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="mb-1 row">
                                    <label for="default-banner-design" class="col-sm-3 col-form-label-lg">@trans(Varsayılan Banner Tasarımı)</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <select name="" id="default-banner-design" class="form-select">
                                            <option> - Seçiniz - </option>
                                            <option value="1">Banner 1</option>
                                            <option value="2">Banner 2</option>
                                            <option value="3">Banner 3</option>
                                            <option value="4">Banner 4</option>
                                            <option value="5">Banner 5</option>
                                            <option value="6">Banner 6</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="colFormLabelLg" class="col-sm-3 col-form-label-lg">@trans(Banner Çerçevesi)</label>
                                    <div class="col-sm-3 col-lg-3 col-xs-9 col-9 col-md-9">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check form-switch form-check-primary">
                                                    <input type="checkbox" class="form-check-input" id="banner-border-status" checked="">
                                                    <label class="form-check-label" for="banner-border-status">
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
                                                <label for="banner-border-color" class="custom-color">
                                                    <input type="color"
                                                           name=""
                                                           class="color"
                                                           id="banner-border-color">
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
                            <button class="btn btn-primary" type="submit">@trans(Kaydet)</button>
                            <button class="btn btn-outline-primary" type="reset">@trans(Vazgeç)</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection