<?php $__env->startSection('title', trans('Kurumsal Bilgiler')); ?>
<?php $__env->startSection('content'); ?>
    <form method="post" enctype="multipart/form-data">

        <div class="content-header">
            <div class="card bg-transparent box-shadow-0">
                <div class="card-header p-0">
                    <h3 class="m-0 font-medium-4 p-0"><?php echo trans("Kurumsal Bilgiler") ?></h3>
                    <div>
                        <button class="btn btn-primary" type="submit"><?php echo trans("Kaydet") ?></button>
                        <button class="btn btn-outline-primary" type="reset"><?php echo trans("Vazgeç") ?></button>
                    </div>
                </div>
            </div>
            <div class="alert alert-primary">
                <div class="alert-body">
                    Bu bilgiler faturalarınızda, müşteri destek süreçlerinde ve Socore ile iletişim süreçlerinde kullanılacaktır.
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="card" style="background: transparent; box-shadow: none">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <?php echo trans("Firma Bilgileri") ?> </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-6">
                                        <div class="mb-1 row">
                                            <label for="company_name"
                                                   class="col-sm-12 form-label"><?php echo trans("Firma Adı") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="company_name"
                                                       name="company_name"
                                                       value="<?php echo e($data->company_name); ?>"
                                                       placeholder="<?php echo trans("Socore") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1 row">
                                            <label for="company_official_name"
                                                   class="col-sm-12 form-label"><?php echo trans("Firma Resmi Adı") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="company_official_name"
                                                       name="company_official_name"
                                                       value="<?php echo e($data->company_official_name); ?>"
                                                       placeholder="<?php echo trans("Socore Dijital Sistemler Teknoloji LTD. ŞTİ.") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <label for="authorized_person"
                                                   class="col-sm-12 form-label"><?php echo trans("Yetkili Kişi") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="authorized_person"
                                                       name="authorized_person"
                                                       value="<?php echo e($data->authorized_person); ?>"
                                                       placeholder="<?php echo trans("Mert Uçar") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1 row">
                                            <label for="phone_number"
                                                   class="col-sm-12 form-label"><?php echo trans("Telefon No") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="phone_number"
                                                       name="phone_number"
                                                       value="<?php echo e($data->phone_number); ?>"
                                                       placeholder="<?php echo trans("+90 532 611 11 29") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1 row">
                                            <label for="fax"
                                                   class="col-sm-12 form-label"><?php echo trans("Faks") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="fax"
                                                       name="fax"
                                                       value="<?php echo e($data->fax); ?>"
                                                       placeholder="Faks No">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-1 row">
                                            <label for="country"
                                                   class="col-sm-12 form-label"><?php echo trans("Ülke") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="country"
                                                       name="country"
                                                       value="<?php echo e($data->country); ?>"
                                                       placeholder="Türkiye">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-1 row">
                                            <label for="city"
                                                   class="col-sm-12 form-label"><?php echo trans("Şehir") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="city"
                                                       name="city"
                                                       value="<?php echo e($data->city); ?>"
                                                       placeholder="İstanbul">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-1 row">
                                            <label for="district"
                                                   class="col-sm-12 form-label"><?php echo trans("İlçe") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="district"
                                                       name="district"
                                                       value="<?php echo e($data->district); ?>"
                                                       placeholder="Kadıköy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-1 row">
                                            <label for="post_code"
                                                   class="col-sm-12 form-label"><?php echo trans("Posta Kodu") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="post_code"
                                                       name="post_code"
                                                       value="<?php echo e($data->post_code); ?>"
                                                       placeholder="34744">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <label for="address"
                                                   class="form-label col-sm-12"><?php echo trans("Açık Adres") ?></label>
                                            <div class="col-12">
                                                <textarea class="form-control"
                                                          id="address"
                                                          name="address"
                                                          placeholder="Atatürk mah. Hülagü han Cd. Çamoğlu Sk. No:2 D:2 Kadıköy/İstanbul"><?php echo e($data->address); ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <?php echo trans("Firma E-Posta Bilgileri") ?> </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <label for="email"
                                                   class="col-sm-12 form-label"><?php echo trans("Kurumsal E-posta Adresi") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="email"
                                                       name="email"
                                                       value="<?php echo e($data->email); ?>"
                                                       placeholder="<?php echo trans("info@socore.net") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <label for="b2c_email"
                                                   class="col-sm-12 form-label"><?php echo trans("B2C Müşteri E-Posta Adresi") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="b2c_email"
                                                       name="b2c_email"
                                                       value="<?php echo e($data->b2c_email); ?>"
                                                       placeholder="<?php echo trans("b2c@socore.net") ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <?php echo trans("Resmi Bilgiler") ?> </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <label for="company_registration_number"
                                                   class="col-sm-12 form-label"><?php echo trans("Sicil No") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="company_registration_number"
                                                       name="company_registration_number"
                                                       value="<?php echo e($data->company_registration_number); ?>"
                                                       placeholder="<?php echo trans("info@socore.net") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1 row">
                                            <label for="tax_administration"
                                                   class="col-sm-12 form-label"><?php echo trans("Vergi Dairesi") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="tax_administration"
                                                       name="tax_administration"
                                                       value="<?php echo e($data->tax_administration); ?>"
                                                       placeholder="<?php echo trans("Kadıköy Vergi Dairesi") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1 row">
                                            <label for="tax_no"
                                                   class="col-sm-12 form-label"><?php echo trans("Vergi Numarası") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="tax_no"
                                                       name="tax_no"
                                                       value="<?php echo e($data->tax_no); ?>"
                                                       placeholder="<?php echo trans("897645278253") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <label for="cap_address"
                                                   class="col-sm-12 form-label"><?php echo trans("Kep Adresi") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="cap_address"
                                                       name="cap_address"
                                                       value="<?php echo e($data->cap_address); ?>"
                                                       placeholder="<?php echo trans("897645278253") ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <label for="mersis_no"
                                                   class="col-sm-12 form-label"><?php echo trans("Mersis No") ?></label>
                                            <div class="col-12">
                                                <input type="text"
                                                       class="form-control"
                                                       id="mersis_no"
                                                       name="mersis_no"
                                                       value="<?php echo e($data->mersis_no); ?>"
                                                       placeholder="<?php echo trans("897645278253") ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Logo </h3>
                            </div>
                            <div class="card-body">
                                <p class="mb-2">Müşterilerilerinize gönderdiğiniz e-postalarda, raporlarınızda ve dışa aktardığınız belgelerde bu logo görünecektir.</p>
                                <button type="button"
                                        class="btn btn-outline-primary text-primary"
                                        data-bs-toggle="modal"
                                        data-key="mobile_123123123123"
                                        data-buttonId="mobile_123123123123"
                                        data-bs-target="#selectMedia"
                                        aria-controls="selectMedia">

                                    <input type="hidden" id="slider_image_mobile_123123123123" name="logo"
                                           data-inputId="mobile_123123123123">
                                    Medyayı Kullan
                                </button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Favicon </h3>
                            </div>
                            <div class="card-body">
                                <p class="mb-2">Tarayıcıdaki adres çubuğunda site başlığınızın önünde bu ikon görünecektir. 196x196px boyutunda olması önerilir.</p>
                                <button type="button"
                                        class="btn btn-outline-primary text-primary"
                                        data-bs-toggle="modal"
                                        data-key="mobile_987878870987"
                                        data-buttonId="mobile_987878870987"
                                        data-bs-target="#selectMedia"
                                        aria-controls="selectMedia">

                                    <input type="hidden" id="slider_image_mobile_987878870987" name="favicon"
                                           data-inputId="mobile_987878870987">
                                    Medyayı Kullan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-transparent box-shadow-0">
                <div class="card-header p-0">
                    <i class="card-title"></i>
                    <div>
                        <button class="btn btn-primary" type="submit"><?php echo trans("Kaydet") ?></button>
                        <button class="btn btn-outline-primary" type="reset"><?php echo trans("Vazgeç") ?></button>
                    </div>
                </div>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        const MultiMediaSelect = {
            main: function (input, button) {
                this.button = document.querySelector(button);
                this.element = this.button.querySelector('input');
                this.value = this.element.value;
                this.selected = [];
                const self = this;
                this.selectButton = undefined;

                if (this.value === '') this.element.setAttribute('value', JSON.stringify([]));

                this.button.addEventListener('click', function (e) {
                    self.selectButton = e.target.dataset.key;
                    self.element = document.querySelector('input[data-inputid="' + self.selectButton + '"]')
                    setTimeout(() => {
                        self.mediaSelectInputs = document.querySelectorAll('.media-select');

                        self.mediaSelectInputs.forEach(input => {
                            let key = input.getAttribute('key');
                            let medias = JSON.parse(self.element.getAttribute('value'));

                            if (medias.includes(key)) {
                                input.checked = true;
                            }
                        });

                        self.mediaSelectInputs.forEach(elem => {
                            elem.addEventListener('change', e => {
                                self.mediaSelectInputs.forEach(input => {
                                    if (input !== elem){
                                        input.checked = false
                                    }
                                })

                                let key = e.target.getAttribute('key');
                                if (e.target.checked) {
                                    self.selected = [];
                                    self.selected.push(key);
                                } else {
                                    self.selected = self.arrayRemove(self.selected, key);
                                }
                                self.element.setAttribute('value', JSON.stringify(self.selected));

                                $('#selectMedia').on('hide.bs.modal', () => {
                                    self.selected = [];
                                    self.selectButton = undefined;
                                })
                            });
                        });
                    }, 300);
                });
                this.element.style.display = 'none';
                this.element.style.opacity = '0';
            },

            arrayRemove: function (array, value) {
                return array.filter(elem => {
                    return elem !== value;
                });
            }
        };

        MultiMediaSelect.main(`#slider_image_mobile_123123123123`, `[data-key="mobile_123123123123"]`, "123123123123")
        MultiMediaSelect.main(`#slider_image_mobile_987878870987`, `[data-key="mobile_987878870987"]`, "987878870987")
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/system-settings/corporate-information.blade.php ENDPATH**/ ?>