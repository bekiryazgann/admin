@extends('layouts.layout')
@section('title', 'Ödeme Ayarları')
@section('content')
    <div class="content-header">

    </div>
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Tercihler </h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="visitor_shopping" class="form-label"> Ziyaretçi Alışverişi </label>
                            <select name="visitor_shopping" id="visitor_shopping" class="form-select" >
                                <option value="0" @if($paymentPref->visitor_shopping == 0) selected @endif> Müşteri üye olmadan alışveriş yapmasın</option>
                                <option value="1"  @if($paymentPref->visitor_shopping == 1) selected @endif> Müşteri üye olmadan alışveriş yapsın</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="phone_information" class="form-label"> Telefon Bilgisi </label>
                            <select name="phone_information" id="phone_information" class="form-select">
                                <option value="0" @if($paymentPref->phone_information == 0) selected @endif> İsteğe Bağlı</option>
                                <option value="1" @if($paymentPref->phone_information == 1) selected @endif> Zorunlu</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="distance_selling_contract" class="form-label"> Mesafeli Satış Sözleşmesi </label>
                            <select name="distance_selling_contract" id="distance_selling_contract" class="form-select">
                                <option value="1" @if($paymentPref->distance_selling_contract == 1) selected @endif> Onay kutusu göster, otomatik onaylanmış gelsin.</option>
                                <option value="0" @if($paymentPref->distance_selling_contract == 0) selected @endif> Onay kutusu göster, müşteri onaylasın.</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="post_code" class="form-label"> Posta Kodu </label>
                            <select name="post_code" id="post_code" class="form-select">
                                <option value="0" @if($paymentPref->post_code == 0) selected @endif> İsteğe Bağlı</option>
                                <option value="1" @if($paymentPref->post_code == 1) selected @endif> Zorunlu</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="gift_wrap" class="form-label"> Hediye Paketi </label>
                            <select name="gift_wrap" id="gift_wrap" class="form-select">
                                <option value="1" @if($paymentPref->gift_wrap == 1) selected @endif> Göster</option>
                                <option value="0" @if($paymentPref->gift_wrap == 0) selected @endif> Gizle</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="order_note" class="form-label"> Sipariş Notu </label>
                            <select name="order_note" id="order_note" class="form-select">
                                <option value="0" @if($paymentPref->order_note == 0) selected @endif> Göster </option>
                                <option value="1" @if($paymentPref->order_note == 1) selected @endif> Gizle </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="tc_no" class="form-label"> TC Kimlik No </label>
                            <select name="tc_no" id="tc_no" class="form-select">
                                <option value="1" @if($paymentPref->tc_no == 1) selected @endif> Gizle </option>
                                <option value="0" @if($paymentPref->tc_no == 0) selected @endif> Zorunlu </option>
                            </select>
                        </div>
                        <div class="col-12" style="display: flex;">
                            <div style="flex: 1;"></div>
                            <button class="btn btn-outline-primary mt-1" type="submit">Kaydet</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Kurulu Ödeme Yöntemleri </h3>

                <button class="btn-icon btn btn-primary btn-round dropdown-toggle waves-effect waves-float waves-light" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ödeme Yöntemi Ekle
                </button>
                <div class="dropdown-menu dropdown-menu-end" style="" id="dropdown">
                    @if(!in_array('eft', $addedPaymentMethods))
                        <a class="dropdown-item"
                           href="#eft"
                           aria-selected="false">
                            <span class="align-middle d-flex align-items-center"> Havale / EFT </span>
                        </a>
                    @endif
                    @if(!in_array('credit-card', $addedPaymentMethods))
                        <a class="dropdown-item"
                           href="#credit-cart"
                           aria-selected="false">
                            <span class="align-middle d-flex align-items-center">Kapıda Ödeme &nbsp;<small class="d-block text-muted">(Kredi Kartı)</small></span>
                        </a>
                    @endif
                    @if(!in_array('cash', $addedPaymentMethods))
                        <a class="dropdown-item"
                           href="#cash"
                           aria-selected="false">
                            <span class="align-middle d-flex align-items-center">Kapıda Ödeme &nbsp;<small class="d-block text-muted">(Nakit)</small></span>
                        </a>
                    @endif
                    @if(!in_array('iyzico', $addedPaymentMethods))
                        <a class="dropdown-item"
                           href="#iyzico"
                           aria-selected="false">
                            <span class="align-middle"> İyzico </span>
                        </a>
                    @endif
                    @if(!in_array('paytr', $addedPaymentMethods))
                        <a class="dropdown-item"
                           href="#paytr"
                           aria-selected="false">
                            <span class="align-middle"> PayTR </span>
                        </a>
                    @endif
                    @if(!in_array('param', $addedPaymentMethods))
                        <a class="dropdown-item"
                           href="#param"
                           aria-selected="false">
                            <span class="align-middle"> Param </span>
                        </a>
                    @endif
                    @if(!in_array('stripe', $addedPaymentMethods))
                        <a class="dropdown-item"
                           href="#stripe"
                           aria-selected="false">
                            <span class="align-middle"> Stripe </span>
                        </a>
                    @endif
                    @if(!in_array('paypal', $addedPaymentMethods))
                        <a class="dropdown-item"
                           href="#paypal"
                           aria-selected="false">
                            <span class="align-middle"> PayPal </span>
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <p> Ödeme almak istediğiniz yöntemleri ekleyebilir ve düzenleyebilirsiniz. </p>
            </div>
            @if(count($data) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th> Ödeme Yöntemİ</th>
                            <th> Durum</th>
                            <th style="width: 20%;"> Hareketler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $val)
                            <tr data-removeid="{{$val->id}}">
                                <td>
                                    {!!
                                        match ($val->service){
                                            'paypal' => '<img src="https://www.paypalobjects.com/digitalassets/c/website/logo/full-text/pp_fc_hl.svg" alt="" style="width: 100px">',
                                            'iyzico' => '<img src="https://www.iyzico.com/assets/images/content/logo.svg?v=v4.0.369" alt="" style="width: 100px;">',
                                            'eft' => 'Havale / EFT',
                                            'credit-card' => 'Kapıda Ödeme (Kredi Kartı)',
                                            'cash' => 'Kapıda Ödeme (Nakit)',
                                            'paytr' => '<img src="https://www.paytr.com/wp-content/uploads/logo.svg" alt="" style="width: 100px;">',
                                            'param' => '<img src="https://param.com.tr/images/param-logo-v3-turkuaz.svg" alt="" style="width: 100px;">',
                                            'stripe' => '<img src="https://stripe.dev/images/stripe-logo.svg" alt="" style="width: 100px;">',
                                        }
                                    !!}
                                </td>
                                <td>
                                    <div class="badge badge-light-success"> Aktif</div>
                                </td>
                                <td style="width: 20%;">
                                    <button class="btn btn-outline-primary btn-icon">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button class="btn btn-outline-danger ms-1 btn-icon" data-id="{{$val->id}}" data-role="remove-payment">
                                        <i  class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="card-body">
                    <div class="alert alert-info">
                        <div class="alert-body">
                            Şuana kadar bir ödeme yöntemi seçilmedi
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade text-start" id="add-payment-method-eft" tabindex="-1" aria-hidden="true" data-role="add-payment-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16"> Havale / EFT </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="service" value="eft">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="eft_min_cart_purchase" class="form-label">Minimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Minimum Sepet Tutarı" id="eft_min_cart_purchase" name="min_cart_purchase">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="eft_max_cart_purchase" class="form-label">Maksimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Maksimum Sepet Tutarı" id="eft_max_cart_purchase" name="max_cart_purchase">
                            </div>
                            <div class="col-10 mb-2"></div>
                            <div class="col-2 mb-2">
                                <button class="btn btn-outline-primary"> Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-start" id="add-payment-method-credit-cart" tabindex="-1" aria-hidden="true" data-role="add-payment-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16"> Kapıda Ödeme (Kredi Kartı) </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="service" value="credit-card">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="credit_cart_min_cart_purchase" class="form-label">Minimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Minimum Sepet Tutarı" id="credit_cart_min_cart_purchase" name="min_cart_purchase">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="credit_cart_max_cart_purchase" class="form-label">Maksimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Maksimum Sepet Tutarı" id="credit_cart_max_cart_purchase" name="max_cart_purchase">
                            </div>
                            <div class="col-10 mb-2"></div>
                            <div class="col-2 mb-2">
                                <button class="btn btn-outline-primary"> Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade text-start" id="add-payment-method-cash" tabindex="-1" aria-hidden="true" data-role="add-payment-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Kapıda Ödeme (Nakit)</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="service" value="cash">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="cash_min_cart_purchase" class="form-label">Minimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Minimum Sepet Tutarı" id="cash_min_cart_purchase" name="min_cart_purchase">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="cash_max_cart_purchase" class="form-label">Maksimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Maksimum Sepet Tutarı" id="cash_max_cart_purchase" name="max_cart_purchase">
                            </div>
                            <div class="col-10 mb-2"></div>
                            <div class="col-2 mb-2">
                                <button class="btn btn-outline-primary"> Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-start" id="add-payment-method-iyzico" tabindex="-1" aria-hidden="true" data-role="add-payment-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">
                        <img src="https://www.iyzico.com/assets/images/content/logo.svg?v=v4.0.369" alt="" style="height: 25px;">
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="service" value="iyzico">
                        <div class="row">

                            <div class="col-4 mb-2">
                                <label for="api_key" class="form-label">ApiKey</label>
                                <input type="text" class="form-control" placeholder="ApiKey" id="api_key" name="api_key">
                            </div>

                            <div class="col-4 mb-2">
                                <label for="secret_key" class="form-label">SecretKey</label>
                                <input type="text" class="form-control" placeholder="SecretKey" id="secret_key" name="secret_key">
                            </div>

                            <div class="col-4 mb-2">
                                <label for="base_url" class="form-label">BaseUrl</label>
                                <input type="text" class="form-control" placeholder="BaseUrl" id="base_url" name="base_url">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="iyzico_min_cart_purchase" class="form-label">Minimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Minimum Sepet Tutarı" id="iyzico_min_cart_purchase" name="min_cart_purchase">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="iyzico_max_cart_purchase" class="form-label">Maksimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Maksimum Sepet Tutarı" id="iyzico_max_cart_purchase" name="max_cart_purchase">
                            </div>
                            <div class="col-10 mb-2"></div>
                            <div class="col-2 mb-2">
                                <button class="btn btn-outline-primary"> Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-start" id="add-payment-method-paytr" tabindex="-1" aria-hidden="true" data-role="add-payment-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">
                        <img src="https://www.paytr.com/wp-content/uploads/logo.svg" alt="" style="height: 25px;">
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="service" value="paytr">
                        <div class="row">
                            <div class="col-4 mb-2">
                                <label for="merchant_id" class="form-label">merchant_id</label>
                                <input type="text" class="form-control" placeholder="merchant_id" id="merchant_id" name="merchant_id">
                            </div>
                            <div class="col-4 mb-2">
                                <label for="merchant_key" class="form-label">merchant_key</label>
                                <input type="text" class="form-control" placeholder="merchant_key" id="merchant_key" name="merchant_key">
                            </div>
                            <div class="col-4 mb-2">
                                <label for="merchant_salt" class="form-label">merchant_salt</label>
                                <input type="text" class="form-control" placeholder="merchant_salt" id="merchant_salt" name="merchant_salt">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="paytr_min_cart_purchase" class="form-label">Minimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Minimum Sepet Tutarı" id="paytr_min_cart_purchase" name="min_cart_purchase">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="paytr_max_cart_purchase" class="form-label">Maksimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Maksimum Sepet Tutarı" id="paytr_max_cart_purchase" name="max_cart_purchase">
                            </div>
                            <div class="col-10 mb-2"></div>
                            <div class="col-2 mb-2">
                                <button class="btn btn-outline-primary"> Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-start" id="add-payment-method-param" tabindex="-1" aria-hidden="true" data-role="add-payment-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">
                        <img src="https://param.com.tr/images/param-logo-v3-turkuaz.svg" alt="" style="height: 25px;">
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="service" value="param">
                        <div class="row">
                            <div class="col-4 mb-2">
                                <label for="client_code" class="form-label">CLIENT_CODE</label>
                                <input type="text" class="form-control" placeholder="CLIENT_CODE" id="client_code" name="client_code">
                            </div>
                            <div class="col-4 mb-2">
                                <label for="client_username" class="form-label">CLIENT_USERNAME</label>
                                <input type="text" class="form-control" placeholder="CLIENT_USERNAME" id="client_username" name="client_username">
                            </div>
                            <div class="col-4 mb-2">
                                <label for="client_password" class="form-label">CLIENT_PASSWORD</label>
                                <input type="text" class="form-control" placeholder="CLIENT_PASSWORD" id="client_password" name="client_password">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="param_min_cart_purchase" class="form-label">Minimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Minimum Sepet Tutarı" id="param_min_cart_purchase" name="min_cart_purchase">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="param_max_cart_purchase" class="form-label">Maksimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Maksimum Sepet Tutarı" id="param_max_cart_purchase" name="max_cart_purchase">
                            </div>
                            <div class="col-10 mb-2"></div>
                            <div class="col-2 mb-2">
                                <button class="btn btn-outline-primary"> Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-start" id="add-payment-method-stripe" tabindex="-1" aria-hidden="true" data-role="add-payment-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">
                        <img src="https://stripe.dev/images/stripe-logo.svg" alt="" style="height: 25px;">
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="service" value="stripe">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="key" class="form-label">key</label>
                                <input type="text" class="form-control" placeholder="key" id="key" name="key">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="stripe_min_cart_purchase" class="form-label">Minimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Minimum Sepet Tutarı" id="stripe_min_cart_purchase" name="min_cart_purchase">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="stripe_max_cart_purchase" class="form-label">Maksimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Maksimum Sepet Tutarı" id="stripe_max_cart_purchase" name="max_cart_purchase">
                            </div>
                            <div class="col-10 mb-2"></div>
                            <div class="col-2 mb-2">
                                <button class="btn btn-outline-primary"> Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-start" id="add-payment-method-paypal" tabindex="-1" aria-hidden="true" data-role="add-payment-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">
                        <img src="https://www.paypalobjects.com/digitalassets/c/website/logo/full-text/pp_fc_hl.svg" alt="" style="height: 25px">
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="service" value="paypal">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="client_id" class="form-label">ClientId</label>
                                <input type="text" class="form-control" placeholder="ClientId" id="client_id" name="client_id">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="client_secret" class="form-label">ClientSecret</label>
                                <input type="text" class="form-control" placeholder="ClientSecret" id="client_secret" name="client_secret">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="paypal_min_cart_purchase" class="form-label">Minimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Minimum Sepet Tutarı" id="paypal_min_cart_purchase" name="min_cart_purchase">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="paypal_max_cart_purchase" class="form-label">Maksimum Sepet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Maksimum Sepet Tutarı" id="paypal_max_cart_purchase" name="max_cart_purchase">
                            </div>
                            <div class="col-10 mb-2"></div>
                            <div class="col-2 mb-2">
                                <button class="btn btn-outline-primary"> Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{themeAssets('assets/js/pages/payment-settings.js')}}"></script>
@endsection