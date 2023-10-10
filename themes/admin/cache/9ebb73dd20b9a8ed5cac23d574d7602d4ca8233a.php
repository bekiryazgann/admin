<?php $__env->startSection('title', 'Kategoriler'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"><?php echo trans("Kategoriler") ?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(siteUrl()); ?>"><?php echo trans("Yönetim Paneli") ?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <?php echo trans("Katalog") ?>
                            </li>
                            <li class="breadcrumb-item active">
                                <?php echo trans("Kategoriler") ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-end">
            <button class="btn btn-primary"
                    id="newCategoryCanvasControl">Yeni Kategori</button>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-datatable" class="table">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table" id="kategori-tablosu">
                            <thead style="position: sticky; top: 0; z-index: 0">
                            <tr>
                                <th></th>
                                <th><?php echo trans("Sıra") ?></th>
                                <th><?php echo trans("Görsel") ?></th>
                                <th><?php echo trans("Kategori Adı") ?></th>
                                <th><?php echo trans("Üst Kategori") ?></th>
                                <th><?php echo trans("Durum") ?></th>
                                <th><?php echo trans("Hareketler") ?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="canvas" aria-labelledby="offcanvasEndLabel"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/animate/animate.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/extensions/sweetalert2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/plugins/extensions/ext-component-sweet-alerts.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')); ?>">
<style>body {overflow: hidden;}</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/extensions/polyfill.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/jszip.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/tables/datatable/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(themeAssets('assets/js/seo-preview.js')); ?>"></script>
<script src="<?php echo e(themeAssets('assets/js/pages/categories.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/catalog/categories.blade.php ENDPATH**/ ?>