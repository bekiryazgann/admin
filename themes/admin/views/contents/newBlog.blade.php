@extends('layouts.layout')
@section('title', trans('Yeni Blog'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Yeni Blog)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item">
                                @trans(İçerikler)
                            </li>
                            <li class="breadcrumb-item">
                                @trans(Bloglar)
                            </li>
                            <li class="breadcrumb-item active">
                                @trans(Yeni Blog)
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
                            <h2 class="card-title">@trans(Blog Ekle)</h2>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <label for="blog-title" class="col-sm-12">
                                            @trans(Blog Başlığı)
                                        </label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <input type="text"
                                                   class="form-control form-control"
                                                   id="blog-title"
                                                   name="blog_title"
                                                   placeholder="@trans(Blog Başlığı)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <label for="blog-images" class="col-sm-12">
                                            @trans(Blog Görselleri)
                                        </label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <input type="hidden" id="blog-images" name="blog_images" value=''>
                                            <button type="button"
                                                    class="btn btn-outline-primary text-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#selectMedia"
                                                    aria-controls="selectMedia">
                                                @trans(Medyayı Kullan)
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <label for="blog-content">@trans(Blog İçeriği)</label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <textarea name="blog_content" id="blog-content"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <label for="blog-status">@trans(Blog Durum)</label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <select name="blog_status" id="blog-status" class="form-select">
                                                <option value="1" selected> @trans(Yayında) </option>
                                                <option value="0"> @trans(Gizli) </option>
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
                                                @trans(Kategori Uzantısı)
                                            </label>
                                            <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                                <input type="text"
                                                       class="form-control form-control"
                                                       id="seo-category-extension"
                                                       name="seo_extension"
                                                       placeholder="@trans(Kategori Uzantısı)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-1 row">
                                            <label for="seo-tag-title" class="col-sm-12">
                                                @trans(Etiket Başlığı)
                                            </label>
                                            <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                                <input type="text"
                                                       class="form-control form-control"
                                                       id="seo-tag-title"
                                                       name="seo_title"
                                                       placeholder="@trans(Etiket Başlığı)">
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
                                                      placeholder="@trans(Açıklama)"></textarea>
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
    <script src="{{themeAssets('assets/js/pages/new-blog.js')}}"></script>
@endsection