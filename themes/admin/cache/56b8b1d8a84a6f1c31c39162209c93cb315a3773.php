<?php $__env->startSection('title', trans('Ürün Düzenle')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"><?php echo e(shorter(html_entity_decode($detail->name), 3)); ?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(siteUrl()); ?>"><?php echo trans("Yönetim Paneli") ?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <?php echo trans("Katalog") ?>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(siteUrl('catalog')); ?>"><?php echo trans("Ürünler") ?></a>
                            </li>
                            <li class="breadcrumb-item active">
                                <?php echo e(shorter(html_entity_decode($detail->name), 3)); ?>

                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-12">
            <form method="POST" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card bg-transparent box-shadow-0">
                    <div class="card-header">
                        <div></div>
                        <div>
                            <button class="btn btn-primary" type="submit"><?php echo trans("Kaydet") ?></button>
                            <button class="btn btn-outline-primary" type="reset"><?php echo trans("Vazgeç") ?></button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo trans("Temel Bilgiler") ?></h2>
                        <div class="row">
                            <div class="col-10">
                                <div class="mb-1 row">
                                    <label for="prodcut-name" class="col-sm-12">
                                        <?php echo trans("Ürün Adı") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="prodcut-name"
                                               name="product_name"
                                               value="<?php echo e(html_entity_decode($detail->name)); ?>"
                                               placeholder="<?php echo trans("Ürün Adı") ?>">
                                        <?php if (isset($errors['product_name'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['product_name'][0]?></div></div></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-1 row">
                                    <label for="product-type" class="col-sm-12"><?php echo trans("Ürün Türü") ?></label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <select name="product_type" id="product-type" class="form-select">
                                            <option value="1" <?php echo e(($detail->type == 1) ? 'selected' : ''); ?>><?php echo trans("Fiziksel") ?></option>
                                            <option value="2" <?php echo e(($detail->type == 2) ? 'selected' : ''); ?>><?php echo trans("Dijital") ?></option>
                                        </select>
                                        <?php if (isset($errors['product_type'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['product_type'][0]?></div></div></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-fee" class="col-sm-12">
                                        <?php echo trans("Satış Fiyatı") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control product-fee"
                                               id="product-fee"
                                               name="product_fee"
                                               value="<?php echo e($detail->fee); ?>"
                                               placeholder="<?php echo trans("Satış Fiyatı") ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-sale-fee" class="col-sm-12">
                                        <?php echo trans("İndirimli Satış Fiyatı") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control product-sale-fee"
                                               id="product-sale-fee"
                                               name="product_sale_fee"
                                               value="<?php echo e($detail->sale_fee); ?>"
                                               placeholder="<?php echo trans("İndirimli Satış Fiyatı") ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="purchase_price" class="col-sm-12">
                                        <?php echo trans("Alış Fiyatı") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control product-sale-fee"
                                               id="purchase_price"
                                               name="purchase_price"
                                               value="<?php echo e($detail->purchase_price); ?>"
                                               placeholder="<?php echo trans("Alış Fiyatı") ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="max_purchase" class="col-sm-12">
                                        <?php echo trans("Maksimum Satın Alma") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control product-sale-fee"
                                               id="max_purchase"
                                               name="max_purchase"
                                               value="<?php echo e($detail->max_purchase); ?>"
                                               placeholder="<?php echo trans("Maksimum Satın Alma") ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="product-images" class="col-sm-12">
                                        <?php echo trans("Ürün Görselleri") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="hidden" id="product-images" name="product_images" value='<?php echo e($detail->images); ?>'>
                                        <button type="button"
                                                class="btn btn-outline-primary text-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#selectMedia"
                                                aria-controls="selectMedia">
                                            <?php echo trans("Medyayı Kullan") ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-title"><?php echo trans("Stok Bilgileri") ?></h2>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-barcode" class="col-sm-12">
                                        <?php echo trans("Ürün Barkodu") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-barcode"
                                               name="product_barcode"
                                               value="<?php echo e($detail->stock_barcode); ?>"
                                               placeholder="<?php echo trans("Ürün Barkodu") ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-stock-code" class="col-sm-12">
                                        <?php echo trans("Stok Kodu") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-stock-code"
                                               name="product_stock_code"
                                               value="<?php echo e($detail->stock_code); ?>"
                                               placeholder="<?php echo trans("Stok Kodu") ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-stock-qty" class="col-sm-12">
                                        <?php echo trans("Stok Adedi") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-stock-qty"
                                               name="product_stock_qty"
                                               value="<?php echo e($detail->stock_qty); ?>"
                                               placeholder="<?php echo trans("Stok Adedi") ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-1 row">
                                    <label for="product-cargo-desi" class="col-sm-12">
                                        <?php echo trans("Kargo Desisi") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-cargo-desi"
                                               name="product_cargo_desi"
                                               value="<?php echo e($detail->stock_desi); ?>"
                                               placeholder="<?php echo trans("Kargo Desisi") ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo trans("Ürün Detayları") ?></h4>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-1 row">
                                    <label for="product-brand" class="col-sm-12">
                                        <?php echo trans("Marka") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <select class="form-select" id="product-brand" name="product_brand">
                                            <option disabled> - <?php echo trans("Marka") ?> -</option>
                                            <option value="0" <?php echo e(((int)$detail->brand == 0) ? 'selected' : ''); ?>> - <?php echo trans("Yok") ?> -</option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brand->id); ?>" <?php echo e(($detail->brand == $brand->id) ? 'selected' : ''); ?>><?php echo e($brand->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-1 row">
                                    <label for="tags" class="col-sm-12">
                                        <?php echo trans("Filtreler") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <select class="tag-multi-select form-select" id="tags" multiple
                                                name="product_filters[]">
                                            <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($filter->status)): ?>
                                                    <?php if($filter->status == 1): ?>
                                                        <optgroup label="<?php echo e($filter->name); ?>">
                                                            <?php $__currentLoopData = json_decode($filter->options, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($filter->id . "@" . $key); ?>" <?php echo e(in_array($filter->id . "@" . $key, json_decode($detail->tags, true)) ? 'selected' : ''); ?>>
                                                                    <?php echo e($filter->name); ?> → <?php echo e($options); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </optgroup>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-1 row">
                                    <label for="product-supplier" class="col-sm-12">
                                        <?php echo trans("Tedarikçi") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-supplier"
                                               name="product_supplier"
                                               value="<?php echo e($detail->supplier); ?>"
                                               placeholder="<?php echo trans("Tedarikçi") ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="categories" class="col-sm-12">
                                        <?php echo trans("Kategoriler") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <select class="tag-multi-select form-select" id="categories" multiple
                                                name="product_categories[]">
                                            <?php $__currentLoopData = listArray($categories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php echo e(in_array($key, json_decode($detail->category)) ? 'selected' : ''); ?>><?php echo $category['name']; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="product-short-description" class="col-sm-12">
                                        <?php echo trans("Ürün Kısa Açıklaması") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <input type="text"
                                               class="form-control form-control"
                                               id="product-short-description"
                                               name="product_short_description"
                                               value="<?php echo e(html_entity_decode($detail->short_description)); ?>"
                                               placeholder="<?php echo trans("Ürün Kısa Açıklaması") ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <label for="product-features-and-detailed-description" class="col-sm-15">
                                        <?php echo trans("Ürün Özellikleri ve Detaylı Açıklaması") ?>
                                    </label>
                                    <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                        <textarea type="text"
                                                  class="form-control form-control"
                                                  id="product-features-and-detailed-description"
                                                  name="product_long_description"
                                                  placeholder="<?php echo trans("Ürün Özellikleri ve Detaylı Açıklaması") ?>"><?php echo e(html_entity_decode($detail->long_description)); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <a class="card-header" data-action="collapse">
                        <h4 class="card-title"><?php echo trans("Arama Motoru Optimizasyonu (SEO)") ?></h4>
                        <i class="far fa-ellipsis-h-alt"></i>
                    </a>
                    <div class="card-content collapse">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-1 row">
                                        <label for="seo-category-extension" class="col-sm-12">
                                            <?php echo trans("Kategori Uzantısı") ?>
                                        </label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <input type="text"
                                                   class="form-control form-control"
                                                   id="seo-category-extension"
                                                   name="seo_extension"
                                                   value="<?php echo e($detail->seo_extension); ?>"
                                                   placeholder="<?php echo trans("Kategori Uzantısı") ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1 row">
                                        <label for="seo-tag-title" class="col-sm-12">
                                            <?php echo trans("Etiket Başlığı") ?>
                                        </label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <input type="text"
                                                   class="form-control form-control"
                                                   id="seo-tag-title"
                                                   name="seo_title"
                                                   value="<?php echo e($detail->seo_title); ?>"
                                                   placeholder="<?php echo trans("Etiket Başlığı") ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1 row">
                                        <label for="seo-keywords" class="col-sm-12">
                                            <?php echo trans("Anahtar Kelimeler") ?>
                                        </label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12">
                                            <input type="text"
                                                   class="form-control form-control"
                                                   id="seo-keywords"
                                                   name="seo_keywords"
                                                   value="<?php echo e($detail->seo_keywords); ?>"
                                                   placeholder="<?php echo trans("Anahtar Kelimeler") ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row match-height">
                                <div class="col-8">
                                    <div class="mb-1 row">
                                        <label for="seo-description" class="col-sm-12">
                                            <?php echo trans("Açıklama") ?>
                                        </label>
                                        <div class="col-sm-12 col-lg-12 col-xs-12 col-12 col-md-12 h-100">
                                            <textarea name="seo_description"
                                                      class="form-control h-100"
                                                      style="resize: none"
                                                      id="seo-description"
                                                      placeholder="<?php echo trans("Açıklama") ?>"><?php echo e($detail->seo_description); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1 row">
                                        <label for="" class="col-sm-12">
                                            <?php echo trans("Önizleme") ?>
                                        </label>
                                        <div class="col-12">
                                            <div class="seo-preview" id="seo-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <textarea name="variants_json" style="display: none; opacity: 0;" id="variants" cols="30" rows="10"><?php print_r($detail->variants) ?></textarea>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title" style="display: flex; align-items: center; justify-content: space-between">
                            <h4><?php echo trans("Varyantlar") ?></h4>
                            <button class="btn btn-outline-primary text-primary" type="button"
                                    data-bs-toggle="offcanvas"
                                    data-bs-target="#newVariant"
                                    aria-controls="newVariant">
                                <i class="far fa-plus me-50"></i> <?php echo trans("Varyant Ekle") ?>
                            </button>
                        </div>
                        <div class="card-content">
                            <ul class="list-group" id="all_variants_list"></ul>
                            <div class="table-responsive" style="margin-top: 20px;">
                                <table class="table" id="variants_table">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check_all_table" class="form-check-input"></th>
                                        <th>İsim</th>
                                        <th>Satış Fiyatı</th>
                                        <th>İndirimli Fiyat</th>
                                        <th>Stok Kodu</th>
                                        <th>Desi</th>
                                        <th>Barkod</th>
                                        <th>Stok</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-transparent box-shadow-0">
                    <div class="card-header">
                        <div></div>
                        <div>
                            <button class="btn btn-primary" type="submit"><?php echo trans("Kaydet") ?></button>
                            <button class="btn btn-outline-primary" type="reset"><?php echo trans("Vazgeç") ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="newVariant" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Varyant Ekle</h5>
            <button type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="form form-vertical d-flex flex-column justify-content-between h-100">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="variant-type-name"><?php echo trans("Varyant Adı") ?></label>
                            <input type="text"
                                   id="variant-type-name"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="<?php echo trans("Varyant Adı") ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="variant_type"><?php echo trans("Türü") ?></label>
                            <select name="" id="variant_type" class="form-select">
                                <option value="option"> Seçenek </option>
                                <option value="color"> Renk </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label for="variant_content" class="form-label"> Varyantlar </label>
                            <input class="form-control"
                                   type="text"
                                   name="variant_content"
                                   id="variant_content" placeholder="Kırımızı">
                            <p>
                                <span class="text-muted">Enter tuşunu kullanarak ekleme yapabilirsiniz.</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="list-group" id="variants_list_canvas"></ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary waves-effect waves-float waves-light w-100 text-center" id="add_variant">
                            <?php echo trans("Ekle") ?>
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="reset"
                                class="btn btn-outline-primary waves-effect waves-float waves-light w-100 text-center"
                                data-bs-dismiss="offcanvas">
                            <?php echo trans("Vazgeç") ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(themeAssets('app-assets/vendors/css/forms/select/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(themeAssets('app-assets/vendors/js/forms/select/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(themeAssets('app-assets/vendors/js/forms/cleave/cleave.min.js')); ?>"></script>
    <script src="<?php echo e(themeAssets('assets/js/seo-preview.min.js')); ?>"></script>
    <script src="<?php echo e(themeAssets('assets/js/pages/new-product.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/catalog/edit-product.blade.php ENDPATH**/ ?>