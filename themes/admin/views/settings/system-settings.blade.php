@extends('layouts.layout')
@section('title', trans('Sistem Ayarları'))
@section('content')
    <div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 150px)">
        <div class="card h-auto w-100 p-3">
            <div class="card-body">
                <div class="row">
                    <a class="col-4 d-flex align-items-center p-2 cursor-pointer"
                       href="{{siteUrl('settings/system-settings/corporate-information')}}">
                        <i class="far fa-file me-2 font-medium-5 text-dark"></i>
                        <div class="d-flex flex-column">
                            <h3 style="color: #6e6b7b;" class="mb-0">Kurumsal Bilgiler</h3>
                            <span style="color: #676d7d;"> Kurumsal bilgileriniz düzenleyin. </span>
                        </div>
                    </a>
                    @if(1 < 0)
                        <!-- Döviz Ayarları -->
                        <a class="col-4 d-flex align-items-center p-2 cursor-pointer"
                           href="{{siteUrl('settings/system-settings/currency-settings')}}">
                            <i class="far fa-file me-2 font-medium-5 text-dark"></i>
                            <div class="d-flex flex-column">
                                <h3 style="color: #6e6b7b;" class="mb-0">Döviz Ayarları</h3>
                                <span style="color: #676d7d;"> Döviz kurlarını güncelleyin ve yönetin. </span>
                            </div>
                        </a>
                    @endif
                    <a class="col-4 d-flex align-items-center p-2 cursor-pointer"
                       href="{{siteUrl('settings/system-settings/tax-settings')}}">
                        <i class="far fa-file me-2 font-medium-5 text-dark"></i>
                        <div class="d-flex flex-column">
                            <h3 style="color: #6e6b7b;" class="mb-0">Vergi Ayarları</h3>
                            <span style="color: #676d7d;"> Satış kapsamınıza uygun vergilerinizi ayarlayın. </span>
                        </div>
                    </a>
                    <a class="col-4 d-flex align-items-center p-2 cursor-pointer"
                       href="{{siteUrl('settings/system-settings/seo-and-domain')}}">
                        <i class="far fa-file me-2 font-medium-5 text-dark"></i>
                        <div class="d-flex flex-column">
                            <h3 style="color: #6e6b7b;" class="mb-0"> Seo ve Alan Adı </h3>
                            <span style="color: #676d7d;"> Arama motoru ayarlarınızı ve takip konlarınızı düzenleyin. </span>
                        </div>
                    </a>
                    <div class="col-4 d-flex align-items-center p-2 cursor-pointer">
                        <i class="far fa-file me-2 font-medium-5 text-dark"></i>
                        <div class="d-flex flex-column">
                            <h3 style="color: #6e6b7b;" class="mb-0">Mağaza Ayarları</h3>
                            <span style="color: #676d7d;"> Mağazanızın özellik ayarlarını düzenleyin. </span>
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center p-2 cursor-pointer">
                        <i class="far fa-file me-2 font-medium-5 text-dark"></i>
                        <div class="d-flex flex-column">
                            <h3 style="color: #6e6b7b;" class="mb-0">Dil Ayarları</h3>
                            <span style="color: #676d7d;"> Sitenizin gösterim dilini düzenleyin. </span>
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center p-2 cursor-pointer">
                        <i class="far fa-file me-2 font-medium-5 text-dark"></i>
                        <div class="d-flex flex-column">
                            <h3 style="color: #6e6b7b;" class="mb-0">Optimizasyonlar</h3>
                            <span style="color: #676d7d;"> Web sitenizin önbelleğini temizleyin. </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection