<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">@trans(Marka Ekle)</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="newUserForm"
          autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="firstName">@trans(Ad)</label>
                    <input type="text"
                           id="firstName"
                           class="form-control"
                           name="firstName"
                           placeholder="@trans(Ad)">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="lastName">@trans(Soyad)</label>
                    <input type="text"
                           id="lastName"
                           class="form-control"
                           name="lastName"
                           placeholder="@trans(Soyad)">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="email">@trans(E-posta)</label>
                    <input type="email"
                           id="email"
                           class="form-control"
                           name="email"
                           placeholder="@trans(E-posta)">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="department">@trans(Departman)</label>
                    <select name="rank"
                            class="form-select"
                            required
                            id="department">
                        <option value=""> @trans(- Seçin -) </option>
                        <option value="1"> @trans(Yönetim) </option>
                        <option value="2"> @trans(Dijital Pazarlama) </option>
                        <option value="3"> @trans(Muhasebe) </option>
                        <option value="4"> @trans(Pazarlama) </option>
                        <option value="5"> @trans(Lojistik) </option>
                        <option value="6"> @trans(Operasyon) </option>
                        <option value="7"> @trans(Reklam) </option>
                        <option value="8"> @trans(Satın Alma) </option>
                        <option value="9"> @trans(İthalat) </option>
                        <option value="10"> @trans(İhracat) </option>
                        <option value="11"> @trans(Planlama) </option>
                        <option value="12"> @trans(Satış Geliştirme) </option>
                        <option value="13"> @trans(Ürün Geliştirme (Ar-Ge)) </option>
                        <option value="14"> @trans(Teknik Destek) </option>
                        <option value="15"> @trans(Bilgi İşlem) </option>
                        <option value="16"> @trans(Üretim) </option>
                        <option value="17"> @trans(İnsan Kaynakları) </option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label mb-1"> @trans(Yetkilendirme) </label>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="statistics"> @trans(İstatistikler) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="statistics"
                                   value="1"
                                   name="permission[statistics]">
                        </div>
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="orders"> @trans(Siparişler) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="orders"
                                   value="1"
                                   name="permission[orders]">
                        </div>
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="catalog"> @trans(Katalog) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="catalog"
                                   value="1"
                                   name="permission[catalog]">
                        </div>
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="marketing"> @trans(Pazarlama) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="marketing"
                                   value="1"
                                   name="permission[marketing]">
                        </div>
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="customers"> @trans(Müşteriler) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="customers"
                                   value="1"
                                   name="permission[customers]">
                        </div>
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="contents"> @trans(İçerikler) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="contents"
                                   value="1"
                                   name="permission[contents]">
                        </div>
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="design-settings"> @trans(Tasarım Ayarları) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="design-settings"
                                   value="1"
                                   name="permission[design-settings]">
                        </div>
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="settings"> @trans(Ayarlar) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="settings"
                                   value="1"
                                   name="permission[settings]">
                        </div>
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="applications"> @trans(Uygulamalar) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="applications"
                                   value="1"
                                   name="permission[applications]">
                        </div>
                        <div class="col-12 d-flex justify-content-between mb-1">
                            <label for="users"> @trans(Kullanıcılar) </label>
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="users"
                                   value="1"
                                   name="permission[users]">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <button type="submit"
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
<script>
    $('#newUserForm').on('submit', function () {
        $.post(url + 'api/newUser', $(this).serialize(), function (response) {
            if (response.error) {
                toastr.error(response.error.message, response.error.title, {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });
            } else {
                toastr.success(response.success.message, response.success.title, {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });
            }
        }, 'json');
    })
</script>