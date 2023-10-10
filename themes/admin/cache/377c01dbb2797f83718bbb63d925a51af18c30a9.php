<?php $__env->startSection('title', trans('Medya Yöneticisi')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"><?php echo trans("Medya Yöneticisi") ?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(siteUrl()); ?>"><?php echo trans("Yönetim Paneli") ?></a>
                            </li>
                            <li class="breadcrumb-item active">
                                <?php echo trans("Medya Yöneticisi") ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-end">
            <button class="btn btn-primary"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#newMedia"
                    aria-controls="newMedia">Yeni Medya
            </button>
        </div>
    </div>
    <div class="card">
        <?php if(1 < 0): ?>
            <div class="card-header" style="border-bottom: 1px solid #ebe9f1">
                <div class="row d-flex align-items-center w-100">
                    <div class="col-6">
                        <ul class="navbar-nav d-flex flex-row">
                            <li class="nav-item">
                                <a href="" class="nav-link me-50 p-1 btn btn-outline-primary active">
                                    Tümü
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link me-50 ms-50 p-1 btn btn-outline-primary">
                                    Görseller
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link me-50 ms-50 p-1 btn btn-outline-primary">
                                    Videolar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link me-50 ms-50 p-1 btn btn-outline-primary">
                                    Belgeler
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link ms-50 p-1 btn btn-outline-primary">
                                    Sesler
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="row w-100 /pt-3/ match-height">
                <?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-3">
                        <div class="card border">
                            <img class="card-img-top img-fluid" src="<?php echo e(imageUrl('media/' . $item->image)); ?>"
                                 style="height: 250px; width: 100%; object-fit: contain;border-bottom: 1px solid #ebe9f1"
                                 alt="<?php echo e($item->alternative); ?>">
                            <div class="card-body" style="position: relative;">
                                <button style="border: 0; background: transparent; position: absolute; top: 10px; right: 10px"
                                        data-role="media-image-delete" data-key="<?php echo e($item->id); ?>">
                                    <i class="fal fa-trash"></i>
                                </button>
                                <div class="text-muted text-start"><?php echo e(carbon()::parse($item->date)->diffForHumans()); ?></div>
                                <h4 class="card-text text-truncate font-medium-5"><?php echo e($item->title); ?></h4>
                                <a class="text-truncate nav-link mt-1 p-0">
                                    <?php echo e(strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 4)) . ':' . siteUrl('media/' . $item->image)); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end"
         tabindex="-1"
         id="newMedia"
         aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Medya Ekle</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form class="form form-vertical d-flex flex-column justify-content-between h-100"
                  id="add_new_media"
                  enctype="multipart/form-data"
                  action="<?php echo e(siteUrl('media-manager/new')); ?>"
                  method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-12" id="media-where-content">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="media-image"><?php echo trans("Medya Dosyası") ?>*</label>
                            <input type="file"
                                   id="media-image"
                                   class="form-control"
                                   name="media_image">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="media-title"><?php echo trans("Başlık") ?>*</label>
                            <input type="text"
                                   id="media-title"
                                   class="form-control"
                                   name="media_title"
                                   placeholder="<?php echo trans("Başlık") ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="media-alternative"><?php echo trans("Alternatif Metin") ?></label>
                            <input type="text"
                                   id="media-alternative"
                                   class="form-control"
                                   name="media_alternative"
                                   placeholder="<?php echo trans("Alternatif Metin") ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label"
                                   for="media-definition"><?php echo trans("Tanım") ?></label>
                            <textarea type="text"
                                      id="media-definition"
                                      class="form-control"
                                      name="media_definition"
                                      placeholder="<?php echo trans("Tanım") ?>"></textarea>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="mb-1 d-flex align-items-center justify-content-between">
                            <label for="image-webp-status" class="">WEBP</label>
                            <div class="ms-auto">
                                <div class="form-check form-switch form-check-primary">
                                    <input type="checkbox" class="form-check-input" id="image-webp-status"
                                           name="image_webp_status">
                                    <label class="form-check-label" for="image-webp-status">
                                        <span class="switch-icon-left">
                                            <i class="far fa-check" style="margin-top: 4px;"></i>
                                        </span>
                                        <span class="switch-icon-right">
                                            <i class="far fa-times" style="margin-top: 4px;"></i>
                                        </span>
                                    </label>
                                </div>
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
    </div>
    <script>
        let elems = document.querySelectorAll('[data-role="media-image-delete"]');
        elems.forEach(elem => {
            elem.addEventListener('click', e => {
                let key = elem.dataset.key;
                elem.parentElement.parentElement.parentElement.remove()

                fetch('<?php echo e(siteUrl('api/delete-media')); ?>', {
                    method: 'POST',
                    headers: {
                      "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: 'key=' + key
                })
                    .then(res => res.json())
                    .then(json => console.log(json));
                e.preventDefault();
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/media/main.blade.php ENDPATH**/ ?>