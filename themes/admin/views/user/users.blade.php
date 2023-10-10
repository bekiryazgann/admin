@extends('layouts.layout')
@section('title', trans('Kullanıcılar'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Kullanıcılar)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item active">
                                @trans(Kullanıcılar)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-end">
            <button class="btn btn-primary"
                    id="newUserButton">@trans(Yeni Kullanıcı)</button>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-datatable" class="table">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table" id="user-datatable">
                            <thead style="position: sticky; top: 0; z-index: 0">
                            <tr>
                                <th></th>
                                <th>@trans(Sıra)</th>
                                <th>@trans(Profil)</th>
                                <th>@trans(Ad Soyad)</th>
                                <th>@trans(E-Posta)</th>
                                <th>@trans(Yetki)</th>
                                <th>@trans(Durum)</th>
                                <th>@trans(Hareketler)</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="canvas" aria-labelledby="offcanvasEndLabel"></div>
@endsection
@section('scripts')
<script src="{{themeAssets('app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{themeAssets('app-assets/vendors/js/extensions/polyfill.min.js')}}"></script>
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
<script src="{{themeAssets('assets/js/seo-preview.js')}}"></script>
<script src="{{themeAssets('assets/js/pages/users.js')}}"></script>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/animate/animate.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/plugins/extensions/ext-component-sweet-alerts.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<style>body {overflow: hidden;}</style>
@endsection