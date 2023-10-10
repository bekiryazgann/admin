@extends('layouts.layout')
@section('title', trans('Hesabım'))
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">@trans(Hesabım)</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    @trans(Hesabım)
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right"></div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">@trans(Profil Detayları)</h4>
                        </div>
                        <div class="card-body py-2 my-25">
                            <div class="d-flex">
                                <a href="#" class="me-25">
                                    <img src="{{imageUrl($data->profile_photo)}}"
                                         id="account-upload-img"
                                         class="uploadedAvatar rounded me-50"
                                         alt="profile image"
                                         height="100"
                                         width="100"/>
                                </a>
                                <div class="d-flex align-items-end mt-75 ms-1">
                                    <form id="ppForm">
                                        <label for="profile-photo-upload"
                                               class="btn btn-sm btn-primary mb-75 me-75">@trans(Yükle)</label>
                                        <input type="file" id="profile-photo-upload" hidden accept="image/*"
                                               name="profile_photo"/>
                                    </form>
                                </div>
                            </div>
                            <form class="validate-form mt-2 pt-50" autocomplete="off" method="POST">
                                <input type="hidden" name="nopassword" value="0">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="firstname">@trans(Ad)</label>
                                        <input type="text"
                                               class="form-control"
                                               id="firstname"
                                               name="firstname"
                                               placeholder="Mert"
                                               value="{{$data->firstname}}"/>
                                        @getError('firstname')
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="lastname">@trans(Soyad)</label>
                                        <input type="text"
                                               class="form-control"
                                               id="lastname"
                                               name="lastname"
                                               placeholder="Uçar"
                                               value="{{$data->lastname}}"/>
                                        @getError('lastname')
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label" for="username">@trans(Kullanıcı Adı)</label>
                                        <input type="text"
                                               class="form-control"
                                               id="username"
                                               name="username"
                                               placeholder="mertucar"
                                               value="{{$data->username}}"/>
                                        @getError('username')
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label" for="phone">@trans(Telefon Numarası)</label>
                                        <input type="text"
                                               class="form-control"
                                               id="phone"
                                               name="phone"
                                               placeholder="+905327321136"
                                               value="{{$data->phone}}"/>
                                        @getError('phone')
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label"
                                               for="email"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="right"
                                               data-bs-original-title="@trans(E-posta adresi değiştirilemez)">@trans(E-posta Adresi)</label>
                                        <input type="email"
                                               class="form-control"
                                               id="email"
                                               disabled
                                               placeholder="info@socore.app"
                                               value="{{$data->email}}"/>
                                        @getError('email')
                                    </div>
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="address">@trans(Adres)</label>
                                        <textarea type="text"
                                                  class="form-control"
                                                  id="address"
                                                  name="address"
                                                  placeholder="Cemal Paşa Mh. Cumhuriyet Cd. Kemal Paşa Sk. No:88 D:2">{{$data->address}}</textarea>
                                        @getError('address')
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn btn-primary mt-1 me-1">@trans(Değişiklikleri Kaydet)</button>
                                        <button type="reset"
                                                class="btn btn-outline-secondary mt-1">@trans(Vazgeç)</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Güvenlik</h4>
                        </div>
                        <div class="card-body py-2 my-25">
                            <div class="alert alert-warning">
                                <h4 class="alert-heading fw-normal"><b>Lütfen dikkat:</b> Şifrenizi hatırlanabilir ve
                                    tahmin edilmesi zor bir şekilde seçin. Güvenliğinizi artırmak için harfler, rakamlar
                                    ve sembollerin bir kombinasyonunu kullanın.</h4>
                            </div>
                            <form method="post" action="{{siteUrl('api/my-account-password-update')}}">
                                @csrf
                                <input type="hidden" name="password" value="0">
                                <label class="form-label" for="old_password">@trans(Eski Şifre)</label>
                                <input type="password"
                                       class="form-control mb-2"
                                       id="old_password"
                                       name="old_password"
                                       placeholder="··················"/>

                                <label class="form-label" for="new_password">@trans(Yeni Şifre)</label>
                                <input type="password"
                                       class="form-control mb-2"
                                       id="new_password"
                                       name="new_password"
                                       placeholder="··················"/>

                                <label class="form-label" for="renew_password">@trans(Yeni Şifre Tekrar)</label>
                                <input type="password"
                                       class="form-control mb-2"
                                       id="renew_password"
                                       name="renew_password"
                                       placeholder="··················"/>


                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="accountActivation"
                                           id="accountActivation" data-msg="Please confirm you want to delete account"/>
                                    <label class="form-check-label font-small-3" for="accountActivation">
                                        Şifre değiştirmeyi onaylıyorum
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-danger deactivate-account mt-1">Değiştir
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/ profile -->
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{themeAssets('assets/js/pages/my-account.js')}}"></script>
@endsection