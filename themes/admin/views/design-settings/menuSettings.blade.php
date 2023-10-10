@extends('layouts.layout')
@section('title', trans('Menu Ayarları'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Menüler)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item">
                                @trans(Tasarım Ayarları)
                            </li>
                            <li class="breadcrumb-item">
                                @trans(Menü Ayarları)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <a class="card shadow-none border cursor-pointer btn btn-primary"
                                   href="{{siteUrl('design-settings/menu-settings/edit/header')}}">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        Header Menü
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="card shadow-none border cursor-pointer btn btn-primary"
                                   href="{{siteUrl('design-settings/menu-settings/edit/footer')}}">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        Footer Menü
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection