<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use Illuminate\Database\Capsule\Manager;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use Symfony\Component\HttpFoundation\Request;
	
	class Auth extends Controller
	{
		/**
		 * @param Request $request
		 * @return string
		 */
		public function login(Request $request): string
		{
			if ($request->getMethod() == 'POST') {
				$this->validator->rule('required', [
					'password',
					'email'
				]);
				$this->validator->rule('email', 'email');
				$this->validator->labels([
					'username' => trans('Kullanıcı Adı'),
					'email' => trans('E-posta')
				]);
				if ($this->validator->validate() && xssToken()->isVerify()) {
					
					$count = Manager::table('user')
						->where('email', '=', post('email'))
						->where('password', '=', post('password'));
					if ($count->count()) {
						$userData = $count->get()->all();
						
						$licenseData = Manager::table('license')
							->where('id', '=', $userData['0']->license)
							->get()
							->all();
						
						if ((string)$userData['0']->status == '0') {
							Manager::table('user')
								->where('id', $userData['0']->id)
								->update([
									'status' => '1'
								]);
						}
						
						Manager::table('user')
							->where('id', $userData['0']->id)
							->update([
								'online' => '1'
							]);
						
						auth()->set('login', $userData['0']->user_key);
						auth()->set('license', $licenseData['0']->license_key);
						auth()->set('licenseId', $licenseData['0']->id);

						redirect(siteUrl())
							->with(trans('Giriş işleminiz başarıyla yapıldı.'))
							->send();
					} else {
						redirect(siteUrl('auth/login'))
							->with(trans('E-posta ya da şifreniz hatalı. Lütfen kontrol edin.'))
							->send();
					}
					die;
				}
			}
			return $this->view('auth.login');
		}
		
		/**
		 * @param Request $request
		 * @return string
		 */
		public function register(Request $request): string
		{
			if ($request->getMethod() == 'POST') {
				
				$this->validator->rule('required', [
					'username',
					'email',
					'password',
					'confirm-password',
					'page_name',
					'firstname',
					'lastname',
					'phone',
					'address'
				]);
				$this->validator->rule('equals', 'password', 'confirm-password');
				$this->validator->rule('email', 'email');
				$this->validator->labels([
					'username' => trans('Kullanıcı Adı'),
					'email' => trans('E-posta'),
					'password' => trans('Parola'),
					'confirm-password' => trans('Parola Tekrar'),
					'firstname' => trans('Ad'),
					'lastname' => trans('Soyad'),
					'phone' => trans('Telefon Numarası'),
					'address' => trans('Adres'),
					'page_name' => trans('Sayfa Adı')
				]);
				
				if ($this->validator->validate() && xssToken()->isVerify()) {
					/*
					 * todo: e-posta hesabına ait başka kayıt var mı kontrol edilecek
					 * todo: kullanıcı adına başka bir kayıt var mı kontrol edilecek
					 * todo: sayfa adına başka bir kayıt var mı kontrol edilecek
					 */
					
					$emailCount = Manager::table('user')
						->where('email', '=', post('email'))
						->count();
					
					$usernameCount = Manager::table('user')
						->where('username', '=', post('username'))
						->count();
					
					$pageNameCount = Manager::table('license')
						->where('domain', '=', post('page_name') . '.mysocore.app')
						->count();
					
					$phoneCount = Manager::table('user')
						->where('phone', '=', post('phone'))
						->count();
					
					if ($emailCount == 0 && $usernameCount == 0 && $pageNameCount == 0 && $phoneCount == 0) {
						$confirm_code = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
						Manager::table('license')
							->insert([
								'domain' => $_POST['page_name'] . '.mysocore.app',
								'package' => '1',
								'root_user' => '0',
								'date' => carbon()::now(),
								'license_key' => md5($_POST['page_name'])
							]);
						
						$licenseData = Manager::table('license')
							->where('license_key', '=', md5(post('page_name')))
							->get()
							->all();
						
						
						Manager::table('user')
							->insert([
								'license' => $licenseData[0]->id,
								'user_key' => md5(post('username') . post('email')),
								'username' => post('username'),
								'email' => post('email'),
								'password' => post('password'),
								'firstname' => post('firstname'),
								'lastname' => post('lastname'),
								'phone' => post('phone'),
								'address' => post('address'),
								'address_detail' => '',
								'city' => '',
								'country' => '',
								'date' => carbon()::now(),
								'status' => '0',
								'online' => '1',
								'rank' => '1',
								'confirm_code' => $confirm_code
							]);
						
						$userData = Manager::table('user')
							->where('user_key', '=', md5(post('username') . post('email')))
							->get()
							->all();
						
						Manager::table('license')
							->where('license_key', '=', md5(post('page_name')))
							->update([
								'root_user' => $userData[0]->id
							]);
						
						$mail = new PHPMailer(true);
						
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
							$mail->Body = $this->view('mail.confirmCode', [
								'firstname' => post('firstname'),
								'lastname' => post('lastname'),
								'code' => $confirm_code
							]);
							$mail->send();
							
							auth()->set('auth_verification', post('email'));
							
							redirect(siteUrl('auth/verification'))
								->with(trans('Onay kodu adresinize gönderildi. Mail kutunuzu kontrol edin'))
								->send();
						} catch (\Exception $e) {
							die($e->getMessage());
						}
					}
					{
						if ($emailCount !== 0) {
							redirect(siteUrl('auth/register'))
								->with(trans('E-posta daha önce kullanılmış'))
								->send();
						}
						if ($usernameCount !== 0) {
							redirect(siteUrl('auth/register'))
								->with(trans('Kullanıcı adı daha önce kullanılmış'))
								->send();
						}
						if ($pageNameCount !== 0) {
							redirect(siteUrl('auth/register'))
								->with(trans('Sayfa adı daha önce kullanılmış'))
								->send();
						}
						if ($phoneCount !== 0) {
							redirect(siteUrl('auth/register'))
								->with(trans('Telefon numarası daha önce kullanılmış'))
								->send();
						}
					}
				}
			}
			return $this->view('auth.register');
		}
		
		public function logout()
		{
			
			Manager::table('user')
				->where('user_key', auth()->get('login'))
				->update([
					'online' => '0'
				]);
			
			auth()->clear();
			redirect(siteUrl('auth/login'))
				->send();
		}
		
		public function verification(Request $request): string
		{
			if ($request->getMethod() == 'POST') {
				$verifyCode = post('vrfct_1') . post('vrfct_2') . post('vrfct_3') . post('vrfct_4') . post('vrfct_5') . post('vrfct_6');
				$email = auth()->get('auth_verification');
				
				$userData = Manager::table('user')
					->where('email', '=', $email)
					->get()
					->all();
				
				if ($userData[0]->confirm_code == $verifyCode) {
					$status = Manager::table('user')
						->where('email', '=', $email)
						->update([
							'status' => '1'
						]);
					if ($status) {
						
						$licenseData = Manager::table('license')
							->where('id', '=', $userData[0]->id)
							->get()
							->all();
						
						auth()->clear();
						auth()->set('login', $userData['0']->user_key);
						auth()->set('license', $licenseData['0']->license_key);
						auth()->set('licenseId', $licenseData['0']->id);

						redirect()
							->with(trans('Hesabınız Başarıyla Oluşturuldu'))
							->send();
					} else {
						redirect(siteUrl('auth/login'))
							->with(trans('Hesap Onaylanırken Bir Sorun  Oluştu'))
							->send();
					}
				} else {
					redirect(siteUrl('auth/verification'))
						->with(trans('Doğrulama Kodunuzu Yanlış Girdiniz'))
						->send();
				}
			}
			return $this->view('auth.verification', [
				'email' => auth()->get('auth_verification')
			]);
		}
		
		/**
		 * @return string
		 */
		public function forgotPassword(): string
		{
			return $this->view('auth.forgotPassword');
		}
		
		/**
		 * @return string
		 */
		public function notFound(): string
		{
			return $this->view('auth.404');
		}
		
		/**
		 * @return string
		 */
		public function unstoppedProcess(): string
		{
			return $this->view('auth.unstoppedProcess');
		}
	}