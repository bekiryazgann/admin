@extends('layouts.layout')
@section('title', 'Alan Adlarını Yönet')
@section('content')
    <div class="content-header d-flex justify-content-end gap-1 mb-2">
        <button class="btn btn-primary"> Kaydet </button>
        <button class="btn btn-outline-primary"> Vazgeç </button>
    </div>
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Alan Adlarını Ekleyin </h3>
                <button class="btn btn-outline-primary"> Alan Adı Düzenle </button>
            </div>
            <div class="card-body">
                <p>
                    Sitenizi alan adınıza bağlayabilirsiniz veya Socore tarafından otomatik olarak atanan<br>
                    mysocore.net uzantılı alan adını kullanabilirsiniz.
                </p>
                <p>Web site adresiniz: <a href="https://denemedenalma.mysocore.net" target="_blank">denemedenalma.mysocore.net</a></p>
            </div>
            <hr>
            <div class="card-body">
                <form action="" method="POST" id="domain-register-form">
                    <div class="row" style="display: flex; align-items: end">
                        <div class="col-11">
                            <div class="">
                                <label for="domain" class="form-label"> Alan Adı </label>
                                <input type="text" class="form-control" id="domain" placeholder="socore.app">
                            </div>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-outline-primary" style="width: 100%"> Ekle </button>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th colspan="4"> İsim </th>
                        <th>Hareketler</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <td> 1 </td>
                        <td colspan="4"><a href="https://pulswave.com" target="_blank">pulswave.com</a> </td>
                        <td>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#manage-dns"> Düzenle </button>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="cart-title"> Alan Adı Ayarları </h3>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th> Ayar Adı </th>
                        <th> Kullanılacak Değer </th>
                        <th> Mevcut Ayar </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            A Kaydı <br> @
                        </td>
                        <td>
                            75.2.120.200 <br>
                            <a href="javascript: void(0);" style="color: #ff9f43;">Kopyala</a>
                        </td>
                        <td>
                            75.2.120.200 <br>
                            <a href="javascript: void(0);" style="color: #7367f0; cursor: inherit"> Doğrulanmış </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            CNAME Kaydı <br> www
                        </td>
                        <td>
                            59.128.2.178 <br>
                            <a href="javascript: void(0);" style="color: #ff9f43;">Kopyala</a>
                        </td>
                        <td>
                            75.2.120.200 <br>
                            <a href="javascript: void(0);" style="color: #7367f0; cursor: inherit"> Doğrulanmış </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade text-start" id="manage-dns" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> DNS Ayarları </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 0">
                    <p style="padding: 0.8rem 1.4rem;">Alan adınızın DNS ayarlarını düzenleyebilirsiniz.</p>
                    <table class="table custom-table" style="padding-bottom: 1.4rem;">
                        <thead>
                            <tr>
                                <th> Ana makine adı </th>
                                <th> Tür </th>
                                <th> TTL </th>
                                <th> Veriler </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>socore.net</td>
                                <td>NS</td>
                                <td>6 saat</td>
                                <td>ns-cloud-b1.googledomains.com. <br>
                                    ns-cloud-b2.googledomains.com. <br>
                                    ns-cloud-b3.googledomains.com. <br>
                                    ns-cloud-b4.googledomains.com.</td>
                            </tr>
                            <tr>
                                <td>socore.net	</td>
                                <td>SOA</td>
                                <td>6 saat</td>
                                <td>
                                    ns-cloud-b1.googledomains.com. <br> cloud-dns-hostmaster.google.com.
                                    <br> 5 21600 3600 259200 300
                                </td>
                            </tr>
                            <tr>
                                <td>_domainconnect.socore.net</td>
                                <td>CNAME</td>
                                <td>6 saat</td>
                                <td>connect.domains.google.com.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary"> Değerleri Düzenle </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{themeAssets('assets/js/pages/manage-domains.js')}}"></script>
@endsection