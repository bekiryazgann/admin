<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Kupon Düzenle</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100" id="newCouponForm">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="coupon-name"><?php echo trans("Kupon Adı") ?></label>
                    <input type="text"
                           id="coupon-name"
                           class="form-control"
                           name="coupon_name"
                           value="<?php echo e($data['name']); ?>"
                           placeholder="<?php echo trans("Kupon Adı") ?>">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="coupon-code"><?php echo trans("Kupon Kodu") ?></label>
                    <input type="text"
                           id="coupon-code"
                           class="form-control"
                           name="coupon_code"
                           value="<?php echo e($data['code']); ?>"
                           placeholder="<?php echo trans("Kupon Kodu") ?>">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="coupon-code"><?php echo trans("Mimimum Geçerlilik Tutarı") ?></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">₺</span>
                        <input type="text"
                               id="coupon-code"
                               class="form-control"
                               name="coupon_min"
                               value="<?php echo e($data['min']); ?>"
                               placeholder="<?php echo trans("Mimimum Geçerlilik Tutarı") ?>">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label" for="coupon-type"><?php echo trans("Kupon Türü") ?></label>
                    <select name="coupon_type" id="coupon-type" class="form-select">
                        <option value="1" <?php echo e(($data['type'] == 1) ? 'selected' : ''); ?>><?php echo trans("Yüzde Bazlı") ?></option>
                        <option value="2" <?php echo e(($data['type'] == 2) ? 'selected' : ''); ?>><?php echo trans("Birim Bazlı") ?></option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="coupon-sale"><?php echo trans("Kupon İndirim Oranı") ?></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="coupon-type-content">%</span>
                        <input type="text"
                               id="coupon-sale"
                               class="form-control"
                               value="<?php echo e($data['sale']); ?>"
                               name="coupon_sale"
                               placeholder="<?php echo trans("Kupon İndirim Oranı") ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit"
                        class="btn btn-primary me-1 waves-effect waves-float waves-light w-100">
                    <?php echo trans("Kaydet") ?>
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
    $('#coupon-type').on('change', function(){
        if(Number($(this).val()) === 1){
            $('#coupon-type-content').html('%');
        } else {
            $('#coupon-type-content').html('₺');
        }
    });

    $('#newCouponForm').on('submit', function (e) {
        $.post(url + 'api/editCoupon', $(this).serialize() + '&id=<?php echo e($data['id']); ?>', function (response) {
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
        }, 'json')

        e.preventDefault();
    })
</script><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/modals/edit-coupon.blade.php ENDPATH**/ ?>