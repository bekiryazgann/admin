<?php

namespace themes\admin\controller;

use Core\Controller;
use Illuminate\Database\Capsule\Manager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DesignSettings extends Controller
{
    public function menuSettings(): string
    {
        return $this->view('design-settings.menuSettings');
    }

    public function editMenuSettings($slug, Request $request, Response $response): string
    {
        if ($slug == 'header' || $slug == 'footer') {


            if ($request->getMethod() == 'POST') {
                if (xssToken()->isVerify()) {
                    $status = Manager::table('menu')
                        ->where('license', auth()->get('licenseId'))
                        ->where('area', $slug)
                        ->update([
                            'json' => $_POST['json'],
                        ]);


                    if ($status) {
                        redirect(siteUrl('design-settings/menu-settings'))
                            ->with('Menü değişiklikleri başarıyla kaydedildi')
                            ->send();

                        return '';
                    } else {
                        redirect(siteUrl('design-settings/menu-settings'))
                            ->with('Veritabanında güncelleme yapılırken bir sorun oluştu')
                            ->send();

                        return '';
                    }
                }
            }


            $data = Manager::table('menu')
                ->where('license', auth()->get('licenseId'))
                ->where('area', $slug)
                ->get()
                ->all();


            if (empty($data)) {
                Manager::table('menu')
                    ->insert([
                        'license' => auth()->get('licenseId'),
                        'area' => $slug,
                        'json' => '[]',
                    ]);

                $setData = [];
            } else {
                $setData = $data[0];
            }

            return $this->view('design-settings.edit-menu-settings', [
                'slug' => $slug,
                'data' => $setData,
            ]);
        } else {
            redirect(siteUrl('design-settings/menu-settings'))
                ->send();

            return '';
        }

    }

    public function sliderSettings(): string
    {
        return $this->view('design-settings.slider-settings');
    }

    public function editSlider($slug, Response $response, Request $request): string
    {
        if ($request->getMethod() === 'POST'){
            if (xssToken()->isVerify()){
                $updateStatus = Manager::table('slider')
                    ->where('id', $slug)
                    ->where('license', auth()->get('licenseId'))
                    ->update([
                        'area' => '',
                        'name' => post('slider_title'),
                        'json' => json_encode($_POST['slider']),
                    ]);

                if ($updateStatus){
                    redirect(siteUrl('design-settings/slider-settings'))
                        ->with('Slider başarılı bir şekilde güncellendi.')
                        ->send();
                } else {
                    redirect(siteUrl('design-settings/slider-settings'))
                        ->with('Slider güncellenirken bir sorun oluştu!')
                        ->send();
                }
            } else {
                redirect(siteUrl('design-settings/slider-settings'))
                    ->with('İzinsiz erişim isteği')
                    ->send();
            }
        }
        $data = Manager::table('slider')
            ->where('id', $slug)
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->first();
        $data->json = json_decode($data->json);

        return $this->view('design-settings.edit-slider', [
            'data' => $data
        ]);
    }

    public function newSlider(Request $request, Response $response): string
    {
        if ($request->getMethod() == 'POST') {

            $status = Manager::table('slider')
                ->insert([
                    'license' => auth()->get('licenseId'),
                    'area' => '',
                    'name' => post('slider_title'),
                    'json' => json_encode($_POST['slider']),
                ]);

            if ($status) {
                redirect(siteUrl('design-settings/slider-settings'))
                    ->with('Slider başarılı bir şekilde eklendi.')
                    ->send();
            } else {
                redirect(siteUrl('design-settings/slider-settings'))
                    ->with('Slider eklenirken bir hata oluştu!')
                    ->send();
            }
        }

        return $this->view('design-settings.new-slider', [
            'uuid' => uuid(),
        ]);
    }

    public function deleteSlider(Request $request, Response $response): Response
    {
        $data = [];

        if ($request->getMethod() === 'POST') {
            $status = Manager::table('slider')
                ->where('id', post('id'))
                ->where('license', auth()->get('licenseId'))
                ->delete();

            if ($status) {
                $data['success'] = [
                    "message" => "Slider başarıyla silindi",
                    "title" => "Başarılı!",
                ];
            } else {
                $data['error'] = [
                    "message" => "Slider silinirken bir hata oluştu!",
                    "title" => "Hata!",
                ];
            }
        } else {
            $data['error'] = [
                "message" => "İzinsiz erişim isteği",
                "title" => "Hata!",
            ];
        }

        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($data));
    }
}