<?php

namespace themes\admin\controller;

use Core\Controller;
use Illuminate\Database\Capsule\Manager;
use Symfony\Component\HttpFoundation\Request;

class Setting extends Controller
{
    public function systemSettings(): string
    {
        return $this->view('settings.system-settings');
    }

    public function paymentSettings(Request $request): string
    {

        if ($request->getMethod() === 'POST') {
            if (xssToken()->isVerify()) {
                $update_satatus = Manager::table('payment_preferences')
                    ->where('license', auth()->get('licenseId'))
                    ->update([
                        'license' => auth()->get('licenseId'),
                        'visitor_shopping' => post('visitor_shopping'),
                        'phone_information' => post('phone_information'),
                        'distance_selling_contract' => post('distance_selling_contract'),
                        'post_code' => post('post_code'),
                        'gift_wrap' => post('gift_wrap'),
                        'order_note' => post('order_note'),
                        'tc_no' => post('tc_no')
                    ]);
                if ($update_satatus){
                    redirect(siteUrl('settings/payment-settings'))
                        ->with('Tercihler başarıyla güncellendi.')
                        ->send();
                } else {
                    redirect(siteUrl('settings/payment-settings'))
                        ->with('Tercihler güncellenirken bir hata oluştu!')
                        ->send();
                }
            } else {
                redirect(siteUrl('settings/payment-settings'))
                    ->with('Bazı değerler eksik ya da hatalı girilmiş')
                    ->send();
            }
        }

        $control = Manager::table('payment_preferences')
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->count();

        if ($control < 1) {
            Manager::table('payment_preferences')
                ->insert([
                    'license' => auth()->get('licenseId'),
                ]);
        }

        $paymentPref = Manager::table('payment_preferences')
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->first();

        $data = Manager::table('payment_method')
            ->where('license', auth()->get('licenseId'))
            ->get()
            ->all();

        $addedPaymentMethods = [];

        foreach ($data as $pay) {
            $addedPaymentMethods[$pay->service] = $pay->service;
        }

        return $this->view('settings.payment-settings', [
            'data' => $data,
            'addedPaymentMethods' => $addedPaymentMethods,
            'paymentPref' => $paymentPref,
        ]);
    }
}