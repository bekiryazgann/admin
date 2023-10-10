<?php

namespace themes\admin\controller;

use Core\Controller;
use Faker\Factory;
use GuzzleHttp\Client;
use Illuminate\Database\Capsule\Manager;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Api extends Controller
{
    /**
     * @param Response $response
     *
     * @return Response
     */
    public function orders(Response $response): Response
    {
        /*
        $length = 25;
        if (isset($_POST['length'])) {
            if ($_POST['length'] == -1) {
                $length = rand(1000, 20000);
            } else {
                $length = $_POST['length'];
            }
        }
        */

        if (! empty(post('search')['value'])) {
            $data = Manager::table('orders')
                ->offset(post('start'))
                ->limit(post('length'))
                ->orWhere('name', 'like', post('search')['value'] . '%')
                ->orWhere('code', 'like', post('search')['value'] . '%')
                ->orWhere('date', 'like', post('search')['value'] . '%')
                ->orWhere('total', 'like', post('search')['value'] . '%')
                ->orWhere('status', 'like', post('search')['value'] . '%')
                ->get();
        } else {
            $data = Manager::table('orders')
                ->offset(post('start'))
                ->limit(post('length'))
                ->get();
        }

        //$response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode([
            'recordsTotal' => Manager::table('orders')->count(),
            'recordsFiltered' => Manager::table('orders')->count(),
            'data' => $data,
        ]));

        return $response;
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function bills(Response $response): Response
    {
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $data[] = [
                'id' => $i + 1,
                'orderCode' => $faker->numerify('SO-######'),
                'name' => $faker->name,
                'date' => carbon()::parse($faker->date())->diffForHumans(),
                'total' => $faker->randomFloat(2, '20', '5000') . '₺',
            ];
        }

        return $response->setContent(json_encode([
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function products(Response $response): Response
    {
        $data = [];

        $products = Manager::table('product')
            ->where('license', auth()->get('licenseId'))
            ->orderBy('id', 'desc')
            ->get()
            ->all();

        $i = 0;
        foreach ($products as $product) {
            $i++;

            if (is_array(json_decode($product->images, true))) {
                if (isset(json_decode($product->images, true)[0])) {
                    $imageId = json_decode($product->images, true)[0];
                } else {
                    $imageId = 0;
                }
            } else {
                $imageId = $product->images;
            }

            $image = Manager::table('media')
                ->where('id', $imageId)
                ->get()
                ->all();

            if (isset($image[0])) {
                $image = $image[0]->image;
            } else {
                $image = 'no-image.webp';
            }

            $data[] = [
                'id' => $i,
                'realId' => $product->id,
                'image' => imageUrl('media/' . $image),
                'code' => $product->stock_code,
                'name' => $product->name,
                'category' => 'Gıda',
                'stock' => $product->stock_qty,
                'fee' => $product->fee,
                'status' => rand('1', '3'),
            ];
        }

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function categories(Response $response): Response
    {
        $data = [];

        $licenseId = Manager::table('license')
            ->where('license_key', auth()->get('license'))
            ->get()
            ->all()[0]
            ->id;

        $categoryData = Manager::table('category')
            ->where('license', $licenseId)
            ->orderBy('id', 'desc')
            ->get();

        $i = 0;
        foreach ($categoryData as $item) {
            $topCategory = 'Yok';

            if ($item->top !== 0) {
                $topCategory = Manager::table('category')
                    ->where('id', $item->top)
                    ->get()
                    ->all()[0]
                    ->name;
            }

            $imageUrl = Manager::table('media')
                ->where('id', $item->image)
                ->get()
                ->all();

            if (isset($imageUrl[0])) {
                $imageUrl = $imageUrl[0]->image;
            } else {
                $imageUrl = 'no-image.webp';
            }

            $i++;
            $data[] = [
                'id' => $i,
                'realId' => $item->id,
                'image' => imageUrl('media/' . $imageUrl),
                'name' => $item->name,
                'topCategory' => $topCategory,
                'status' => (int) $item->status,
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function brands(Response $response): Response
    {
        $data = [];

        $i = 0;

        $datas = Manager::table('brand')
            ->where('license', auth()->get('licenseId'))
            ->orderBy('id', 'desc')
            ->get();


        foreach ($datas as $dataf) {
            $i++;

            $image = Manager::table('media')
                ->where('id', $dataf->image)
                ->get()
                ->all()[0]->image;

            $data[] = [
                'id' => $i,
                'realId' => $dataf->id,
                'image' => imageUrl('media/' . $image),
                'name' => $dataf->name,
                'status' => $dataf->status,
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function filters(Response $response): Response
    {

        $data = [];

        $datas = Manager::table('filter')
            ->where('license', auth()->get('licenseId'))
            ->orderBy('id', 'desc')
            ->get();
        $i = 0;
        foreach ($datas as $dataf) {

            $filterOptions = "";

            $t = 0;
            foreach (json_decode($dataf->options) as $option) {
                $t++;
                if ($t < 4) {
                    $filterOptions .= "<div class='badge badge-light-primary me-1'>" . $option . "</div>";
                }
            }

            $i++;
            $data[] = [
                'id' => $i,
                'realId' => $dataf->id,
                'name' => $dataf->name,
                'option' => $filterOptions,
                'status' => $dataf->status,
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function tags(Response $response): Response
    {
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $data[] = [
                'id' => $i + 1,
                'image' => $faker->imageUrl(42, 42, 'Product'),
                'name' => $faker->words(rand(1, 4), true),
                'status' => rand(1, 2),
            ];
        }

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function coupons(Response $response): Response
    {
        $data = [];

        $coupons = Manager::table('coupon')
            ->where('license', auth()->get('licenseId'))
            ->orderBy('id', 'desc')
            ->get()
            ->all();

        $i = 0;
        foreach ($coupons as $coupon) {
            $i++;
            $data[] = [
                'id' => $i,
                'realId' => $coupon->id,
                'code' => $coupon->code,
                'name' => $coupon->name,
                'amount' => (($coupon->type == 1) ? '%' : '₺') . $coupon->sale,
                'total' => $coupon->min,
                'status' => '1',
            ];
        }

        return $response->setContent(json_encode([
            'recordsTotal' => 10,
            'recordsFiltered' => 10,
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function newsletter(Response $response): Response
    {
        $data = [];

        for ($i = 0; $i < 73; $i++) {
            $faker = Factory::create();
            $data[] = [
                'id' => $i + 1,
                'name' => $faker->name,
                'email' => $faker->email,
            ];
        }

        return $response->setContent(json_encode([
            'recordsTotal' => 73,
            'recordsFiltered' => 73,
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function cancellation(Response $response): Response
    {
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $data[] = [
                'id' => $i + 1,
                'orderCode' => $faker->numerify('SO-######'),
                'name' => $faker->name,
                'date' => carbon()::parse($faker->date())->diffForHumans(),
                'total' => $faker->randomFloat(2, '10', '5000') . '₺',
                'status' => $faker->randomElement(['1', '2', '3']),
            ];
        }

        return $response->setContent(json_encode([
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function reminder(Response $response): Response
    {
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $data[] = [
                'id' => $i + 1,
                'name' => $faker->name,
                'date' => carbon()::parse($faker->date())->diffForHumans(),
                'status' => $faker->randomElement(['1', '2']),
            ];
        }

        return $response->setContent(json_encode([
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function comments(Response $response): Response
    {
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $data[] = [
                'id' => $i + 1,
                'name' => $faker->name,
                'email' => $faker->email,
                'date' => carbon()::parse($faker->date())->diffForHumans(),
                'text' => $faker->text('20') . '..',
                'status' => $faker->randomElement(['1', '2']),
            ];
        }

        return $response->setContent(json_encode([
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]));
    }

    /**
     * @return false|string
     */
    public function firstAndOnly(): false|string
    {
        $count = 0;
        if (post('fieldName') && post('fieldValue')) {
            $fieldName = post('fieldName');
            $fieldValue = post('fieldValue');

            if ($fieldName == 'username') {
                $count = Manager::table('user')
                    ->where('username', '=', $fieldValue)
                    ->count();
            } else if ($fieldName == 'email') {
                $count = Manager::table('user')
                    ->where('email', '=', $fieldValue)
                    ->count();
            } else if ($fieldName == 'phone') {
                $count = Manager::table('user')
                    ->where('phone', '=', $fieldValue)
                    ->count();
            } else if ($fieldName == 'page_name') {
                $count = Manager::table('license')
                    ->where('domain', '=', $fieldValue . '.mysocore.app')
                    ->count();
            }
        }
        Header('Content-Type: application/json');

        return json_encode([
            'count' => (int) $count,
        ]);
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function categoryDetail(Response $response): Response
    {
        $data = Manager::table('category')
            ->where('id', post('key'))
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->all()[0];
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function newCategory(Response $response, Request $request): Response
    {
        if ($request->getMethod() == 'POST') {
            $this->validator
                ->rule('required', [
                    'category_name',
                    'category_status',
                ])
                ->labels([
                    'category_name' => 'Kategori Adı',
                    'category_status' => 'Durum',
                ]);
            if ($this->validator->validate() && xssToken()->isVerify()) {

                $status = Manager::table('category')
                    ->insert([
                        'license' => auth()->get('licenseId'),
                        'name' => post('category_name'),
                        'image' => is_array(json_decode($_POST['category_image'], true)) ? json_decode($_POST['category_image'], true)[0] : '0',
                        'top' => post('top_category'),
                        'status' => post('category_status'),
                        'seo_extension' => post('category_extension'),
                        'seo_title' => post('category_title'),
                        'seo_keywords' => post('category_keywords'),
                        'seo_description' => post('category_description'),
                    ]);
                if ($status) {
                    $data = [
                        'success' => [
                            'message' => 'Kategori sorunsuz bir şekilde eklendi',
                            'title' => 'Başarılı',
                        ],
                    ];
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Kategori eklenirken bir sorun oluştu',
                            'title' => 'Hata',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Formu eksik gönderdiniz. Lütfen zorunlu alanları doldurunuz.',
                        'title' => 'Eksik Bilgi',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'İzinsiz erişmeye çalıştınız',
                    'title' => 'İzinsiz',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function deleteCategory(Response $response, Request $request): Response
    {
        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', ['id']);
                if ($this->validator->validate()) {
                    $status = Manager::table('category')
                        ->delete(post('id'));
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Kategori silindi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Kategori silinirken bir hata oluştu',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Doldurulmamış alanlar var!',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz giriş yapmaya çalıştın',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Kullanıcı girişi yapılmamış',
                    'title' => 'İzinsiz!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function editCategory(Response $response, Request $request): Response
    {
        if ($request->getMethod() == 'POST') {
            $this->validator
                ->rule('required', [
                    'category_name',
                    'category_status',
                ])
                ->labels([
                    'category_name' => 'Kategori Adı',
                    'category_status' => 'Durum',
                ]);
            if ($this->validator->validate() && xssToken()->isVerify()) {
                if (is_array(json_decode($_POST['category_image'], true))) {
                    $image = json_decode($_POST['category_image'], true)[0];
                } else {
                    $image = $_POST['category_image'];
                }
                $status = Manager::table('category')
                    ->where('license', auth()->get('licenseId'))
                    ->where('id', post('id'))
                    ->update([
                        'name' => post('category_name'),
                        'image' => (int) $image ?? '0',
                        'top' => post('top_category'),
                        'status' => post('category_status'),
                        'seo_extension' => post('category_extension'),
                        'seo_title' => post('category_title'),
                        'seo_keywords' => post('category_keywords'),
                        'seo_description' => post('category_description'),
                    ]);
                if ($status) {
                    $data = [
                        'success' => [
                            'message' => 'Kategori başarıyla düzenlendi',
                            'title' => 'Başarılı!',
                        ],
                    ];
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Kategori düzenlenirken bir hata oluştu',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Bazı alanlar boş bırakılmış',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'İzinsiz Erişmeye çalışıldı.',
                    'title' => 'Hata!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function getModal(Response $response, Request $request): Response
    {
        $data = ['html' => '<div class="alert alert-danger p-1 m-1">İletişim Kutusu Yüklenmedi</div>'];
        if ($request->getMethod() == 'POST') {
            if (file_exists(realpath('.') . '/themes/admin/views/modals/' . post('modal') . '.blade.php')) {
                if (isset($_POST['data'])) {
                    $viewData = $_POST['data'];
                }
                $data['html'] = $this->view('modals.' . post('modal'), ['data' => $viewData ?? []]);
            }
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function newFilter(Response $response, Request $request): Response
    {
        $data = [];

        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', [
                    'filter_name',
                    'status',
                    'options',
                ]);
                if ($this->validator->validate() && xssToken()->isVerify()) {

                    $status = Manager::table('filter')
                        ->insert([
                            'license' => auth()->get('licenseId'),
                            'name' => post('filter_name'),
                            'options' => json_encode($_POST['options']),
                            'description' => '',
                            'status' => post('status'),
                            'seo_extension' => '',
                            'seo_title' => '',
                            'seo_keywords' => '',
                            'seo_description' => '',
                        ]);

                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => trans('Filtre başarılı bir şekilde eklenmiştir'),
                                'title' => trans('Başarılı!'),
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => trans('Veriler kaydedilirken bir hata oluştu. Lütfen bizimle iletişime geçin'),
                                'title' => trans('Hata!'),
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => trans('Lütfen zorunlu alanları doldurarak veya sayfayı yenileyerek tekrar deneyin.'),
                            'title' => trans('Hata!'),
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => trans('Erişim yetkiniz yok!'),
                        'title' => trans('Hata!'),
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => trans('Oturum süreniz dolmuştur, lütfen giriş yapınız'),
                    'title' => trans('Hata!'),
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function deleteFilter(Response $response, Request $request): Response
    {
        $data = [];
        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', ['id']);
                if ($this->validator->validate()) {
                    $status = Manager::table('filter')
                        ->delete(post('id'));
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Filtre silindi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Filtre silinirken bir hata oluştu',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Doldurulmamış alanlar var!',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz giriş yapmaya çalıştın',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Kullanıcı girişi yapılmamış',
                    'title' => 'İzinsiz!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function filterDetail(Response $response): Response
    {
        $data = Manager::table('filter')
            ->where('id', post('key'))
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->all()[0];
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function filterEdit(Response $response, Request $request): Response
    {
        $data = [];
        if ($request->getMethod() == 'POST') {
            $this->validator->rule('required', [
                'filter_name',
                'status',
                'options',
            ]);
            if ($this->validator->validate() && xssToken()->isVerify()) {
                $status = Manager::table('filter')
                    ->where('license', auth()->get('licenseId'))
                    ->where('id', post('id'))
                    ->update([
                        'name' => post('filter_name'),
                        'options' => json_encode($_POST['options']),
                        'description' => '',
                        'status' => post('status'),
                        'seo_extension' => '',
                        'seo_title' => '',
                        'seo_keywords' => '',
                        'seo_description' => '',
                    ]);
                if ($status) {
                    $data = [
                        'success' => [
                            'message' => 'Filtre başarıyla düzenlendi',
                            'title' => 'Başarılı!',
                        ],
                    ];
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Filtre düzenlenirken bir hata oluştu',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Bazı alanlar boş bırakılmış',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'İzinsiz Erişmeye çalışıldı.',
                    'title' => 'Hata!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function newBrand(Response $response, Request $request): Response
    {
        $data = [];

        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', [
                    'brand_name',
                ]);
                if ($this->validator->validate() && xssToken()->isVerify()) {
                    $image = json_decode($_POST['brand_image']);
                    $status = Manager::table('brand')
                        ->insert([
                            'license' => auth()->get('licenseId'),
                            'name' => post('brand_name'),
                            'description' => post('brand_description'),
                            'image' => is_array($image) ? $image[0] : '0',
                            'status' => post('status'),
                            'seo_extension' => post('brand_seo_extension'),
                            'seo_title' => post('brand_seo_title'),
                            'seo_keywords' => post('brand_seo_keywords'),
                            'seo_description' => post('brand_seo_description'),
                        ]);
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Yeni marka başarıyla eklendi.',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Marka eklenirken bir sorun oluştu.',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Bazı alanlar boş bırakılmış.',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz Erişim isteği',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Oturum süreniz dolmuştur, lütfen tekrar giriş yapın',
                    'title' => 'Hata!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function deleteBrand(Response $response, Request $request): Response
    {
        $data = [];
        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', ['id']);
                if ($this->validator->validate()) {
                    $status = Manager::table('brand')
                        ->delete(post('id'));
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Marka silindi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Marka silinirken bir hata oluştu',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Doldurulmamış alanlar var!',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz giriş yapmaya çalıştın',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Kullanıcı girişi yapılmamış',
                    'title' => 'İzinsiz!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function brandDetail(Response $response): Response
    {
        $data = Manager::table('brand')
            ->where('id', post('id'))
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->all()[0];
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function editBrand(Response $response, Request $request): Response
    {
        $data = [];
        if ($request->getMethod() == 'POST') {
            $this->validator
                ->rule('required', [
                    'brand_name',
                    'status',
                ]);
            if ($this->validator->validate() && xssToken()->isVerify()) {
                if (is_array(json_decode($_POST['brand_image'], true))) {
                    $image = json_decode($_POST['brand_image'], true)[0];
                } else {
                    $image = $_POST['brand_image'];
                }
                $status = Manager::table('brand')
                    ->where('license', auth()->get('licenseId'))
                    ->where('id', post('id'))
                    ->update([
                        'name' => post('brand_name'),
                        'image' => (int) $image ?? '0',
                        'description' => post('brand_description'),
                        'status' => post('status'),
                        'seo_extension' => post('brand_seo_extension'),
                        'seo_title' => post('brand_seo_title'),
                        'seo_keywords' => post('brand_seo_keywords'),
                        'seo_description' => post('brand_seo_description'),
                    ]);
                if ($status) {
                    $data = [
                        'success' => [
                            'message' => 'Marka başarıyla düzenlendi',
                            'title' => 'Başarılı!',
                        ],
                    ];
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Marka düzenlenirken bir hata oluştu',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Bazı alanlar boş bırakılmış',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'İzinsiz Erişmeye çalışıldı.',
                    'title' => 'Hata!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function newCoupon(Response $response, Request $request): Response
    {
        $data = [];

        if ($request->getMethod() == 'POST') {
            $this->validator->rule('required', [
                'coupon_name',
                'coupon_code',
                'coupon_min',
                'coupon_type',
                'coupon_sale',
            ]);
            if ($this->validator->validate() && xssToken()->isVerify()) {
                $status = Manager::table('coupon')
                    ->where('id', post('id'))
                    ->update([
                        'license' => auth()->get('licenseId'),
                        'name' => post('coupon_name'),
                        'code' => str_replace('-', '', strtoupper(slug(post('coupon_code'))->generate())),
                        'sale' => post('coupon_sale'),
                        'min' => post('coupon_min'),
                        'type' => post('coupon_type'),
                    ]);
                if ($status) {
                    $data = [
                        'success' => [
                            'message' => 'Kupon başarıyla düzenlendi.',
                            'title' => 'Başarılı',
                        ],
                    ];
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Girdileriniz veritabanına aktarılamadı.',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => $_POST['_token'],
                        'title' => $_SESSION['_token'],
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'İzinsiz Erişim',
                    'title' => 'İzinsiz!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function deleteCoupon(Response $response, Request $request): Response
    {
        $data = [];
        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', ['id']);
                if ($this->validator->validate()) {
                    $status = Manager::table('coupon')
                        ->delete(post('id'));
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Kupon silindi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Kupon silinirken bir hata oluştu',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Doldurulmamış alanlar var!',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz giriş yapmaya çalıştın',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Kullanıcı girişi yapılmamış',
                    'title' => 'İzinsiz!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function couponDetail(Response $response): Response
    {
        $data = Manager::table('coupon')
            ->where('id', post('id'))
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->all()[0];
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function editCoupon(Response $response, Request $request): Response
    {
        $data = [];

        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', [
                    'coupon_name',
                    'coupon_code',
                    'coupon_min',
                    'coupon_type',
                    'coupon_sale',
                ]);
                if ($this->validator->validate() && xssToken()->isVerify()) {
                    $status = Manager::table('coupon')
                        ->update([
                            'license' => auth()->get('licenseId'),
                            'name' => post('coupon_name'),
                            'code' => str_replace('-', '', strtoupper(slug(post('coupon_code'))->generate())),
                            'sale' => post('coupon_sale'),
                            'min' => post('coupon_min'),
                            'type' => post('coupon_type'),
                        ]);
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'kupon Başarıyla Düzenlendi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Veritabanı kaynaklı bir hatadan dolayı işlem gerçekleştirilemedi',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Lütfen formda boş alan bırakmamaya ve sayfanızın güncel olmasına dikkat edin',
                            'title' => 'Boş alanlar!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Lütfen sisteme müdahele etmeden işlemlerişnizi gerçekleştirin.',
                        'title' => 'İzinsiz Erişim!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Lütfen sona eren oturumunuzu yenilemek için yeniden giriş yapınız.',
                    'title' => 'Erişim Kısıtlı!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function blogs(Response $response): Response
    {
        $data = [];

        $blogs = Manager::table('blog')
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->all();

        $i = 0;
        foreach ($blogs as $blog) {
            $i++;

            $data[] = [
                'id' => $i,
                'realId' => $blog->id,
                'name' => $blog->title,
                'c_date' => carbon()::parse('2022-8-14 15:23:21')->diffForHumans(),
                'u_data' => carbon()::parse('2022-10-30 18:23:21')->diffForHumans(),
                'status' => rand(0, 1),
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function faq(Response $response): Response
    {
        $data = [];
        $faqs = Manager::table('faq')
            ->where('license', auth()->get('licenseId'))
            ->orderBy('id', 'desc')
            ->get()
            ->all();


        $i = 0;
        foreach ($faqs as $faq) {
            $i++;
            $data[] = [
                'id' => $i,
                'realId' => $faq->id,
                'question' => shorter($faq->question, 10, ''),
                'answer' => shorter($faq->answer),
                'status' => $faq->status,
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode([
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function newFaq(Response $response, Request $request): Response
    {
        $data = [];

        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', [
                    'faq_question',
                    'faq_answer',
                    'faq_status',
                ]);
                if ($this->validator->validate() && xssToken()->isVerify()) {
                    $status = Manager::table('faq')
                        ->insert([
                            'license' => auth()->get('licenseId'),
                            'question' => post('faq_question'),
                            'answer' => post('faq_answer'),
                            'status' => post('faq_status'),
                        ]);
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Soru - Cevap Başarıyla Eklendi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Veritabanı kaynaklı bir hatadan dolayı işlem gerçekleştirilemedi.',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Lütfen formda boş alan bırakmamaya ve sayfanızın güncel olmasına dikkat edin',
                            'title' => 'Boş Alanlar',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz erişim isteğinde bulundunuz',
                        'title' => 'İzinsiz',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Lütfen sona eren oturumunuzu yenilemek için yeniden giriş yapınız.',
                    'title' => 'Erişim Kısıtlı!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function deleteFaq(Response $response, Request $request): Response
    {
        $data = [];
        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', ['id']);
                if ($this->validator->validate()) {
                    $status = Manager::table('faq')
                        ->delete(post('id'));
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Soru silindi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Soru silinirken bir hata oluştu',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Doldurulmamış alanlar var!',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz giriş yapmaya çalıştın',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Kullanıcı girişi yapılmamış',
                    'title' => 'İzinsiz!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function faqDetail(Response $response, Request $request): Response
    {
        $data = Manager::table('faq')
            ->where('id', post('id'))
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->all()[0];
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function editFaq(Response $response, Request $request): Response
    {
        $data = [];

        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', [
                    'faq_question',
                    'faq_answer',
                    'faq_status',
                ]);
                if ($this->validator->validate() && xssToken()->isVerify()) {
                    $status = Manager::table('faq')
                        ->where('id', post('id'))
                        ->where('license', auth()->get('licenseId'))
                        ->update([
                            'question' => post('faq_question'),
                            'answer' => post('faq_answer'),
                            'status' => post('faq_status'),
                        ]);
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Soru başarıyla düzenlendi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Veritabanı kaynaklı bir hatadan dolayı işlem gerçekleştirilemedi',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Lütfen formda boş alan bırakmamaya ve sayfanızın güncel olmasına dikkat edin',
                            'title' => 'Boş alanlar!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Lütfen sisteme müdahele etmeden işlemlerişnizi gerçekleştirin.',
                        'title' => 'İzinsiz Erişim!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Lütfen sona eren oturumunuzu yenilemek için yeniden giriş yapınız.',
                    'title' => 'Erişim Kısıtlı!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function productDelete(Response $response, Request $request): Response
    {
        $data = [];
        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', ['id']);
                if ($this->validator->validate()) {
                    $status = Manager::table('product')
                        ->delete(post('id'));
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Ürün silindi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Ürün silinirken bir hata oluştu',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Doldurulmamış alanlar var!',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz giriş yapmaya çalıştın',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Kullanıcı girişi yapılmamış',
                    'title' => 'İzinsiz!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function campaigns(Response $response): Response
    {
        $data = [];

        $campaigns = Manager::table('campaign')
            ->where('license', auth()->get('licenseId'))
            ->orderBy('id', 'desc')
            ->get()
            ->all();


        $i = 0;
        foreach ($campaigns as $campaign) {


            if ($campaign->type == '1') {
                $type = trans('Yüzdelik İndirim');
            } else if ($campaign->type == '2') {
                $type = trans('Sabit Fiyat');
            } else if ($campaign->type == '3') {
                $type = trans('Ücretsiz Kargo');
            } else {
                $type = trans('Tanımsız');
            }

            if ($campaign->type == '1') {
                $amount = $campaign->sale_fee . '%';
            } else if ($campaign->type == '2') {
                $amount = $campaign->sale_fee . '₺';
            } else if ($campaign->type == '') {
                $amount = trans('Ücretsiz Kargo');
            } else {
                $amount = trans('Tanımsız');
            }

            $i++;
            $data[] = [
                'id' => $i,
                'realId' => $campaign->id,
                'name' => $campaign->name,
                'type' => $type,
                'amount' => $amount,
                'total' => $campaign->validity_fee . '₺',
                'status' => '1',
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode([
            'recordsTotal' => 10,
            'recordsFiltered' => 10,
            'data' => $data,
        ]));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function newCampaign(Response $response, Request $request): Response
    {
        $data = [];

        if ($request->getMethod() == 'POST') {
            $this->validator->rule('required', [
                'name',
                'type',
                'sale_fee',
            ]);
            if ($this->validator->validate() && xssToken()->isVerify()) {
                $status = Manager::table('campaign')
                    ->insert([
                        'license' => auth()->get('licenseId'),
                        'name' => post('name'),
                        'type' => post('type'),
                        'sale_fee' => post('sale_fee'),
                        'validity_fee' => post('validity_fee'),
                        'valid_all_product' => (post('valid_all_product')) ? '1' : '0',
                        'valid_category' => json_encode(empty($_POST['valid_category']) ? ["-1"] : $_POST['valid_category']),
                        'valid_product' => json_encode(empty($_POST['valid_product']) ? ["-1"] : $_POST['valid_product']),
                        'valid_brand' => json_encode(empty($_POST['valid_brand']) ? ["-1"] : $_POST['valid_brand']),
                        'seo_extension' => post('seo_extension'),
                        'seo_title' => post('seo_title'),
                        'seo_keywords' => post('seo_keywords'),
                        'seo_description' => post('seo_description'),
                    ]);
                if ($status) {
                    $data = [
                        'success' => [
                            'message' => 'Kampanya başarıyla eklendi.',
                            'title' => 'Başarılı',
                        ],
                    ];
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Girdileriniz veritabanına aktarılamadı.',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Lütfen sayfayı yenileyerek Boş alan bırakmamaya dikkat edin.',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'İzinsiz Erişim',
                    'title' => 'İzinsiz!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function deleteCampaign(Response $response, Request $request): Response
    {
        $data = [];
        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', ['id']);
                if ($this->validator->validate()) {
                    $status = Manager::table('campaign')
                        ->delete(post('id'));
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Kampannya silindi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Kampanya silinirken bir hata oluştu',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Doldurulmamış alanlar var!',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz giriş yapmaya çalıştın',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Kullanıcı girişi yapılmamış',
                    'title' => 'İzinsiz!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function campaignDetail(Response $response): Response
    {
        $data = Manager::table('campaign')
            ->where('id', post('id'))
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->all()[0];
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     * @throws \Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException
     */
    public function editCampaign(Response $response, Request $request): Response
    {
        $data = [];

        if ($request->getMethod() == 'POST') {
            $this->validator->rule('required', [
                'name',
                'type',
                'sale_fee',
                'id',
            ]);
            if ($this->validator->validate() && xssToken()->isVerify()) {
                $status = Manager::table('campaign')
                    ->where('license', auth()->get('licenseId'))
                    ->where('id', post('id'))
                    ->update([
                        'name' => post('name'),
                        'type' => post('type'),
                        'sale_fee' => post('sale_fee'),
                        'validity_fee' => post('validity_fee'),
                        'valid_all_product' => (post('valid_all_product')) ? '1' : '0',
                        'valid_category' => json_encode(empty($_POST['valid_category']) ? ["-1"] : $_POST['valid_category']),
                        'valid_product' => json_encode(empty($_POST['valid_product']) ? ["-1"] : $_POST['valid_product']),
                        'valid_brand' => json_encode(empty($_POST['valid_brand']) ? ["-1"] : $_POST['valid_brand']),
                        'seo_extension' => post('seo_extension'),
                        'seo_title' => post('seo_title'),
                        'seo_keywords' => post('seo_keywords'),
                        'seo_description' => post('seo_description'),
                    ]);
                if ($status) {
                    $data = [
                        'success' => [
                            'message' => 'Kampanya başarıyla düzenlendi.',
                            'title' => 'Başarılı',
                        ],
                    ];
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Girdileriniz veritabanına aktarılamadı.',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Lütfen sayfayı yenileyerek Boş alan bırakmamaya dikkat edin.',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'İzinsiz Erişim',
                    'title' => 'İzinsiz!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function pages(Response $response): Response
    {
        $data = [];

        $pages = Manager::table('page')
            ->where('license', auth()->get('licenseId'))
            ->orderBy('id', 'desc')
            ->get()
            ->all();

        $i = 0;
        foreach ($pages as $page) {
            $i++;
            $data[] = [
                'id' => $i,
                'realId' => $page->id,
                'title' => $page->title,
                'status' => $page->status,
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    public function deletePage(Response $response, Request $request): Response
    {
        $data = [];
        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $this->validator->rule('required', ['id']);
                if ($this->validator->validate()) {
                    $status = Manager::table('page')
                        ->delete(post('id'));
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Sayfa silindi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Sayfa silinirken bir hata oluştu',
                                'title' => 'Hata!',
                            ],
                        ];
                    }
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Doldurulmamış alanlar var!',
                            'title' => 'Hata!',
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'İzinsiz giriş yapmaya çalıştın',
                        'title' => 'Hata!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Kullanıcı girişi yapılmamış',
                    'title' => 'İzinsiz!',
                ],
            ];
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    public function newMedia(Request $request, Response $response): Response
    {
        $data = [];

        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $userId = Manager::table('user')
                    ->where('user_key', auth()->get('login'))
                    ->get()
                    ->all()[0]
                    ->id;
                $file = upload('media_image');

                if ($error = $file->error()) {
                    $data = [
                        'error' => [
                            'message' => 'Bilinmeyen hatalar var!',
                            'title' => 'Hata!',
                        ],
                    ];
                } else {
                    $file->rename(md5(rand(981, 7251)));
                    $file->convert('webp');

                    $status = Manager::table('media')
                        ->insert([
                            "license" => auth()->get('licenseId'),
                            "title" => $file->to('media')->getFile(),
                            "alternative" => '',
                            "definition" => '',
                            "image" => $file->to('media')->getFile(),
                            "name" => $file->to('media')->getFile(),
                            "type" => 'WEBP',
                            "file_size" => "10kb",
                            "image_size" => '',
                            "date" => date('Y-m-d H:i:s'),
                            "user" => $userId,
                        ]);
                    if ($status) {
                        $data = [
                            'success' => [
                                'message' => 'Dosya başarıyla yüklendi',
                                'title' => 'Başarılı!',
                            ],
                        ];
                    } else {
                        $data = [
                            'error' => [
                                'message' => 'Yetkisiz kullanım',
                                'title' => 'Yetki Yok!',
                            ],
                        ];
                    }
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Yetkisiz kullanım',
                        'title' => 'Yetki Yok!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Oturum süreniz dolduğu için tekrar giriş yapın.',
                    'title' => 'Oturum Süresi Doldu!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    public function dashboardSearch(Request $request, Response $response): Response
    {
        $incs_data = Manager::table('dashboard_search')
            ->get()
            ->all();
        $data = [];
        foreach ($incs_data as $inc_data) {
            $data['listItems'][] = [
                'name' => $inc_data->field,
                'url' => siteUrl($inc_data->url ?? ''),
                'icon' => $inc_data->icon,
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    public function getToken(Response $response): Response
    {
        return $response->setContent(md5(xssToken()->getToken() . '<br>' . auth()->get('_token')));
    }

    public function myAccountPpUpdate(Response $response, Request $request): Response
    {
        $data = [];

        if (auth()->get('login')) {
            if ($request->getMethod() == 'POST') {
                $file = upload('profile_photo')
                    ->options([
                        'file_overwrite' => true,
                    ])
                    ->rename(auth()->get('login'))
                    ->resize('250', '250')
                    ->convert('webp')
                    ->to('upload/user-pp')
                    ->getFile();


                $status = Manager::table('user')
                    ->where('user_key', auth()->get('login'))
                    ->update([
                        "profile_photo" => 'upload/user-pp/' . $file,
                    ]);

                if (! $status) {
                    $data = [
                        'success' => [
                            'message' => trans('Profil fotoğrafı güncellendi'),
                            'title' => trans('Başarılı!'),
                            'image' => 'upload/user-pp/' . $file,
                        ],
                    ];
                } else {
                    $data = [
                        'error' => [
                            'message' => 'Yetkisiz kullanım',
                            'title' => 'Yetki Yok!',
                            'image' => 'upload/user-pp/' . $file,
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => 'Yetkisiz kullanım',
                        'title' => 'Yetki Yok!',
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => 'Oturum süreniz dolduğu için tekrar giriş yapın.',
                    'title' => 'Oturum Süresi Doldu!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    public function users(Response $response): Response
    {
        $data = [];

        $licenseId = Manager::table('license')
            ->where('license_key', auth()->get('license'))
            ->get()
            ->all()[0]->id;


        $usersData = Manager::table('user')
            ->where('license', $licenseId)
            ->orderBy('id', 'desc')
            ->get();

        $i = 0;
        foreach ($usersData as $user) {
            $i++;
            $data[] = [
                'id' => $i,
                'realId' => $user->id,
                'profile_photo' => $user->profile_photo,
                'name' => $user->firstname . ' ' . $user->lastname,
                'email' => $user->email,
                'rank' => match ((int) $user->rank) {
                    1 => trans('Yönetici'),
                    2 => trans('Dijital Pazarlama'),
                    3 => trans('Muhasebe'),
                    4 => trans('Pazarlama'),
                    5 => trans('Lojistik'),
                    6 => trans('Operasyon'),
                    7 => trans('Reklam'),
                    8 => trans('Satın Alma'),
                    9 => trans('İthalat'),
                    10 => trans('İhracat'),
                    11 => trans('Planlama'),
                    12 => trans('Satış Geliştirme'),
                    13 => trans('Ürün Geliştirme (Ar-Ge)'),
                    14 => trans('Teknik Destek'),
                    15 => trans('Bilgi İşlem'),
                    16 => trans('Üretim'),
                    17 => trans('İnsan Kaynakları'),
                    default => trans('Tanımsız')
                },
                'status' => $user->online,
            ];

        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    public function newUser(Response $response, Request $request): Response
    {
        $data = [];

        if ($request->getMethod() == 'POST') {
            $this->validator
                ->rule('required', [
                    'firstName',
                    'lastName',
                    'email',
                    'rank',
                ])
                ->rule('email', 'email');

            if ($this->validator->validate() && xssToken()->isVerify()) {
                $confirm_code = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                $username = rand(100, 999) . '-' . slug(post('firstName') . post('lastname'))->generate();
                $password = substr(md5(carbon()::now()->diffForHumans() . $username), 0, 16);
                $licenseId = Manager::table('license')
                    ->where('license_key', auth()->get('license'))
                    ->get()
                    ->all()[0]->id;

                $status = Manager::table('user')
                    ->insert([
                        'user_key' => md5($username . post('email')),
                        'firstname' => post('firstName'),
                        'lastname' => post('lastName'),
                        'email' => post('email'),
                        'rank' => post('rank'),
                        'permission' => json_encode($_POST['permission']),
                        'confirm_code' => $confirm_code,
                        'license' => $licenseId,
                        'username' => $username,
                        'status' => 1,
                        'online' => 1,
                        'date' => carbon()::now(),
                        'country' => '',
                        'city' => '',
                        'address_detail' => '',
                        'address' => '',
                        'phone' => '',
                        'password' => $password,
                    ]);

                $mail = new PHPMailer(true);
                $currentUser = Manager::table('user')
                    ->where('user_key', auth()->get('login'))
                    ->get()
                    ->all()[0];

                try {
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->isSMTP();
                    $mail->Host = sysConfig('smtp_host');
                    $mail->SMTPAuth = true;
                    $mail->Username = sysConfig('smtp_email');
                    $mail->Password = sysConfig('smtp_pass');
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = sysConfig('smtp_port');

                    //Recipients
                    $mail->setFrom(sysConfig('smtp_email'), trans('Socore Dijital Sistemler'));
                    $mail->addAddress(post('email'), post('firstname'));

                    //Content
                    $mail->isHTML();
                    $mail->Subject = utf8_decode(trans('Socore Dijital Sistemler'));
                    $mail->Body = $this->view('mail.temp-pass', [
                        'one_firstname' => post('firstName'),
                        'one_lastname' => post('lastname'),
                        'code' => $confirm_code,
                        'two_firstname' => $currentUser->firstname,
                        'two_lastname' => $currentUser->lastname,
                        'company' => $currentUser->company,
                        'password' => $password,
                    ]);
                    $mail->CharSet = 'UTF-8';
                    $mail->send();
                } catch (\Exception $e) {
                    $a = $e->getMessage();
                }


                if ($status) {
                    $data = [
                        'success' => [
                            'message' => trans('Kullanıcı başarıyla eklendi ve şifre oluşturma E-postası gönderildi.'),
                            'title' => trans('Başarılı!'),
                        ],
                    ];
                } else {
                    $data = [
                        'error' => [
                            'message' => trans('Kullanıcı eklenirken bir sorun oluştu.'),
                            'title' => trans('Hata!'),
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => trans('Formda eksik ya da hatalı girdiğiniz yerler var.'),
                        'title' => trans('Hata!'),
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => trans('Hatalı bir istek!'),
                    'title' => trans('Hata!'),
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param Response $response
     * @param Request $request
     *
     * @return Response
     */
    public function preferences(Response $response, Request $request): Response
    {
        $data = [];

        if ($request->getMethod() == 'POST') {
            if (is_array(post('preferences'))) {

                $pref = Manager::table('user')
                    ->where('user_key', auth()->get('login'))
                    ->get()
                    ->all()[0]->preferences;

                $pref = array_merge(json_decode($pref, true), post('preferences'));

                $status = Manager::table('user')
                    ->where('user_key', auth()->get('login'))
                    ->update([
                        'preferences' => json_encode($pref),
                    ]);
                if (! $status) {
                    $data = [
                        'error' => [
                            'message' => trans('İşlem başarılı olamadı. Veritabanı kaynaklı bir sorun.'),
                            'title' => trans('Hata!'),
                        ],
                    ];
                }
            } else {
                $data = [
                    'error' => [
                        'message' => trans('İzinsiz bir girişe rastlandı...'),
                        'title' => trans('İzinsiz!'),
                    ],
                ];
            }
        } else {
            $data = [
                'error' => [
                    'message' => trans('İzinsiz bir girişe rastlandı...'),
                    'title' => trans('İzinsiz!'),
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function currencies(Response $response, Request $request): Response
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.tcmb.gov.tr/kurlar/today.xml')->getBody();


        $data = xml_decode($res)['Currency'];


        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Response $response
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function interfaces(Response $response): Response
    {
        $data = Manager::table('license')
            ->where('id', auth()->get('licenseId'))
            ->get()[0]->interface;


        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent($data);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteMedia(Response $response, Request $request): Response
    {
        $data = [];
        if ($request->getMethod() === 'POST') {

            $status = Manager::table('media')
                ->delete(post('key'));

            if ($status) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
        }
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));

    }

    /**
     * @param \Symfony\Component\HttpFoundation\Response $response
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sliders(Response $response): Response
    {
        $data = [];

        $products = Manager::table('slider')
            ->where('license', auth()->get('licenseId'))
            ->orderBy('id', 'desc')
            ->get()
            ->all();

        $i = 0;
        foreach ($products as $product) {
            $i++;
            $data[] = [
                'id' => $i,
                'realId' => $product->id,
                'title' => $product->name,
                'json' => json_decode($product->json, true),
            ];
        }

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    public function taxes(Request $request, Response $response): Response
    {
        $data = [
            [
                'realId' => '28',
                'id' => '1',
                'area' => 'tr',
                'taxes' => [
                    '%20',
                    '%10',
                    '%1',
                ],
            ],
        ];

        foreach ($data as $key => $value) {
            $areaData = Manager::table('area')
                ->where('code', $value['area'])
                ->get()
                ->first();

            $areaData = json_decode(json_encode($areaData), true);

            if (isset($areaData['language'])) {
                $areaData['language'] = json_decode($areaData['language'], true);
            }

            if (isset($areaData['currency'])) {
                $areaData['currency'] = json_decode($areaData['currency'], true);
            }

            $data[$key]['area'] = $areaData;
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode([
            'recordsTotal' => 100,
            'recordsFiltered' => 100,
            'data' => $data,
        ]));
    }

    public function getArea(Response $response): Response
    {

        $data = Manager::table('area')
            ->where('code', post('code'))
            ->get()
            ->first();

        $data = json_decode(json_encode($data), true);

        if (isset($data['language'])) {
            $data['language'] = json_decode($data['language'], true);
        }

        if (isset($data['currency'])) {
            $data['currency'] = json_decode($data['currency'], true);
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }

    public function addPaymentMethod(Request $request, Response $response): Response
    {
        $data = [];
        $customData = [];
        foreach ($_POST as $key => $value) {
            $customData[$key] = $value;
        }
        unset($customData['max_cart_purchase']);
        unset($customData['min_cart_purchase']);
        unset($customData['service']);

        $status = Manager::table('payment_method')
            ->insert([
                'license' => auth()->get('licenseId'),
                'max_cart_purchase' => post('max_cart_purchase'),
                'min_cart_purchase' => post('min_cart_purchase'),
                'service' => post('service'),
                'data' => json_encode($customData),
            ]);

        if($status){
            $data = [
                'message' => 'Başarıyla kaydettik'
            ];
        } else {
            $data = [
                'message' => 'Başarısızlıkla kaybettik'
            ];
        }

        $response->headers->set('Content-Type', 'application/json');
        return $response->setContent(json_encode($data));
    }

    public function paymentDelete(Request $request, Response $response): Response
    {
        $data = [];

        $status = Manager::table('payment_method')
            ->where('id', post('id'))
            ->delete();

        if($status){
            $data = [
                'success' => [
                    'message' => 'Ödeme yöntemi kaldırıldı.',
                    'title' => 'Başarılı!',
                ],
            ];
        } else {
            $data = [
                'error' => [
                    'message' => 'Ödeme Yöntemi kaldırılırken bir sorun oluştu!',
                    'title' => 'Hata!',
                ],
            ];
        }

        $response->headers->set('Content-Type', 'application/json');
        return $response->setContent(json_encode($data));
    }
}
