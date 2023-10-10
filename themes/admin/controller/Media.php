<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use Faker\Factory;
	use Illuminate\Database\Capsule\Manager;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	
	class Media extends Controller
	{
		/**
		 * @return string
		 */
		public function main(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->with('Oturum süreniz doldu. Lütfen tekrar giriş yapın...')->send();
			}
			$licenseId = Manager::table('license')
				->where('license_key', auth()->get('license'))
				->get()
				->all()[0]
				->id;
			$media = Manager::table('media')
				->where('license', $licenseId)
				->orderBy('id', 'desc')
				->get()
				->all();
			return $this->view('media.main', compact('media'));
		}
		
		public function noImage(Response $response): Response
		{
			$response->headers->set('Content-Type', 'image/png');
			return $response->setContent(base64_decode('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'));
		}
		
		/**
		 * @param Request $request
		 * @return void
		 */
		public function newMedia(Request $request): void
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->with('Oturum süreniz doldu. Lütfen tekrar giriş yapın...')->send();
			}

			
			if($request->getMethod() == 'POST'){
				$this->validator->rule('required', [
					'media_title'
				]);
				$this->validator->labels([
					'media_title' => trans('Başlık')
				]);

				if(xssToken()->isVerify() && $this->validator->validate()){
					$licenseId = Manager::table('license')
						->where('license_key', auth()->get('license'))
						->get()
						->all()[0]
						->id;

					$userId = Manager::table('user')
						->where('user_key', auth()->get('login'))
						->get()
						->all()[0]
						->id;

					$file = @upload('media_image');
                    print_r($file);

					
					if ($error = $file->error()){
						redirect(siteUrl('media-manager'))
							->with('Görsel Yükleme Hatası: ' . $error)
							->send();
					} else {
						$file->rename(md5(rand(981, 7251)));
						if(post('image_webp_status') == 'on'){
							$file->convert('webp');
						}
						$status = Manager::table('media')
							->insert([
								"license" => $licenseId,
								"title" => post('media_title'),
								"alternative" => post('media_alternative'),
								"definition" => post('media_definition'),
								"image" => $file->to('media')->getFile(),
								"name" => $file->to('media')->getFile(),
								"type" => 'WEBP',
								"file_size" => "10kb",
								"image_size" => '',
								"date" => date('Y-m-d H:i:s'),
								"user" => $userId
							]);
						if ($status) {
							redirect(siteUrl('media-manager'))
								->with(trans('Medya Başarıyla Yüklendi.'))
								->send();
						} else {
							redirect(siteUrl('media-manager'))
								->with(trans('Medya Yüklenemedi.'))
								->send();
						}
					}
				}else {
					redirect(siteUrl('media-manager'))
						->with(trans('Lütfen zorunlu alanları doldurun.'))
						->send();
				}
			} else {
				redirect(siteUrl('media-manager'))
					->with(trans('İzinsiz Erişim!'))
					->send();
			}
		}
	}