<?php

    namespace themes\admin\controller;

    use Core\Controller;
    use Illuminate\Database\Capsule\Manager;
    use Symfony\Component\HttpFoundation\Request;

    class SystemSettings extends Controller
    {
        /**
         * @param Request $request
         *
         * @return string
         */
        public function corporateInformation(Request $request): string
        {
            $settings = Manager::table('company_settings')
                ->where('license', auth()->get('licenseId'))
                ->get()
                ->all();
            if (json_decode(json_encode($settings), true) == []) {
                Manager::table('company_settings')
                    ->insert([
                        'license' => auth()->get('licenseId'),
                    ]);
            }

            if ($request->getMethod() == 'POST') {

                $status = Manager::table('company_settings')
                    ->where('license', auth()->get('licenseId'))
                    ->update([
                        'company_name' => post('company_name'),
                        'company_official_name' => post('company_official_name'),
                        'authorized_person' => post('authorized_person'),
                        'phone_number' => post('phone_number'),
                        'fax' => post('fax'),
                        'country' => post('country'),
                        'city' => post('city'),
                        'district' => post('district'),
                        'post_code' => post('post_code'),
                        'address' => post('address'),
                        'email' => post('email'),
                        'b2c_email' => post('b2c_email'),
                        'company_registration_number' => post('company_registration_number'),
                        'tax_administration' => post('tax_administration'),
                        'tax_no' => post('tax_no'),
                        'cap_address' => post('cap_address'),
                        'mersis_no' => post('mersis_no'),
                        'logo' => $_POST['logo'],
                        'favicon' => $_POST['favicon']
                    ]);

                if ($status){
                    redirect(siteUrl('settings/system-settings/corporate-information'))
                        ->with('Kurumsal bilgiler başarılı bir şekilde kaydedildi')
                        ->send();
                } else {
                    redirect(siteUrl('settings/system-settings/corporate-information'))
                        ->with('Kurumsal bilgiler kaydedilirken bir sorun oluştu')
                        ->send();
                }
            }

            $data = Manager::table('company_settings')
                ->where('license', auth()->get('licenseId'))
                ->get()
                ->first();

            return $this->view('system-settings.corporate-information', ['data' => $data]);
        }

        /**
         * @param Request $request
         *
         * @return string
         */
        public function currencySettings(Request $request): string
        {
            return $this->view('system-settings.currency-settings');
        }

        public function taxSettings(Request $request): string
        {
            return $this->view('system-settings.tax-settings');
        }

        public function seoAndDomain(): string
        {
            return $this->view('system-settings.seo-and-domain');
        }

        public function manageDomains(): string
        {
            return $this->view('system-settings.manage-domains');
        }
    }