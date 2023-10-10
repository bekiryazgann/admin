@extends('layouts.layout')
@section('title', 'Tema Ayarları')
@section('content')
    <section class="app-ecommerce-details mb-5">
        <div class="card p-2">
            <div class="card-body">
                <div class="container-sm" style="max-width: 1000px">
                    <div class="row my-2">
                        <div class="col-12 col-md-7">
                            <h1>Brancy Kozmetik</h1>
                            <div class="ecommerce-details-price d-flex flex-wrap mt-2 mb-2">
                                <h4 class="item-price me-1 text-success">Aktif</h4>
                            </div>
                            <p class="card-text">
                                GPS, Always-On Retina display, 30% larger screen, Swimproof, ECG app, Electrical and optical heart sensors,
                                Built-in compass, Elevation, Emergency SOS, Fall Detection, S5 SiP with up to 2x faster 64-bit dual-core
                                processor, watchOS 6 with Activity trends, cycle tracking, hearing health innovations, and the App Store on
                                your wrist
                            </p>
                            <hr />
                            <div class="d-flex flex-column flex-sm-row pt-1">
                                @if(1 !== 1)
                                    <a href="#" class="btn btn-outline-secondary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                                        <i class="far fa-terminal me-50"></i>
                                        <span class="add-to-cart">Temayı Düzenle</span>
                                    </a>
                                @endif
                                <a href="{{siteUrl('theme-settings/general-settings')}}" class="btn btn-primary btn-wishlist me-0 me-sm-1 mb-1 mb-sm-0">
                                    <i class="far fa-cog me-50"></i>
                                    <span>Tema Ayarları</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                            <div class="d-flex align-items-center justify-content-center rounded overflow-hidden">
                                <img src="{{themeAssets('app-assets/images/slider/04.jpg')}}"
                                     class="img-fluid product-img rounded"
                                     alt="product image"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="row">
            @for($i = 0; $i <= 15; $i++)
            <div class="col-xl-4 col-lg-4 col-xs-12 col-md-12 d-flex align-items-center justify-content-center mb-5">
                <div class="card overflow-hidden" style="max-width: 600px">
                    <img class="card-img-top" src="{{themeAssets('app-assets/images/slider/04.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="card-content">Brancy Kozmetik</h3>
                            <h4 class="card-content text-success">Free</h4>
                        </div>
                    </div>
                    <div class="card-footer p-0 d-flex flex-column">
                        <a href="#" class="btn btn-outline-primary waves-effect d-block rounded-0" style="border: 0px !important;">
                            <i class="far fa-eye me-50"></i>
                            <span>Temayı Önizle</span>
                        </a>
                        <a href="#" class="btn btn-primary waves-effect d-block rounded-0">
                            <i class="far fa-shopping-cart me-50"></i>
                            <span>Temayı Kur</span>
                        </a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </section>
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/pages/app-ecommerce-details.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/plugins/forms/form-number-input.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{themeAssets('app-assets/css/plugins/extensions/ext-component-toastr.min.css')}}">
@endsection
@section('scripts')
    <script src="{{themeAssets('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
    <script src="{{themeAssets('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
@endsection