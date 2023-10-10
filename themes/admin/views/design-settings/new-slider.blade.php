@extends('layouts.layout')
@section('title', trans('Slider Ayarları'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Yeni Slider)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item">
                                @trans(Tasarım Ayarları)
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl('design-settings/slider-settings')}}">@trans(Slider Ayarları)</a>
                            </li>
                            <li class="breadcrumb-item active">
                                @trans(Yeni Slider)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <form method="POST">
            <div class="card">
                <div class="card-body row">
                    <div class="col-12 row align-items-end">
                        <div class="mb-2 col-6">
                            <span class="form-label"> Slider Başlığı </span>
                            <input type="text" name="slider_title" id="slider_title" class="form-control" placeholder="Açılış alanı slider'ı">
                        </div>
                        <div class="mb-2 col-6 d-flex justify-content-end">
                            <button class="btn btn-primary" type="button" id="newSlide">
                                <i class="fas fa-plus"></i>
                                <span> Yeni Slide </span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 row mt-5" id="appendElement"></div>
                </div>
            </div>
            <div class="card bg-transparent box-shadow-0">
                <div class="card-header" style="padding: 0;">
                    <div></div>
                    <div>
                        <button class="btn btn-primary" type="submit">@trans(Kaydet)</button>
                        <button class="btn btn-outline-primary" type="reset">@trans(Vazgeç)</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{themeAssets('assets/js/pages/new-slider.js')}}"></script>
@endsection