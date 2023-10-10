@extends('layouts.layout')
@section('title', trans('Ödemeler'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Ödemeler)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item">
                                @trans(B2B Siparişler)
                            </li>
                            <li class="breadcrumb-item active">
                                @trans(Ödemeler)
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
                        <table class="datatables-basic table" id="paymentsTable">
                            <thead style="position: sticky; top: 0; z-index: 0">
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
    <script>
        $('#paymentsTable').DataTable({
            ajax: {
                url: "{{siteUrl('api/payments')}}"
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
                {data: 'orderCode'},
                {data: 'name'},
                {data: 'date'},
                {data: 'total'},
                {
                    data: 'status',
                    render: function (data, type, row) {
                        let content = '';
                        let clas = '';
                        if (data === "1") {
                            content = '@trans(Gönderildi)';
                            clas = 'success';
                        } else if (data === "2") {
                            content = '@trans(Gönderilmedi)';
                            clas = 'warning'
                        }
                        return `<div><span class="badge badge-light-${clas} text-center">${content}</span></div>`;
                    }
                },
                {
                    data: 'id',
                    width: '12%',
                    orderable: false,
                    render: function (data, type, row) {
                        return `<div class="row align-items-center" style="padding-bottom: 0;padding-right: 0; padding-left: 0;margin-left: -70%;">
                                <div class="col-12">
                                    <a href="" class="btn btn-flat-primary text-center">
                                        <i class="far fa-paper-plane" style="font-size: 18px"></i>
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