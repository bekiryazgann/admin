<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use \Symfony\Component\HttpFoundation\Request;
	use Illuminate\Database\Capsule\Manager;
	
	class User extends Controller
	{
        /**
         * @param Request $request
         * @return string
         */
		public function myaccount(Request $request): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			$data = Manager::table('user')
						->where('user_key', auth()->get('login'))
						->get()
						->all()[0];




            if($request->getMethod() === 'POST'){
                $this->validator
                    ->rule('required', [
                        'firstname',
                        'lastname',
                        'username',
                        'phone',
                        'address'
                    ])
                    ->rule('integer', [
                        'phone'
                    ])
                    ->labels([
                        'firstname' => trans('Ad'),
                        'lastname' => trans('Soyad'),
                        'username' => trans('Kullanıcı Adı'),
                        'phone' => trans('Telefon Numarası'),
                        'address' => trans('Adres')
                    ]);
                if ($this->validator->validate() && xssToken()->isVerify()){
                    $status = Manager::table('user')
                        ->where('user_key', auth()->get('login'))
                        ->update([
                            'firstname' => post('firstname'),
                            'lastname' => post('lastname'),
                            'username' => post('username'),
                            'phone' => post('phone'),
                            'address' => post('address')
                        ]);
                    if ($status){
                        redirect(siteUrl('my-account'))
                            ->with(trans('Değişiklikler başarılı bir şekilde kaydedildi.'))
                            ->send();
                    } else {
                        redirect(siteUrl('my-account'))
                            ->with(trans('Değişiklikler kaydedilirken bir sorun oluştu.'))
                            ->send();
                    }
                }
			}

			return $this->view('user.my-account', ['data' => $data]);
		}


        /**
         * @param Request $request
         * @return void
         */
        public function myAccountPasswordUpdate(Request $request){
            if ($request->getMethod() === 'POST'){
                $userData = Manager::table('user')
                    ->where('user_key', auth()->get('login'))
                    ->get()
                    ->all()[0];

                if ($userData->password === $_POST['old_password']){
                    if ($_POST['new_password'] === $_POST['renew_password']){
                        if ($_POST['new_password'] !== $_POST['old_password']){
                            $status = Manager::table('user')
                                ->where('user_key', auth()->get('login'))
                                ->update([
                                    'password' => $_POST['new_password']
                                ]);
                            if ($status){
                                redirect(siteUrl('my-account'))
                                    ->with('Şifre başarıyla güncellendi.')
                                    ->send();
                            } else {
                                redirect(siteUrl('my-account'))
                                    ->with("Şifre güncellenirken bir hata oluştu.")
                                    ->send();
                            }
                        } else {
                            redirect(siteUrl('my-account'))
                                ->with('Yeni şifre, eski şifreyle aynı girildi.')
                                ->send();
                        }
                    } else {
                        redirect(siteUrl('my-account'))
                            ->with('Yeni şifreler eşleşmiyor.')
                            ->send();
                    }
                } else {
                    redirect(siteUrl('my-account'))
                        ->with('Eski şifre hatalı girildi.')
                        ->send();
                }
            } else {
                redirect(siteUrl('my-account'))
                    ->with('Maalesef, hatalı bir istek alındı.')
                    ->send();
            }
        }

        /**
         * @param Request $request
         * @return string
         */
		public function users(Request $request): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			return $this->view('user.users');
		}
	}
	