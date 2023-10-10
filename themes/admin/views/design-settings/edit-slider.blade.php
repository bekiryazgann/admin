@extends('layouts.layout')
@section('title', trans('Slider Düzenle'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Slider Düzenle)</h2>
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
                                @trans(Slider Düzenle)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <form method="POST">
            @csrf
            <div class="card">
                <div class="card-body row">
                    <div class="col-12 row align-items-end">
                        <div class="mb-2 col-6">
                            <span class="form-label"> Slider Başlığı </span>
                            <input type="text" name="slider_title" id="slider_title" value="{{$data->name}}" class="form-control" placeholder="Açılış alanı slider'ı">
                        </div>
                        <div class="mb-2 col-6 d-flex justify-content-end">
                            <button class="btn btn-primary" type="button" id="newSlide">
                                <i class="fas fa-plus"></i>
                                <span> Yeni Slide </span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 row mt-5" id="appendElement">
                        @foreach($data->json as $key => $slide)
                            <div class="col-12 row" style="gap: 20px 0" id="containerElement" data-id="{{$key}}">
                                <div style="padding-left: calc(var(--bs-gutter-x) * .5); width: 100%">
                                    <hr>
                                </div>

                                <div class="col-2">
                                    <span class="form-label"> Görsel <span class="text-muted"> Masaüstü İçin </span> </span>
                                    <button type="button"
                                            class="btn btn-outline-primary text-primary"
                                            data-bs-toggle="modal"
                                            data-key="desktop_{{$key}}"
                                            data-buttonId="desktop_{{$key}}"
                                            data-bs-target="#selectMedia"
                                            aria-controls="selectMedia">
                                        <input type="hidden" id="slider_image_desktop_{{$key}}" name="slider[{{$key}}][slider_image_desktop]"
                                               data-inputId="desktop_{{$key}}" value='<?= $slide->slider_image_desktop ?>'>
                                        Medyayı Kullan
                                    </button>
                                </div>
                                <div class="col-2">
                                    <span class="form-label"> Görsel <span class="text-muted"> Telefon İçin </span></span>
                                    <button type="button"
                                            class="btn btn-outline-primary text-primary"
                                            data-bs-toggle="modal"
                                            data-key="mobile_{{$key}}"
                                            data-buttonId="mobile_{{$key}}"
                                            data-bs-target="#selectMedia"
                                            aria-controls="selectMedia">

                                        <input type="hidden" id="slider_image_mobile_{{$key}}" name="slider[{{$key}}][slider_image_mobile]"
                                               data-inputId="mobile_{{$key}}" value='{!! $slide->slider_image_mobile !!}'>
                                        Medyayı Kullan
                                    </button>
                                </div>
                                <div class="col-4">
                                    <span class="form-span"> Açıklama </span>
                                    <input type="text" name="slider[{{$key}}][slider_description]" class="form-control" placeholder="Açıklama" id="slider_description" value="{{$slide->slider_description}}">
                                </div>
                                <div class="col-2">
                                    <span class="form-label"> Bağlantı </span>
                                    <input type="text" name="slider[{{$key}}][slider_link]" class="form-control" placeholder="https://socore.net" id="slider_link" value="{{$slide->slider_link}}">
                                </div>
                                <div class="col-2 d-flex align-items-end">
                                    <button class="btn btn-danger w-100" type="button" id="sliderDelete" data-key="{{$key}}">
                                        <i class="fas fa-trash"></i>
                                        <span> Sil </span>
                                    </button>
                                </div>
                                <div class="col-2">
                                    <div class="form-check form-check-primary form-switch">
                                        <input type="checkbox"
                                               <?= isset($slide->slide_active) && $slide->slide_active === 'on' ? 'checked' : '' ?>
                                               class="form-check-input no-size" id="slide_active" name="slider[{{$key}}][slide_active]">
                                        <span class="form-label"> Aktif </span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check form-check-primary form-switch">
                                        <input type="checkbox" class="form-check-input no-size"
                                               <?= isset($slide->slide_target) && $slide->slide_target === 'on' ? 'checked' : '' ?>
                                               id="slide_target" name="slider[{{$key}}][slide_target]">
                                        <span class="form-label"> Bağlantıyı Yeni Sekmede Aç </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
    <script src="{{themeAssets('assets/js/pages/edit-slider.js')}}"></script>
    <script>
        @foreach($data->json as $key => $slide)
            MultiMediaSelect.main(`#slider_image_mobile_{{$key}}`, `[data-key="mobile_{{$key}}"]`, "{{$key}}")
            MultiMediaSelect.main(`#slider_image_desktop_{{$key}}`, `[data-key="desktop_{{$key}}"]`, "{{$key}}")
        @endforeach
    </script>
@endsection