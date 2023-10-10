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
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-name"><?php echo trans("Kategori Adı") ?></label>
                    <input type="text"
                           id="category-name"
                           class="form-control"
                           name="category_name"
                           placeholder="<?php echo trans("Kategori Adı") ?>">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-name"><?php echo trans("Kategori Görseli") ?></label>
                    <br>
                    <input type="hidden" id="category-images" name="category_image" value=''>
                    <button type="button"
                            class="btn btn-outline-primary text-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#selectMedia"
                            aria-controls="#selectMedia">
                        <?php echo trans("Medyayı Kullan") ?>
                    </button>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="option-type"><?php echo trans("Üst Kategori") ?></label>
                    <select name="top_category" id="option-type" class="form-select">
                        <option value="0" selected>Yok</option>
                        <?php
                            $topCategories = \Illuminate\Database\Capsule\Manager::table('category')
                                ->where('license', auth()->get('licenseId'))
                                ->get()
                                ->all();
                        ?>
                        <?php $__currentLoopData = listArray($topCategories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($value['name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category_status"><?php echo trans("Durum") ?></label>
                    <select name="category_status" id="category_status" class="form-select">
                        <option value="1" selected><?php echo trans("Aktif") ?></option>
                        <option value="0"><?php echo trans("Pasif") ?></option>
                    </select>
                </div>
            </div>

            <h4 class="card-title">Seo Bilgileri</h4>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-seo-extension"><?php echo trans("Kategori Uzantısı") ?></label>
                    <input type="text"
                           id="category-seo-extension"
                           class="form-control"
                           name="category_extension"
                           placeholder="<?php echo trans("Kategori Uzantısı") ?>">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-seo-title"><?php echo trans("Etiket Başlığı") ?></label>
                    <input type="text"
                           id="category-seo-title"
                           class="form-control"
                           name="category_title"
                           placeholder="<?php echo trans("Kategori Başlığı") ?>">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-seo-keywords"><?php echo trans("Anahtar Kelimeler") ?></label>
                    <input type="text"
                           id="category-seo-keywords"
                           class="form-control"
                           name="category_keywords"
                           placeholder="<?php echo trans("Anahtar Kelimeler") ?>">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="category-seo-description"><?php echo trans("Açıklama") ?></label>
                    <input type="text"
                           id="category-seo-description"
                           class="form-control"
                           name="category_description"
                           placeholder="<?php echo trans("Açıklama") ?>">
                </div>
            </div>
            <div class="col-12">
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
        <div class="row">
            <div class="col-6">
                <button type="submit"
                        class="btn btn-primary me-1 waves-effect waves-float waves-light w-100">
                    <?php echo trans("Ekle") ?>
                </button>
            </div>
            <div class="col-6">
                <button type="reset"
                        class="btn btn-outline-primary me-1 waves-effect waves-float waves-light w-100"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close">
                    <?php echo trans("Vazgeç") ?>
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
</script><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/modals/new-category.blade.php ENDPATH**/ ?>