@extends('layouts.layout')
@section('title', trans('Yeni Ürün'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Yeni Ürün)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item">
                                @trans(Katalog)
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl('catalog')}}">@trans(Ürünler)</a>
                            </li>
                            <li class="breadcrumb-item active">
                                @trans(Yeni Ürün)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <h2 class="card-title">@trans(Temel Bilgiler)</h2>
                        <div class="row">
                            <div class="col-10">
                                <div class="mb-1 row">
                                    <label for="prodcut-name" class="col-sm-12">
                                        @trans(Ürün Adı)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="prodcut-name"
                                               name="product_name"
                                               placeholder="@trans(Ürün Adı)">
                                        @getError('product_name')
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-1 row">
                                    <label for="product-type" class="col-sm-12">@trans(Ürün Türü)</label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <select name="product_type" id="product-type" class="form-select">
                                            <option value="1">@trans(Fiziksel)</option>
                                            <option value="2">@trans(Dijital)</option>
                                        </select>
                                        @getError('product_type')
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-fee" class="col-sm-12">
                                        @trans(Satış Fiyatı)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control product-fee"
                                               id="product-fee"
                                               name="product_fee"
                                               placeholder="@trans(Satış Fiyatı)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-sale-fee" class="col-sm-12">
                                        @trans(İndirimli Satış Fiyatı)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control product-sale-fee"
                                               id="product-sale-fee"
                                               name="product_sale_fee"
                                               placeholder="@trans(İndirimli Satış Fiyatı)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="purchase_price" class="col-sm-12">
                                        @trans(Alış Fiyatı)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control product-sale-fee"
                                               id="purchase_price"
                                               name="purchase_price"
                                               placeholder="@trans(Alış Fiyatı)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="max_purchase" class="col-sm-12">
                                        @trans(Maksimum Satın Alma)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="number"
                                               class="form-control form-control product-sale-fee"
                                               id="max_purchase"
                                               name="max_purchase"
                                               value="15"
                                               placeholder="@trans(Maksimum Satın Alma)">
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-title">@trans(Stok Bilgileri)</h2>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-barcode" class="col-sm-12">
                                        @trans(Ürün Barkodu)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-barcode"
                                               name="product_barcode"
                                               placeholder="@trans(Ürün Barkodu)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-stock-code" class="col-sm-12">
                                        @trans(Stok Kodu)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-stock-code"
                                               name="product_stock_code"
                                               value="<?php
                                                $faker = \Faker\Factory::create();
                                                echo $faker->regexify('[A-Z]{4}[0-9]{5}[A-Z]{2}');
                                               ?>"
                                               placeholder="@trans(Stok Kodu)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-stock-qty" class="col-sm-12">
                                        @trans(Stok Adedi)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-stock-qty"
                                               name="product_stock_qty"
                                               placeholder="@trans(Stok Adedi)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-cargo-desi" class="col-sm-12">
                                        @trans(Kargo Desisi)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-cargo-desi"
                                               name="product_cargo_desi"
                                               placeholder="@trans(Kargo Desisi)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="product-images" class="col-sm-12">
                                        @trans(Ürün Görselleri)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="hidden" id="product-images" name="product_images" value=''>
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
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@trans(Ürün Detayları)</h4>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-1 row">
                                    <label for="product-brand" class="col-sm-12">
                                        @trans(Marka)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <select class="form-select" id="product-brand" name="product_brand">
                                            <option disabled> - @trans(Marka) -</option>
                                            <option value="0"> - @trans(Yok) -</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-1 row">
                                    <label for="tags" class="col-sm-12">
                                        @trans(Filtreler)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <select class="tag-multi-select form-select" id="tags" multiple name="product_filters[]">
                                            @foreach($filters as $filter)
                                                @if($filter->status == 1)
                                                    <optgroup label="{{$filter->name}}">
                                                        @foreach(json_decode($filter->options, true) as $key => $options)
                                                            <option value="{{$filter->id . "@" . $key}}">{{$filter->name}} → {{$options}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-1 row">
                                    <label for="product-supplier" class="col-sm-12">
                                        @trans(Tedarikçi)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-supplier"
                                               name="product_supplier"
                                               placeholder="@trans(Tedarikçi)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="categories" class="col-sm-12">
                                        @trans(Kategoriler)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <select class="tag-multi-select form-select" id="categories" multiple name="product_categories[]">
                                            @foreach(listArray($categories) as $key => $category)
                                                <option value="{{$key}}">{!! $category['name'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="product-short-description" class="col-sm-12">
                                        @trans(Ürün Kısa Açıklaması)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-short-description"
                                               name="product_short_description"
                                               placeholder="@trans(Ürün Kısa Açıklaması)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="product-features-and-detailed-description" class="col-sm-15">
                                        @trans(Ürün Özellikleri ve Detaylı Açıklaması)
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <textarea type="text"
                                                  class="form-control form-control"
                                                  id="product-features-and-detailed-description"
                                                  name="product_long_description"
                                                  placeholder="@trans(Ürün Özellikleri ve Detaylı Açıklaması)"></textarea>
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
                <textarea name="variants_json" style="display: none; opacity: 0;" id="variants" cols="30" rows="10">{"variants": {}, "values": {}}</textarea>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title" style="display: flex; align-items: center; justify-content: space-between">
                            <h4>@trans(Varyantlar)</h4>
                            <button class="btn btn-outline-primary text-primary" type="button"
                                    data-bs-toggle="offcanvas"
                                    data-bs-target="#newVariant"
                                    aria-controls="newVariant">
                                <i class="far fa-plus me-50"></i> @trans(Varyant Ekle)
                            </button>
                        </div>
                        <div class="card-content">
                            <ul class="list-group" id="all_variants_list"></ul>
                            <div class="table-responsive" style="margin-top: 20px;">
                                <table class="table" id="variants_table">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check_all_table" class="form-check-input"></th>
                                        <th>İsim</th>
                                        <th>Satış Fiyatı</th>
                                        <th>İndirimli Fiyat</th>
                                        <th>Stok Kodu</th>
                                        <th>Desi</th>
                                        <th>Barkod</th>
                                        <th>Stok</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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
    <div class="offcanvas offcanvas-end" tabindex="-1" id="newVariant" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Varyant Ekle</h5>
            <button type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="form form-vertical d-flex flex-column justify-content-between h-100">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="variant-type-name">@trans(Varyant Adı)</label>
                            <input type="text"
                                   id="variant-type-name"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="Renk">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="variant_type">@trans(Türü)</label>
                            <select name="" id="variant_type" class="form-select">
                                <option value="option"> Seçenek </option>
                                <option value="color"> Renk </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label for="variant_content" class="form-label"> Varyantlar </label>
                            <input class="form-control"
                                   type="text"
                                   name="variant_content"
                                   id="variant_content" placeholder="Kırımızı">
                            <p>
                                <span class="text-muted">Enter tuşunu kullanarak ekleme yapabilirsiniz.</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="list-group" id="variants_list_canvas"></ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary waves-effect waves-float waves-light w-100 text-center" id="add_variant">
                            @trans(Ekle)
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="reset"
                                id="closeButton"
                                class="btn btn-outline-primary waves-effect waves-float waves-light w-100 text-center"
                                data-bs-dismiss="offcanvas">
                            @trans(Vazgeç)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css"
          href="{{themeAssets('app-assets/vendors/css/forms/select/select2.min.css')}}">
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.8/lib/sortable.min.js"></script>
    <script src="{{themeAssets('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/forms/cleave/cleave.min.js')}}"></script>
    <script src="{{themeAssets('assets/js/seo-preview.min.js')}}"></script>
    <script src="{{themeAssets('assets/js/pages/new-product.js')}}"></script>
@endsection