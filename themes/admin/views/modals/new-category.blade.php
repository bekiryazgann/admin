<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Kategori Ekle</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="addCategoryForm"
          onsubmit="void(0)"
          autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-name">@trans(Kategori Adı)</label>
                    <input type="text"
                           id="category-name"
                           class="form-control"
                           name="category_name"
                           placeholder="@trans(Kategori Adı)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-name">@trans(Kategori Görseli)</label>
                    <br>
                    <input type="hidden" id="category-images" name="category_image" value=''>
                    <button type="button"
                            class="btn btn-outline-primary text-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#selectMedia"
                            aria-controls="#selectMedia">
                        @trans(Medyayı Kullan)
                    </button>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="option-type">@trans(Üst Kategori)</label>
                    <select name="top_category" id="option-type" class="form-select">
                        <option value="0" selected>Yok</option>
                        @php
                            $topCategories = \Illuminate\Database\Capsule\Manager::table('category')
                                ->where('license', auth()->get('licenseId'))
                                ->get()
                                ->all();
                        @endphp
                        @foreach(listArray($topCategories) as $key => $value)
                            <option value="{{$key}}">{{$value['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category_status">@trans(Durum)</label>
                    <select name="category_status" id="category_status" class="form-select">
                        <option value="1" selected>@trans(Aktif)</option>
                        <option value="0">@trans(Pasif)</option>
                    </select>
                </div>
            </div>

            <h4 class="card-title">Seo Bilgileri</h4>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-seo-extension">@trans(Kategori Uzantısı)</label>
                    <input type="text"
                           id="category-seo-extension"
                           class="form-control"
                           name="category_extension"
                           placeholder="@trans(Kategori Uzantısı)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-seo-title">@trans(Etiket Başlığı)</label>
                    <input type="text"
                           id="category-seo-title"
                           class="form-control"
                           name="category_title"
                           placeholder="@trans(Kategori Başlığı)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-seo-keywords">@trans(Anahtar Kelimeler)</label>
                    <input type="text"
                           id="category-seo-keywords"
                           class="form-control"
                           name="category_keywords"
                           placeholder="@trans(Anahtar Kelimeler)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-seo-description">@trans(Açıklama)</label>
                    <input type="text"
                           id="category-seo-description"
                           class="form-control"
                           name="category_description"
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
    seoPreview.main(
        '#seo-preview',
        '#category-seo-description',
        '#category-seo-extension',
        '#category-seo-title',
        '#category-seo-keywords',
        'category'
    );

    MediaSelect.main('#category-images');

    $('#addCategoryForm').on('submit', function () {
       $.post(url + 'api/newCategory', $(this).serialize(), function(response){
           if(response.error){
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
       });
    });
</script>