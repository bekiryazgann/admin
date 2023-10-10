
<?php $__env->startSection('title', trans('Hesabım')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"><?php echo trans("Hesabım") ?></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo e(siteUrl()); ?>"><?php echo trans("Yönetim Paneli") ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?php echo trans("Hesabım") ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right"></div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title"><?php echo trans("Profil Detayları") ?></h4>
                        </div>
                        <div class="card-body py-2 my-25">
                            <div class="d-flex">
                                <a href="#" class="me-25">
                                    <img src="<?php echo e(imageUrl($data->profile_photo)); ?>"
                                         id="account-upload-img"
                                         class="uploadedAvatar rounded me-50"
                                         alt="profile image"
                                         height="100"
                                         width="100"/>
                                </a>
                                <div class="d-flex align-items-end mt-75 ms-1">
                                    <form id="ppForm">
                                        <label for="profile-photo-upload"
                                               class="btn btn-sm btn-primary mb-75 me-75"><?php echo trans("Yükle") ?></label>
                                        <input type="file" id="profile-photo-upload" hidden accept="image/*"
                                               name="profile_photo"/>
                                    </form>
                                </div>
                            </div>
                            <form class="validate-form mt-2 pt-50" autocomplete="off" method="POST">
                                <input type="hidden" name="nopassword" value="0">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="firstname"><?php echo trans("Ad") ?></label>
                                        <input type="text"
                                               class="form-control"
                                               id="firstname"
                                               name="firstname"
                                               placeholder="Mert"
                                               value="<?php echo e($data->firstname); ?>"/>
                                        <?php if (isset($errors['firstname'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['firstname'][0]?></div></div></div><?php endif; ?>
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="lastname"><?php echo trans("Soyad") ?></label>
                                        <input type="text"
                                               class="form-control"
                                               id="lastname"
                                               name="lastname"
                                               placeholder="Uçar"
                                               value="<?php echo e($data->lastname); ?>"/>
                                        <?php if (isset($errors['lastname'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['lastname'][0]?></div></div></div><?php endif; ?>
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label" for="username"><?php echo trans("Kullanıcı Adı") ?></label>
                                        <input type="text"
                                               class="form-control"
                                               id="username"
                                               name="username"
                                               placeholder="mertucar"
                                               value="<?php echo e($data->username); ?>"/>
                                        <?php if (isset($errors['username'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['username'][0]?></div></div></div><?php endif; ?>
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label" for="phone"><?php echo trans("Telefon Numarası") ?></label>
                                        <input type="text"
                                               class="form-control"
                                               id="phone"
                                               name="phone"
                                               placeholder="+905327321136"
                                               value="<?php echo e($data->phone); ?>"/>
                                        <?php if (isset($errors['phone'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['phone'][0]?></div></div></div><?php endif; ?>
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label"
                                               for="email"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="right"
                                               data-bs-original-title="<?php echo trans("E-posta adresi değiştirilemez") ?>"><?php echo trans("E-posta Adresi") ?></label>
                                        <input type="email"
                                               class="form-control"
                                               id="email"
                                               disabled
                                               placeholder="info@socore.app"
                                               value="<?php echo e($data->email); ?>"/>
                                        <?php if (isset($errors['email'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['email'][0]?></div></div></div><?php endif; ?>
                                    </div>
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="address"><?php echo trans("Adres") ?></label>
                                        <textarea type="text"
                                                  class="form-control"
                                                  id="address"
                                                  name="address"
                                                  placeholder="Cemal Paşa Mh. Cumhuriyet Cd. Kemal Paşa Sk. No:88 D:2"><?php echo e($data->address); ?></textarea>
                                        <?php if (isset($errors['address'])): ?><div class="row"><div class="col-12"><div class="alert alert-danger mt-1" style="padding: 10px 12px"><?=$errors['address'][0]?></div></div></div><?php endif; ?>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn btn-primary mt-1 me-1"><?php echo trans("Değişiklikleri Kaydet") ?></button>
                                        <button type="reset"
                                                class="btn btn-outline-secondary mt-1"><?php echo trans("Vazgeç") ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Güvenlik</h4>
                        </div>
                        <div class="card-body py-2 my-25">
                            <div class="alert alert-warning">
                                <h4 class="alert-heading fw-normal"><b>Lütfen dikkat:</b> Şifrenizi hatırlanabilir ve
                                    tahmin edilmesi zor bir şekilde seçin. Güvenliğinizi artırmak için harfler, rakamlar
                                    ve sembollerin bir kombinasyonunu kullanın.</h4>
                            </div>
                            <form method="post" action="<?php echo e(siteUrl('api/my-account-password-update')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="password" value="0">
                                <label class="form-label" for="old_password"><?php echo trans("Eski Şifre") ?></label>
                                <input type="password"
                                       class="form-control mb-2"
                                       id="old_password"
                                       name="old_password"
                                       placeholder="··················"/>

                                <label class="form-label" for="new_password"><?php echo trans("Yeni Şifre") ?></label>
                                <input type="password"
                                       class="form-control mb-2"
                                       id="new_password"
                                       name="new_password"
                                       placeholder="··················"/>

                                <label class="form-label" for="renew_password"><?php echo trans("Yeni Şifre Tekrar") ?></label>
                                <input type="password"
                                       class="form-control mb-2"
                                       id="renew_password"
                                       name="renew_password"
                                       placeholder="··················"/>


                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="accountActivation"
                                           id="accountActivation" data-msg="Please confirm you want to delete account"/>
                                    <label class="form-check-label font-small-3" for="accountActivation">
                                        Şifre değiştirmeyi onaylıyorum
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-danger deactivate-account mt-1">Değiştir
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/ profile -->
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(themeAssets('assets/js/pages/my-account.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/user/my-account.blade.php ENDPATH**/ ?>