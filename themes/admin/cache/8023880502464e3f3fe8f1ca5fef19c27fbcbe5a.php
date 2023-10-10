<?php $__env->startSection('title', trans('Yönetim Paneli')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card card-congratulation-medal">
                        <div class="card-body">
                            <?php
                                $userDetail = \Illuminate\Database\Capsule\Manager::table('user')
                                    ->where('user_key', '=', auth()->get('login'))
                                    ->get()
                                    ->all()['0'];
                            ?>
                            <h2 class="text-center">🎉 <?php echo trans("Hoşgeldin") ?> <?php echo e($userDetail->firstname); ?></h2>
                            <p class="card-text font-small-3 text-info text-center">Satışlarını, e-postalarını ve iletişim süreçlerini yönetebilirsin.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-md-12 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo trans("İstatistikler") ?></h4>
                            <div class="d-flex align-items-center">
                                <p class="card-text font-small-2 me-25 mb-0"><?php echo trans("Tüm Zamanlar") ?></p>
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-primary me-2">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0"><?php echo e($totalSale); ?></h4>
                                            <p class="card-text font-small-3 mb-0"><?php echo trans("Satış") ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-info me-2">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0"><?php echo e($totalCustomer); ?></h4>
                                            <p class="card-text font-small-3 mb-0"><?php echo trans("Müşteri") ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-danger me-2">
                                            <div class="avatar-content">
                                                <i data-feather="box" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0"><?php echo e($totalProduct); ?></h4>
                                            <p class="card-text font-small-3 mb-0"><?php echo trans("Ürün") ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-success me-2">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0"><?php echo e($totalRevenue); ?>₺</h4>
                                            <p class="card-text font-small-3 mb-0"><?php echo trans("Kazanç") ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo trans("Anlık Ziyaretçiler") ?></h4>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-12 col-sm-12 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="my-auto me-auto">
                                            <h4 class="fw-bolder mb-0">12</h4>
                                            <p class="card-text font-small-3 mb-0"><?php echo trans("Ziyaretçi şuan sitenizde") ?></p>
                                        </div>
                                        <div class="avatar bg-light-success">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics Card -->
            </div>
            <div class="row match-height">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="card card-transaction">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo trans("Son Satışlar") ?></h4>
                            <a class="d-block" href="">
                                <i class="far fa-chevron-right font-medium-3 cursor-pointer"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <?php $__currentLoopData = $lastOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="transaction-item">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded d-flex justify-content-center align-items-center bg-transparent">
                                        <div class="avatar-content rounded">
                                            <img src="<?php echo e($order['image']); ?>" alt="Toolbar svg" class="img-fluid"/>
                                        </div>
                                    </div>
                                    <div class="transaction-percentage">
                                        <h6 class="transaction-title"><?php echo e($order['name']); ?></h6>
                                    </div>
                                </div>
                                <div class="fw-bolder text-success"> +<?php echo e($order['total']); ?>₺</div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="row w-100 align-items-center d-flex">
                                <div class="col-6">
                                    <h4 class="card-title">Yıllık Kazanç Özeti</h4>
                                </div>
                                <div class="col-6 d-flex align-items-center flex-wrap ">
                                    <select name="" id="" class="form-select ms-auto" style="width: 90px">
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="line-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(themeAssets('app-assets/css/plugins/charts/chart-apex.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/vendors/css/extensions/swiper.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(themeAssets('app-assets/css/plugins/extensions/ext-component-swiper.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(themeAssets('app-assets/vendors/js/charts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(themeAssets('app-assets/vendors/js/extensions/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(themeAssets('app-assets/vendors/js/extensions/swiper.min.js')); ?>"></script>
    <script src="<?php echo e(themeAssets('assets/js/scripts.js')); ?>"></script>
    <script>
        let lineChartEl = document.querySelector('#line-chart')
        let lineChartConfig = {
            chart: {
                height: 400,
                type: 'line',
                zoom: {
                    enabled: false
                },
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            series: [
                {
                    data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
                }
            ],
            markers: {
                strokeWidth: 7,
                strokeOpacity: 1,
                strokeColors: [window.colors.solid.white],
                colors: [window.colors.solid.warning]
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            colors: [window.colors.solid.warning],
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                padding: {
                    top: -20
                }
            },
            tooltip: {
                custom: function (data) {
                    return (
                        '<div class="px-1 py-50">' +
                        '<span>' +
                        data.series[data.seriesIndex][data.dataPointIndex] +
                        '%</span>' +
                        '</div>'
                    );
                }
            },
            xaxis: {
                categories: [
                    '7/12',
                    '8/12',
                    '9/12',
                    '10/12',
                    '11/12',
                    '12/12',
                    '13/12',
                    '14/12',
                    '15/12',
                    '16/12',
                    '17/12',
                    '18/12',
                    '19/12',
                    '20/12',
                    '21/12'
                ]
            },
            yaxis: {
                opposite: false
            }
        };
        let lineChart = new ApexCharts(lineChartEl, lineChartConfig);
        lineChart.render();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/main/home.blade.php ENDPATH**/ ?>