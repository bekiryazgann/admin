@extends('layouts.layout')
@section('title', trans('Etiketler'))


@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Etiketler)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item">
                                @trans(Katalog)
                            </li>
                            <li class="breadcrumb-item active">
                                @trans(Etiketler)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-end">
            <button class="btn btn-primary"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#newFilter"
                    aria-controls="newFilter">@trans(Yeni Etiket)</button>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-datatable" class="table">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table" id="etiket-tablosu">
                            <thead style="position: sticky; top: 0; z-index: 0">
                            <tr>
                                <th></th>
                                <th>@trans(Sıra)</th>
                                <th>@trans(Etiket Adı)</th>
                                <th>@trans(Hareketler)</th>
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
         id="newFilter"
         aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">@trans(Yeni Etiket)</h5>
            <button type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form class="form form-vertical d-flex flex-column justify-content-between h-100">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="category-name">@trans(Etiket Adı)</label>
                            <input type="text"
                                   id="category-name"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="@trans(Etiket Adı)">
                        </div>
                    </div>


                    <h4 class="card-title">Seo Bilgileri</h4>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="tag-seo-extension">@trans(Kategori Uzantısı)</label>
                            <input type="text"
                                   id="tag-seo-extension"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="@trans(Kategori Uzantısı)">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="tag-seo-title">@trans(Etiket Başlığı)</label>
                            <input type="text"
                                   id="tag-seo-title"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="@trans(Kategori Başlığı)">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="tag-seo-keywords">@trans(Anahtar Kelimeler)</label>
                            <input type="text"
                                   id="tag-seo-keywords"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="@trans(Anahtar Kelimeler)">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="tag-seo-description">@trans(Açıklama)</label>
                            <input type="text"
                                   id="tag-seo-description"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="@trans(Açıklama)">
                        </div>
                    </div>
                    <div class="col-12">
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
                <div class="row">
                    <div class="col-6">
                        <button type="reset"
                                class="btn btn-primary me-1 waves-effect waves-float waves-light w-100">
                            @trans(Ekle)
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="reset"
                                class="btn btn-outline-primary me-1 waves-effect waves-float waves-light w-100"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close">
                            @trans(Vazgeç)
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/forms/select/select2.min.css')}}">
<style>body {overflow: hidden;}</style>
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
    <script src="{{themeAssets('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{themeAssets('assets/js/seo-preview.min.js')}}"></script>
    <script>
        seoPreview.main(
            '#seo-preview',
            '#tag-seo-description',
            '#tag-seo-extension',
            '#tag-seo-title',
            '#tag-seo-keywords',
            'tag'
        );

        $('#etiket-tablosu').DataTable({
            ajax: {
                url: "{{siteUrl('api/tags')}}"
            },
            columns: [
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row, meta) {
                        return (
                            '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                            row.id +
                            '" /><label class="form-check-label" for="checkbox' +
                            row.id +
                            '"></label></div>'
                        );
                    },
                    checkboxes: {
                        selectAllRender:
                            '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" />' +
                            '<label class="form-check-label" for="checkboxSelectAll"></label>' +
                            '</div>'
                    }
                },
                {data: 'id'},
                {data: 'name'},
                {
                    data: 'id',
                    width: '12%',
                    orderable: false,
                    render: function (data, type, row) {
                        return `<div class="row align-items-center" style="padding-bottom: 0;padding-right: 0; padding-left: 0;margin-left: -70%;">
                                    <div class="col-4">
                                        <a href="" class="btn btn-flat-primary">
                                            <i class="far fa-print" style="font-size: 18px"></i>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="" class="btn btn-flat-primary">
                                            <i class="far fa-edit" style="font-size: 18px"></i>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="" class="btn btn-flat-primary">
                                            <i class="far fa-ellipsis-v" style="font-size: 18px"></i>
                                        </a>
                                    </div>
                                </div>`;
                    }
                }
            ],
            ...datatableOptions
        });
    </script>
@endsection