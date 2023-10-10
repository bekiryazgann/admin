@extends('layouts.layout')
@section('title', trans('Yeni Sayfa'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Sayfa Düzenle)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item">
                                @trans(İçerikler)
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl('contents/pages')}}">@trans(Sayfalar)</a>
                            </li>
                            <li class="breadcrumb-item active">
                                @trans(Sayfa Düzenle)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-md-12 col-12">
                <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card bg-transparent box-shadow-0">
                        <div class="card-header">
                            <div></div>
                            <div>
                                <button class="btn btn-primary" type="submit">@trans(Kaydet)</button>
                                <button class="btn btn-outline-primary" type="reset">@trans(Vazgeç)</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">@trans(Sayfa Düzenle)</h2>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <label for="title" class="col-sm-12">
                                            @trans(Sayfa Başlığı)
                                        </label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <input type="text"
                                                   class="form-control form-control"
                                                   id="title"
                                                   value="{{$data->title}}"
                                                   name="title"
                                                   placeholder="@trans(Sayfa Başlığı)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <label for="content">@trans(Sayfa İçeriği)</label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <textarea name="content" id="content">{{$data->content}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <label for="status">@trans(Sayfa Durum)</label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <select name="status" id="status" class="form-select">
                                                <option value="1" {{($data->status == '1') ? 'selected' : ''}}> @trans(Yayında) </option>
                                                <option value="0" {{($data->status == '0') ? 'selected' : ''}}> @trans(Gizli) </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a class="card-header" data-action="collapse">
                            <h4 class="card-title">@trans(Arama Motoru Optimizasyonu (SEO))</h4>
                            <i class="far fa-ellipsis-h-alt"></i>
                        </a>
                        <div class="card-content collapse">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-1 row">
                                            <label for="seo-category-extension" class="col-sm-12">
                                                @trans(Sayfa Uzantısı)
                                            </label>
                                            <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                                <input type="text"
                                                       class="form-control form-control"
                                                       id="seo-category-extension"
                                                       name="seo_extension"
                                                       value="{{$data->seo_extension}}"
                                                       placeholder="@trans(Sayfa Uzantısı)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-1 row">
                                            <label for="seo-tag-title" class="col-sm-12">
                                                @trans(Sayfa Başlığı)
                                            </label>
                                            <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                                <input type="text"
                                                       class="form-control form-control"
                                                       id="seo-tag-title"
                                                       name="seo_title"
                                                       value="{{$data->seo_title}}"
                                                       placeholder="@trans(Sayfa Başlığı)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-1 row">
                                            <label for="seo-keywords" class="col-sm-12">
                                                @trans(Anahtar Kelimeler)
                                            </label>
                                            <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                                <input type="text"
                                                       class="form-control form-control"
                                                       id="seo-keywords"
                                                       name="seo_keywords"
                                                       value="{{$data->seo_keywords}}"
                                                       placeholder="@trans(Anahtar Kelimeler)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row match-height">
                                    <div class="col-8">
                                        <div class="mb-1 row">
                                            <label for="seo-description" class="col-sm-12">
                                                @trans(Açıklama)
                                            </label>
                                            <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12 h-100">
                                            <textarea name="seo_description"
                                                      class="form-control h-100"
                                                      style="resize: none"
                                                      id="seo-description"
                                                      placeholder="@trans(Açıklama)">{{$data->seo_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-1 row">
                                            <label for="" class="col-sm-12">
                                                @trans(Önizleme)
                                            </label>
                                            <div class="col-12">
                                                <div class="seo-preview" id="seo-preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-transparent box-shadow-0">
                        <div class="card-header">
                            <div></div>
                            <div>
                                <button class="btn btn-primary" type="submit">@trans(Kaydet)</button>
                                <button class="btn btn-outline-primary" type="reset">@trans(Vazgeç)</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{themeAssets('assets/js/seo-preview.min.js')}}"></script>
    <script src="{{themeAssets('assets/js/pages/new-page.js')}}"></script>
@endsection