<?php $__env->startSection('title', trans('Müşteriler')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"><?php echo trans("Markalar") ?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(siteUrl()); ?>"><?php echo trans("Yönetim Paneli") ?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <?php echo trans("Katalog") ?>
                            </li>
                            <li class="breadcrumb-item active">
                                <?php echo trans("Markalar") ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-end">
            <button class="btn btn-primary"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#newBrand"
                    aria-controls="newBrand">Yeni Marka</button>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-datatable" class="table">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table" id="markalar">
                            <thead style="position: sticky; top: 0; z-index: 0">
                            <tr>
                                <th></th>
                                <th><?php echo trans("Sıra") ?></th>
                                <th><?php echo trans("Logo") ?></th>
                                <th><?php echo trans("Marka Adı") ?></th>
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
    <div class="offcanvas offcanvas-end"
         tabindex="-1"
         id="newBrand"
         aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Kategori Ekle</h5>
            <button type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form class="form form-vertical d-flex flex-column justify-content-between h-100">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="category-name"><?php echo trans("Marka Adı") ?></label>
                            <input type="text"
                                   id="category-name"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="<?php echo trans("Marka Adı") ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="category-name"><?php echo trans("Açıklama") ?></label>
                            <input type="text"
                                   id="category-name"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="<?php echo trans("Açıklama") ?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="category-name"><?php echo trans("Marka Logosu") ?></label>
                            <div class="custom-file">
                                <input type="file"
                                       id="category-name"
                                       class="form-control"
                                       name="contact-icon"
                                       placeholder="<?php echo trans("Açıklama") ?>">
                            </div>
                        </div>
                    </div>


                    <h4 class="card-title">Seo Bilgileri</h4>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="brand-seo-extension"><?php echo trans("Marka Uzantısı") ?></label>
                            <input type="text"
                                   id="brand-seo-extension"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="<?php echo trans("Marka Uzantısı") ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="brand-seo-title"><?php echo trans("Marka Başlığı") ?></label>
                            <input type="text"
                                   id="brand-seo-title"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="<?php echo trans("Marka Başlığı") ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="brand-seo-keywords"><?php echo trans("Anahtar Kelimeler") ?></label>
                            <input type="text"
                                   id="brand-seo-keywords"
                                   class="form-control"
                                   name="contact-icon"
                                   placeholder="<?php echo trans("Anahtar Kelimeler") ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="brand-seo-description"><?php echo trans("Açıklama") ?></label>
                            <input type="text"
                                   id="brand-seo-description"
                                   class="form-control"
                                   name="contact-icon"
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
                        <button type="reset"
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
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')); ?>">
    <style>body {overflow: hidden;}</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
    <script src="<?php echo e(themeAssets('assets/js/seo-preview.min.js')); ?>"></script>
    <script>

        seoPreview.main(
            '#seo-preview',
            '#brand-seo-description',
            '#brand-seo-extension',
            '#brand-seo-title',
            '#brand-seo-keywords',
            'brand'
        );

        $('#markalar').DataTable({
            ajax: {url: "<?php echo e(siteUrl('api/brands')); ?>"},
            columns: [
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row, meta) {
                        return (
                            '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                            row.id +
                            '" /><label class="form-check-label" for="checkbox' +
                            row.id +
                            '"></label></div>'
                        );
                    },
                    checkboxes: {
                        selectAllRender:
                            '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" />' +
                            '<label class="form-check-label" for="checkboxSelectAll"></label>' +
                            '</div>'
                    }
                },
                {data: 'id'},
                {
                    data: 'image',
                    render: function (data, type, row) {
                        return `<img class='img-fluid' src='${row.image}' alt='${row.name}'/>`;
                    }
                },
                {data: 'name'},
                {
                    data: 'status',
                    orderable: false,
                    render: function (data, type, row) {
                        let content = '';
                        let clas = '';
                        if (data === 1) {
                            content = '<?php echo trans("Aktif") ?>';
                            clas = 'success';
                        } else if (data === 2) {
                            content = '<?php echo trans("Pasif") ?>';
                            clas = 'danger';
                        }
                        return `<div><span class="badge badge-light-${clas} text-center">${content}</span></div>`;
                    }
                },
                {
                    data: 'id',
                    width: '12%',
                    orderable: false,
                    render: function (data, type, row) {
                        return `<div class="row align-items-center" style="padding-bottom: 0;padding-right: 0; padding-left: 0;margin-left: -70%;">
                                    <div class="col-4">
                                        <a href="" class="btn btn-flat-primary">
                                            <i class="far fa-print" style="font-size: 18px"></i>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="" class="btn btn-flat-primary">
                                            <i class="far fa-edit" style="font-size: 18px"></i>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="" class="btn btn-flat-primary">
                                            <i class="far fa-ellipsis-v" style="font-size: 18px"></i>
                                        </a>
                                    </div>
                                </div>`;
                    }
                }
            ],
            ...datatableOptions
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/customers/customers.blade.php ENDPATH**/ ?>