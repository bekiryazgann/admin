@extends('layouts.layout')
@section('title', 'Siparişler')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Siparişler)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item active">
                                @trans(Siparişler)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-datatable" class="table">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table products-table">
                            <thead style="position: sticky; top: 0;">
                            <tr>
                                <th></th>
                                <th>@trans(Sıra)</th>
                                <th>@trans(Sipariş Kodu)</th>
                                <th>@trans(Adı Soyadı)</th>
                                <th>@trans(Tarih)</th>
                                <th>@trans(Tutar)</th>
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
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <style>body{overflow: hidden;}</style>
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
    <script>
        $('.products-table').DataTable({
            language: {url: 'https://locale.socore.app/datatables/tr.json'},
            pageLength: 15,
            lengthMenu: [
                [10, 15, 20, 50, 100, 200, 300, 500, 1000],
                [
                    '10 @trans(Adet)',
                    '15 @trans(Adet)',
                    '20 @trans(Adet)',
                    '50 @trans(Adet)',
                    '100 @trans(Adet)',
                    '200 @trans(Adet)',
                    '300 @trans(Adet)',
                    '500 @trans(Adet)',
                    '1000 @trans(Adet)'
                ]
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{siteUrl('api/orders')}}",
                type: "POST"
            },
            columns: [
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                            full.id +
                            '" /><label class="form-check-label" for="checkbox' +
                            full.id +
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
                {data: 'code'},
                {data: 'name'},
                {data: 'date'},
                {
                    data: 'total',
                    render: function (data, type, row) {
                        return data + '₺'
                    }
                },
                {
                    data: 'status',
                    orderable: false,
                    render: function (data, type, row) {
                        let content = '';
                        if (data === '1') {
                            content = 'Onay Bekleniyor';
                        } else if (data === '2') {
                            content = 'Onaylandı';
                        } else if (data === '3') {
                            content = 'Kargoya Verildi';
                        } else if (data === '4') {
                            content = 'İptal Edildi';
                        } else if (data === '5') {
                            content = 'Teslim Edildi';
                        } else if (data === '6') {
                            content = 'Tedarikte';
                        } else if (data === '7') {
                            content = 'Ödeme Bekleniyor';
                        }
                        return `<div class="text-center"><span class="badge badge-light-primary text-center">${content}</span></div>`;
                    }
                },
                {
                    width: '12%',
                    data: 'id',
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
            dom: "<\"d-flex justify-content-between align-items-center px-2\"<\"d-flex align-items-center tools-container\"l<\"tools\"><\"tools-export-btn\"B>>f><rt><\"d-flex justify-content-between align-items-center p-2\"ip>",
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle waves-effect waves-float waves-light',
                    text: 'Dışa Aktar',
                    buttons: [
                        {
                            extend: 'print',
                            text: '<i class="far fa-print me-50 font-small-4"></i> Yazdır',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'csv',
                            text: '<i class="far fa-file-csv me-50 font-small-4"></i> Csv',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'excel',
                            text: '<i class="far fa-file-excel me-50 font-small-4"></i> Excel',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="far fa-file-pdf me-50 font-small-4"></i> Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'copy',
                            text: '<i class="far fa-copy me-50 font-small-4"></i> Kopyala',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                }
            ]
        });
        $('.tools').append(`<button class='btn btn-danger'><i class='far fa-trash me-50'></i>Sil</button>
            <div class='btn-group'>
            <button class='btn btn-outline-secondary dropdown-toggle waves-effect waves-float waves-light' type='button' id='dropdownMenuButton2' data-bs-toggle='dropdown' aria-expanded='true'>
            Durumu Güncelle
            </button>
            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton2' data-popper-placement='bottom-start'>
                <a class='dropdown-item' href='javascript: void(0);'><i class='far fa-times-circle me-50'></i>Sipariş İptali</a>
                <a class='dropdown-item' href='javascript: void(0);'><i class='far fa-credit-card-front me-50'></i>Ödeme Bekleniyor</a>
                <a class='dropdown-item' href='javascript: void(0);'><i class='far fa-spinner me-50'></i>Ödeme Alındı</a>
                <a class='dropdown-item' href='javascript: void(0);'><i class='far fa-check me-50'></i>Sipariş Alındı</a>
                <a class='dropdown-item' href='javascript: void(0);'><i class='far fa-truck me-50'></i>Kargoya Verildi</a>
                <a class='dropdown-item' href='javascript: void(0);'><i class='far fa-paper-plane me-50'></i>Teslim Edildi</a>
            </div>
            </div>`);
    </script>
@endsection