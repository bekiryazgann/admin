<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Header - 5</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="form-detail"
          autocomplete="off">
        <?php echo csrf_field(); ?>
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label"
                               for="search_bar_text">Arama metni</label>
                        <input type="text"
                               id="search_bar_text"
                               class="form-control"
                               name="search_bar_text"
                               value="<?php echo e(($data['search_bar_text']) ?? ''); ?>"
                               placeholder="Arama Metni">
                    </div>
                </div>
                <div class="col-12">ƒ
                    <div class="mb-1">
                        <label class="form-label"
                               for="sign_in_text">Giriş Yap Metni</label>
                        <input type="text"
                               id="sign_in_text"
                               class="form-control"
                               name="sign_in_text"
                               value="<?php echo e(($data['sign_in_text']) ?? ''); ?>"
                               placeholder="Giriş Yap Metni">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label"
                               for="sign_up_text">Kayıt Ol Metni</label>
                        <input type="text"
                               id="sign_up_text"
                               class="form-control"
                               name="sign_up_text"
                               value="<?php echo e(($data['sign_up_text']) ?? ''); ?>"
                               placeholder="Kayıt Ol Metni">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label" for="menu">Menü<i class="fas fa-database ms-50"></i></label>
                        <select name="" id="menu" class="form-select">
                            <option value="">Header Menu</option>
                            <option value="">Footer Menu</option>
                            <option value="">Header Menu - 3</option>
                            <option value="">Header menüleri</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label" for="search_bar_text">Logo</label>
                        <div class="alert alert-primary p-1">Logo güncellemeleri için lütfen genel ayarlar bölümünü kullanınız!</div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit"
                        class="btn btn-primary me-1 waves-effect waves-float waves-light w-100">
                    <?php echo trans("Kaydet") ?>
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    element = document.querySelector(`[data-role='<?php echo e($role); ?>'][data-id='<?php echo e($id); ?>'][data-key='<?php echo e($key); ?>']`);

    data = JSON.parse(element.getAttribute('data-json'));

    try {
        document.querySelectorAll('form#form-detail input').forEach(elem => {
            elem.addEventListener('input', (e) => {
                data.values[elem.name] = e.target.value;
                element.dataset.json = JSON.stringify(data);
            })
        })
    } catch (e){
        console.error(e);
    }
</script><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/web-builder/canvas/header/header-5.blade.php ENDPATH**/ ?>