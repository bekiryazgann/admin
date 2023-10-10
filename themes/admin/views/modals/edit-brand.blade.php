<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">@trans(Marka Düzenle)</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="editBrandForm"
          autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-name">@trans(Marka Adı)</label>
                    <input type="text"
                           id="category-name"
                           class="form-control"
                           name="brand_name"
                           value="{{$data['name']}}"
                           placeholder="@trans(Marka Adı)">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-name">@trans(Açıklama)</label>
                    <input type="text"
                           id="category-name"
                           class="form-control"
                           name="brand_description"
                           value="{{$data['description']}}"
                           placeholder="@trans(Açıklama)">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-name">@trans(Marka Logosu)</label>
                    <br>
                    <input type="hidden" id="brand-images" name="brand_image" value='["{{$data['image']}}"]'>
                    <button type="button"
                            class="btn btn-outline-primary text-primary w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#selectMedia"
                            aria-controls="#selectMedia">
                        @trans(Medyayı Kullan)
                    </button>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label for="status"
                           class="form-label">Marka Durumu</label>
                    <select name="status" id="status" class="form-select">
                        <option value="1" {{($data['status'] == 1) ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{($data['status'] == 0) ? 'selected' : ''}}>Pasif</option>
                    </select>
                </div>
            </div>


            <h4 class="mb-1 fs-6 fw-bolder mt-2"
                style="color: #b4b7bd">Seo Bilgileri</h4>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="brand-seo-extension">@trans(Marka Uzantısı)</label>
                    <input type="text"
                           id="brand-seo-extension"
                           class="form-control"
                           name="brand_seo_extension"
                           value="{{$data['seo_extension']}}"
                           placeholder="@trans(Marka Uzantısı)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="brand-seo-title">@trans(Marka Başlığı)</label>
                    <input type="text"
                           id="brand-seo-title"
                           class="form-control"
                           name="brand_seo_title"
                           value="{{$data['seo_title']}}"
                           placeholder="@trans(Marka Başlığı)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="brand-seo-keywords">@trans(Anahtar Kelimeler)</label>
                    <input type="text"
                           id="brand-seo-keywords"
                           class="form-control"
                           name="brand_seo_keywords"
                           value="{{$data['seo_keywords']}}"
                           placeholder="@trans(Anahtar Kelimeler)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="brand-seo-description">@trans(Açıklama)</label>
                    <input type="text"
                           id="brand-seo-description"
                           class="form-control"
                           name="brand_seo_description"
                           value="{{$data['seo_description']}}"
                           placeholder="@trans(Açıklama)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1 row">
                    <label for="" class="col-sm-12">
                        @trans(Önizleme)
                    </label>
                    <div class="col-12">
                        <div class="seo-preview" id="seo-preview"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit"
                        class="btn btn-primary me-1 waves-effect waves-float waves-light w-100">
                    @trans(Kaydet)
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
    MediaSelect.main('#brand-images');
    seoPreview.main(
        '#seo-preview',
        '#brand-seo-description',
        '#brand-seo-extension',
        '#brand-seo-title',
        '#brand-seo-keywords',
        'brand'
    );
    $('#editBrandForm').on('submit', function () {
        $.post(url + 'api/editBrand', $(this).serialize() + '&id={{$data['id']}}', function (response) {
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