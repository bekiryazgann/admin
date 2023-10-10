@extends('layouts.layout')
@section('title', trans('Vergi Ayarları'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-9">
                    <h2 class="content-header-title float-start mb-0">@trans(Döviz Ayarları)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item">
                                @trans(Ayarlar)
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl('settings/system-settings')}}">
                                    @trans(Sistem Ayarları)
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                @trans(Vergi Ayarları)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"> @trans(Vergi Hesaplamaları) </h3>
            <p class="mb-0 bold"> <strong>@trans(Fiyatlar vergi dahildir)</strong> </p>
            <small> @trans(Bu seçenek kapatıldığında ödeme ekranında ürün fiyatları üzerine vergi tutarı eklenecektir.) </small>
            <hr>
            <p class="mb-0"> <strong>@trans(Kargo ve hediye paketi ücretlerine vergi dahildir)</strong> </p>
            <small> @trans(Bu seçenek kapatıldığında ödeme ekranında kargo ve hediye paketi ücretleri üzerine vergi tutarı eklenecektir.) </small>
            {{--<div class="row">
                <div class="col-12 d-flex">
                    <div style="flex: 1"></div>
                    <div>
                        <button class="btn btn-primary" type="submit">@trans(Kaydet)</button>
                        <button class="btn btn-outline-primary" type="reset">@trans(Vazgeç)</button>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
    <div class="alert alert-warning">
        <div class="alert-body">
            @trans(Vergi yükümlülüklerinizi öğrenmek için satış yaptığınız bölgelerdeki yasal mevzuatlara dikkat edin. Mağazanızda tahsil edeceğiniz vergileri yönetin.)
        </div>
    </div>
    <div class="content-body">
        <section id="basic-datatable" class="table">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table" id="table">
                            <thead style="position: sticky; top: 0; z-index: 0">
                            <tr>
                                <th></th>
                                <th>Sıra</th>
                                <th>Ülke</th>
                                <th>Oranlar</th>
                                {{--<th>Hareketler</th>--}}
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="offcanvas offcanvas-end"
         tabindex="-1"
         id="canvas"
         aria-labelledby="offcanvasEndLabel">
    </div>
@endsection
@section('scripts')
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{themeAssets('assets/js/pages/tax-settings.js')}}"></script>
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <style>body {overflow: hidden;}</style>
@endsection