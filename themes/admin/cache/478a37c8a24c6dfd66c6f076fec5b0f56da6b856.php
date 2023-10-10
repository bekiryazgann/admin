<?php $__env->startSection('title', trans('Slider Düzenle')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"><?php echo trans("Slider Düzenle") ?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(siteUrl()); ?>"><?php echo trans("Yönetim Paneli") ?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <?php echo trans("Tasarım Ayarları") ?>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(siteUrl('design-settings/slider-settings')); ?>"><?php echo trans("Slider Ayarları") ?></a>
                            </li>
                            <li class="breadcrumb-item active">
                                <?php echo trans("Slider Düzenle") ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <form method="POST">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body row">
                    <div class="col-12 row align-items-end">
                        <div class="mb-2 col-6">
                            <span class="form-label"> Slider Başlığı </span>
                            <input type="text" name="slider_title" id="slider_title" value="<?php echo e($data->name); ?>" class="form-control" placeholder="Açılış alanı slider'ı">
                        </div>
                        <div class="mb-2 col-6 d-flex justify-content-end">
                            <button class="btn btn-primary" type="button" id="newSlide">
                                <i class="fas fa-plus"></i>
                                <span> Yeni Slide </span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 row mt-5" id="appendElement">
                        <?php $__currentLoopData = $data->json; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 row" style="gap: 20px 0" id="containerElement" data-id="<?php echo e($key); ?>">
                                <div style="padding-left: calc(var(--bs-gutter-x) * .5); width: 100%">
                                    <hr>
                                </div>

                                <div class="col-2">
                                    <span class="form-label"> Görsel <span class="text-muted"> Masaüstü İçin </span> </span>
                                    <button type="button"
                                            class="btn btn-outline-primary text-primary"
                                            data-bs-toggle="modal"
                                            data-key="desktop_<?php echo e($key); ?>"
                                            data-buttonId="desktop_<?php echo e($key); ?>"
                                            data-bs-target="#selectMedia"
                                            aria-controls="selectMedia">
                                        <input type="hidden" id="slider_image_desktop_<?php echo e($key); ?>" name="slider[<?php echo e($key); ?>][slider_image_desktop]"
                                               data-inputId="desktop_<?php echo e($key); ?>" value='<?= $slide->slider_image_desktop ?>'>
                                        Medyayı Kullan
                                    </button>
                                </div>
                                <div class="col-2">
                                    <span class="form-label"> Görsel <span class="text-muted"> Telefon İçin </span></span>
                                    <button type="button"
                                            class="btn btn-outline-primary text-primary"
                                            data-bs-toggle="modal"
                                            data-key="mobile_<?php echo e($key); ?>"
                                            data-buttonId="mobile_<?php echo e($key); ?>"
                                            data-bs-target="#selectMedia"
                                            aria-controls="selectMedia">

                                        <input type="hidden" id="slider_image_mobile_<?php echo e($key); ?>" name="slider[<?php echo e($key); ?>][slider_image_mobile]"
                                               data-inputId="mobile_<?php echo e($key); ?>" value='<?php echo $slide->slider_image_mobile; ?>'>
                                        Medyayı Kullan
                                    </button>
                                </div>
                                <div class="col-4">
                                    <span class="form-span"> Açıklama </span>
                                    <input type="text" name="slider[<?php echo e($key); ?>][slider_description]" class="form-control" placeholder="Açıklama" id="slider_description" value="<?php echo e($slide->slider_description); ?>">
                                </div>
                                <div class="col-2">
                                    <span class="form-label"> Bağlantı </span>
                                    <input type="text" name="slider[<?php echo e($key); ?>][slider_link]" class="form-control" placeholder="https://socore.net" id="slider_link" value="<?php echo e($slide->slider_link); ?>">
                                </div>
                                <div class="col-2 d-flex align-items-end">
                                    <button class="btn btn-danger w-100" type="button" id="sliderDelete" data-key="<?php echo e($key); ?>">
                                        <i class="fas fa-trash"></i>
                                        <span> Sil </span>
                                    </button>
                                </div>
                                <div class="col-2">
                                    <div class="form-check form-check-primary form-switch">
                                        <input type="checkbox"
                                               <?= isset($slide->slide_active) && $slide->slide_active === 'on' ? 'checked' : '' ?>
                                               class="form-check-input no-size" id="slide_active" name="slider[<?php echo e($key); ?>][slide_active]">
                                        <span class="form-label"> Aktif </span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check form-check-primary form-switch">
                                        <input type="checkbox" class="form-check-input no-size"
                                               <?= isset($slide->slide_target) && $slide->slide_target === 'on' ? 'checked' : '' ?>
                                               id="slide_target" name="slider[<?php echo e($key); ?>][slide_target]">
                                        <span class="form-label"> Bağlantıyı Yeni Sekmede Aç </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="card bg-transparent box-shadow-0">
                <div class="card-header" style="padding: 0;">
                    <div></div>
                    <div>
                        <button class="btn btn-primary" type="submit"><?php echo trans("Kaydet") ?></button>
                        <button class="btn btn-outline-primary" type="reset"><?php echo trans("Vazgeç") ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(themeAssets('assets/js/pages/edit-slider.js')); ?>"></script>
    <script>
        <?php $__currentLoopData = $data->json; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            MultiMediaSelect.main(`#slider_image_mobile_<?php echo e($key); ?>`, `[data-key="mobile_<?php echo e($key); ?>"]`, "<?php echo e($key); ?>")
            MultiMediaSelect.main(`#slider_image_desktop_<?php echo e($key); ?>`, `[data-key="desktop_<?php echo e($key); ?>"]`, "<?php echo e($key); ?>")
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/design-settings/edit-slider.blade.php ENDPATH**/ ?>