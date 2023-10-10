<div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth">
    <div class="modal-content">
        <div class="modal-header bg-transparent" style="border-bottom: 1px solid #3b4253;">
            <h3 class="modal-title"> Medya </h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pb-5 px-sm-5 mx-50 overflow-scroll h-100"
             id="loaderArea"
             style="height: calc(100vh / 2) !important">
            <div class="row position-relative">
                <div class="col-12">
                    <label class="card rounded border p-5 text-center rounded text-primary mb-2 bg-transparent shadow-none"
                           style="border: 2px dashed #7367f0!important;display: block;cursor: pointer; position: relative;">
                        Yüklemek İstediğin Dosyayı Buraya Sürükle Ve Bırak
                        <form id="new-media-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="file"
                                   style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;opacity: 0; width: 100%;height: 100%; cursor: pointer"
                                   id="mediaFileUploadInput"
                                   name="media_image"
                                   multiple>
                        </form>
                    </label>
                </div>
				<?php


					if (isset($data['search'])) {
						$mediaData = \Illuminate\Database\Capsule\Manager::table('media')
							->where('license', auth()->get('licenseId'))
							->where('title', 'like', '%' . $data['search'] . '%')
							->orderBy('id', 'desc')
							->get()
							->all();
					} else {
						$mediaData = \Illuminate\Database\Capsule\Manager::table('media')->where('license', auth()->get('licenseId'))->orderBy('id', 'desc')->get()->all();
					}

				?>
                <?php $__currentLoopData = $mediaData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-3">
                        <div class="card rounded border">
                            <label for="so-<?php echo e(md5($media->image)); ?>" style="position: relative">
                                <img class="card-img-top img-fluid rounded lazy"
                                     src="<?php echo e(imageUrl('media/' . $media->image)); ?>"
                                     style="height: 125px; width: 100%; object-fit: contain;border-bottom: 1px solid #3b4253"
                                     alt="<?php echo e($media->alternative); ?>">
                                <input type="checkbox"
                                       key="<?php echo e($media->id); ?>"
                                       style="position: absolute; bottom: 5px; right: 5px"
                                       value=""
                                       class="form-check-input media-select"
                                       id="so-<?php echo e(md5($media->image)); ?>">
                            </label>
                            <div class="card-body">
                                <p class="card-title text-truncate mb-0 font-medium-1"><?php echo e($media->title); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="modal-footer" style="display: flex;">
            <div class="input-group me-1" style="flex: 1">
                <input type="text"
                       class="form-control media-search-input"
                       placeholder="<?php echo trans("Ne aramıştın?") ?>"
                        <?php echo e(isset($data['search']) ? "value=".$data['search'] : ''); ?>>
                <button type="button" class="input-group-btn btn btn-primary" id="media-search-button"><?php echo trans("Ara") ?></button>
            </div>
            <button class="btn btn-primary w-auto" data-bs-dismiss="modal" type="button"><?php echo trans("Seç") ?></button>
        </div>
    </div>
</div>
<script>
    (function () {
        let selectMedia = $('#selectMedia');
        let mediaFileUploadInput = $('#mediaFileUploadInput');
        let formContainer = $('.formContainer');
        let loaderArea = $('#loaderArea');

        let mediaSearchInput = $('.media-search-input');
        let mediaSearchButton = $('#media-search-button');

        // Media File Upload
        mediaFileUploadInput.on('change', function () {
            let data = new FormData(document.getElementById('new-media-form'));

            loaderArea.block({
                message: '<div class="spinner-border text-white" role="status"></div>',
                timeout: 20000,
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS: {
                    opacity: 0.5
                }
            });

            $.ajax({
                url: url + 'api/new-media',
                data: data,
                method: 'POST',
                processData: false,
                contentType: false,
                responseType: 'json',
                success: function (response) {
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
                    setTimeout(function () {
                        $.post(url + 'api/getModal', {modal: 'media-content'}, function (response) {
                            selectMedia.html(response.html);
                        }, 'json');
                    }, 1000)
                }
            })
        });

        // Media Search
        mediaSearchButton.on('click', function (e) {
            loaderArea.block({
                message: '<div class="spinner-border text-white" role="status"></div>',
                timeout: 20000,
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS: {
                    opacity: 0.5
                }
            });

            setTimeout(function () {
                let data = {modal: 'media-content', data: {'search': mediaSearchInput.val()}}
                $.post(url + 'api/getModal', data, function (response) {
                    selectMedia.html(response.html);
                });
            }, 200);
            e.preventDefault();
        });
    })();
</script><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/modals/media-content.blade.php ENDPATH**/ ?>