<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Kampanya Ekle</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100 newCampaign"
          autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="campaign-name">@trans(Kampanya Adı) <span class="text-danger">*</span></label>
                    <input type="text"
                           id="campaign-name"
                           class="form-control"
                           name="name"
                           placeholder="@trans(Kampanya Adı)">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"> Kampanya Türü <span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-12 mb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="percentage_discount" value="1">
                                <label class="form-check-label" for="percentage_discount">Yüzdelik İndirim</label>
                            </div>
                        </div>
                        <div class="col-12 mb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="fixed_price" value="2" checked>
                                <label class="form-check-label" for="fixed_price">Sabit Fiyat</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="free_shipping" value="3">
                                <label class="form-check-label" for="free_shipping">Ücretsiz Kargo</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-1">
                    <div class="row valuesContent">
                        <h5 class="card-title mb-1 mt-2"> DEĞERLER </h5>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label"
                                       for="sale_fee">@trans(Kampanya İndirim Tutarı) <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">₺</span>
                                    <input type="text"
                                           id="sale_fee"
                                           class="form-control"
                                           name="sale_fee"
                                           placeholder="@trans(Örn:) 20">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="card-title mb-1 mt-2"> UYGULAMA KAPSAMI </h5>
            <div class="col-12">
                <div class="form-check form-check-inline mb-1">
                    <input class="form-check-input" type="checkbox" name="valid_all_product" id="valid_all_product" value="1">
                    <label class="form-check-label" for="valid_all_product">Tüm Ürünlerde Geçerli</label>
                </div>
            </div>
            <div class="col-12 valid_all_product_hide">
                <div class="mb-1 row">
                    <label for="valid_category" class="col-sm-12">
                        @trans(Geçerli Kategoriler)
                    </label>
                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                        <select class="tag-multi-select form-select" id="valid_category" multiple name="valid_category[]">
					        <?php
						        $categories = \Illuminate\Database\Capsule\Manager::table('category')
							        ->where('license', auth()->get('licenseId'))
							        ->get()
							        ->all();
					        foreach (listArray($categories) as $key => $category) {?>
                            <option value="<?= $key ?>"><?= $category['name'] ?></option>
					        <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 valid_all_product_hide">
                <div class="mb-1 row">
                    <label for="valid_product" class="col-sm-12">
                        @trans(Geçerli Ürünler)
                    </label>
                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                        <select class="tag-multi-select form-select" id="valid_product" multiple name="valid_product[]">
					        <?php
						        $products = \Illuminate\Database\Capsule\Manager::table('product')
							        ->where('license', auth()->get('licenseId'))
							        ->get()
							        ->all();
					        foreach ($products as $key => $product) {?>
                            <option value="<?= $key ?>"><?= shorter($product->name, 4) ?></option>
					        <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 valid_all_product_hide">
                <div class="mb-1 row">
                    <label for="valid_brand" class="col-sm-12">
                        @trans(Geçerli Markalar)
                    </label>
                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                        <select class="tag-multi-select form-select" id="valid_brand" multiple name="valid_brand[]">
					        <?php
						        $brands = \Illuminate\Database\Capsule\Manager::table('brand')
							        ->where('license', auth()->get('licenseId'))
							        ->get()
							        ->all();
					        foreach ($brands as $key => $brand) {?>
                            <option value="<?= $key ?>"><?= $brand->name ?></option>
					        <?php } ?>
                        </select>
                    </div>
                </div>
            </div>


            <h5 class="card-title mb-1 mt-2"> @trans(GEREKLİLİKLER) </h5>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="campaigns-seo-extension">@trans(Mimimum Geçerlilik Tutarı)</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="validity_fee">₺</span>
                        <input type="text"
                               id="validity_fee"
                               class="form-control"
                               name="validity_fee"
                               placeholder="@trans(Örn:) 100">
                    </div>
                </div>
            </div>

            <h5 class="card-title mb-1 mt-2">@trans(SEO BİLGİLERİ)</h5>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="campaigns-seo-extension">@trans(Kampanya Uzantısı)</label>
                    <input type="text"
                           id="campaigns-seo-extension"
                           class="form-control"
                           name="seo_extension"
                           placeholder="@trans(Kampanya Uzantısı)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="campaigns-seo-title">@trans(Kampanya Başlığı)</label>
                    <input type="text"
                           id="campaigns-seo-title"
                           class="form-control"
                           name="seo_title"
                           placeholder="@trans(Kampanya Başlığı)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="campaigns-seo-keywords">@trans(Anahtar Kelimeler)</label>
                    <input type="text"
                           id="campaigns-seo-keywords"
                           class="form-control"
                           name="seo_keywords"
                           placeholder="@trans(Anahtar Kelimeler)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="campaigns-seo-description">@trans(Açıklama)</label>
                    <input type="text"
                           id="campaigns-seo-description"
                           class="form-control"
                           name="seo_description"
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
        <div class="row pb-2">
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

    $('.newCampaign').on('submit', function(e){
        console.log($(this).serialize());
        $.post(url + "api/new-campaign", $(this).serialize(), function(response){
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
        e.preventDefault();
    });


    seoPreview.main(
        '#seo-preview',
        '#campaigns-seo-description',
        '#campaigns-seo-extension',
        '#campaigns-seo-title',
        '#campaigns-seo-keywords',
        'campaign'
    );
    $("[name='type']").on('change', function(){
       if($(this).val() === '1'){
            $('.valuesContent').html(`<h5 class="card-title mb-1 mt-2"> @trans(DEĞERLER) </h5>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label"
                                       for="campaigns-seo-extension">@trans(Kampanya İndirim Oranı) <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="sale-fee">%</span>
                                    <input type="text"
                                           id="sale-fee"
                                           class="form-control"
                                           name="sale_fee"
                                           placeholder="@trans(Örn:) 20">
                                </div>
                            </div>
                        </div>`);
       } else if($(this).val() === '2'){
            $('.valuesContent').html(`<h5 class="card-title mb-1 mt-2"> @trans(DEĞERLER) </h5>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label"
                                       for="campaigns-seo-extension">@trans(Kampanya İndirim Tutarı) <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="sale-fee">₺</span>
                                    <input type="text"
                                           id="sale-fee"
                                           class="form-control"
                                           name="sale_fee"
                                           placeholder="@trans(Örn:) 20">
                                </div>
                            </div>
                        </div>`);
       } else if($(this).val() === '3'){
            $('.valuesContent').html(`<input type="hidden" name="sale_fee" value="0">`);
       }
    });

    $('select#valid_category').select2({
        dropdownAutoWidth: false,
        width: $('select#valid_category').width(),
        dropdownParent: $('select#valid_category').parent()
    });
    $('select#valid_product').select2({
        dropdownAutoWidth: false,
        width: $('select#valid_product').width(),
        dropdownParent: $('select#valid_product').parent()
    });
    $('select#valid_brand').select2({
        dropdownAutoWidth: false,
        width: $('select#valid_brand').width(),
        dropdownParent: $('select#valid_brand').parent()
    });

    $('#valid_all_product').on('click', function(){
        if($(this)[0].checked === true){
            $('.valid_all_product_hide').hide();
        } else {
            $('.valid_all_product_hide').show();
        }
    })

</script>