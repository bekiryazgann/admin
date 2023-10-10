@extends('layouts.layout')
@section('title', 'Seo ve Alan Adı')
@section('content')
    <div class="content-header">

    </div>
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Alan Adı </h3>
                <a class="btn btn-outline-primary" href="{{siteUrl('settings/system-settings/seo-and-domain/manage-domains')}}"> Alan Adlarını Yönet </a>
            </div>
            <div class="card-body">
                <p>
                    Sitenizi alan adınıza bağlayabilirsiniz veya Socore tarafından otomatik olarak atanan<br>
                    mysocore.net uzantılı alan adını kullanabilirsiniz.
                </p>
                <p>Web site adresiniz: <a href="https://denemedenalma.mysocore.net" target="_blank" class="text-primary">denemedenalma.mysocore.net</a></p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Robots.txt Dosyası </h3>
                <button class="btn btn-outline-primary"> Robots.txt Düzenle </button>
            </div>
            <div class="card-body">
                <p>
                    Robots.txt dosyanızı düzenleyerek web sitenizden bilgi toplayan Arama <br>
                    motorlarının web sitenizde hangi sayfaları düzenli olarak tarayacaklarını <br>
                    yöntebilirsiniz.
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Yönlendirmeler </h3>
                <button class="btn btn-outline-primary"> Yönlendirmeleri Yönet </button>
            </div>
            <div class="card-body">
                <p>
                    Web sayfalarınızı yeni bir adrese taşırken, 301 yönlendirmesi kullanarak <br>
                    kalıcı değişiklikleri arama motorlarına bildirebilirsiniz. Ayrıca, geçici <br>
                    yönlendirmeler için 302 yönlendirmesini kullanarak kullanıcıları doğru <br>
                    adrese yönlendirebilirsiniz.
                </p>
            </div>
        </div>
    </div>
@endsection