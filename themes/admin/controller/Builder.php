<?php

namespace themes\admin\controller;

use Core\Controller;
use Illuminate\Database\Capsule\Manager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Builder extends Controller
{
    /**
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function main(Request $request, Response $response): string
    {
        if ($request->getMethod() === 'POST'){
            $json = $_POST['save_content'];

            $status = Manager::table('license')
                ->where('id', auth()->get('licenseId'))
                ->update([
                    'interface' => json_encode(json_decode($json, true))
                ]);

            if ($status){
                redirect(siteUrl('/web-builder'))
                    ->with('Arayüz ayarları başarıyla kaydedildi')
                    ->send();
            } else {
                redirect(siteUrl('/web-builder'))
                    ->with('Arayüz ayarları kaydedilirken bir sorun oluştu')
                    ->send();
            }
        }

        $data = Manager::table('license')
            ->where('id', auth()->get('licenseId'))
            ->get()
            ->first();

        $interface = json_decode($data->interface, true);
        $pages = [];

        foreach ($interface as $key => $value) {
            $pages[$key] = $value['seo']['title'];
        }

        return $this->view('web-builder.main', [
            'navigation' => [
                [
                    'title' => 'Header',
                    'draggable' => false
                ],
                [
                    'title' => 'Slider'
                ],
                [
                    'title' => 'Banner'
                ],
                [
                    'title' => 'Ürün Listesi'
                ],
                [
                    'title' => 'Kategoriler'
                ],
                [
                    'title' => 'Footer',
                    'draggable' => false
                ]
            ],
            'pages' => $pages
        ]);
    }

    public function canvas($role, $id, $key): string
    {
        return $this->view('web-builder.canvas.' . $role . '.' . $id, [
            'role' => $role,
            'id' =>  $id,
            'key' => $key,
            'data' => json_decode(htmlspecialchars_decode(get('data')), true)
        ]);
    }
}