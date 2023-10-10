<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use Faker\Factory;
	use Illuminate\Database\Capsule\Manager;
	use Symfony\Component\HttpFoundation\Request;
	
	class Contents extends Controller
	{
		/**
		 * @return string
		 */
		public function blogs(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('contents.blogs');
		}
		
		/**
		 * @param Request $request
		 * @return string
		 */
		public function newBlog(Request $request): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			if ($request->getMethod() == 'POST'){
				$this->validator->rule('required', [
					'blog_title',
					'blog_content',
					'blog_status'
				]);
				$this->validator->labels([
					'blog_title' => 'Blog Başlık',
					'blog_content' => 'Blog İçerik',
					'blog_status' => 'Blog Durum'
				]);
				if ($this->validator->validate() && xssToken()->isVerify()){
					$status = Manager::table('blog')
						->insert([
							'title' => post('blog_title'),
							'files' => json_encode($_POST['blog_images']),
							'content' => post('blog_content'),
							'status' => post('blog_status'),
							'seo_extension' => post('seo_extension'),
							'seo_title' => post('seo_title'),
							'seo_keywords' => post('seo_keywords'),
							'seo_description' => post('seo_description')
						]);
					if ($status){
						redirect(siteUrl('contents/blogs'))
							->with('Blog başarıyla eklendi')
							->send();
					} else {
						redirect(siteUrl('contents/blogs'))
							->with('Blog eklenirken bir hata oluştu')
							->send();
					}
				} else {
					redirect(siteUrl('contents/blogs'))
						->with('Sayfanızın güncel olduğundan ve boş alan bırakmadığınızdan emin olun.')
						->send();
				}
			}
			
			return $this->view('contents.newBlog');
		}
		
		public function Faq(Request $request): string
		{
			return $this->view('contents.faq');
		}
		
		public function pages(Request $request): string
		{
			return $this->view('contents.pages');
		}
		
		public function newPage(Request $request): string
		{
			if($request->getMethod() == 'POST') {
				$this->validator->rule('required', [
					'title',
					'content',
					'status'
				]);
				if($this->validator->validate() && xssToken()->isVerify()){
					$status = Manager::table('page')
						->insert([
							'license' => auth()->get('licenseId'),
							'title' => post('title'),
							'content' => post('content'),
							'status' => post('status'),
							'seo_extension' => post('seo_extension'),
							'seo_title' => post('seo_title'),
							'seo_keywords' => post('seo_keywords'),
							'seo_description' => post('seo_description')
						]);
					if($status){
						redirect(siteUrl('contents/pages'))
							->with('Sayfa başarıyla eklendi.')
							->send();
					} else {
						redirect(siteUrl('contents/pages'))
							->with('Sayfa eklenirken bir sorun oluştu.')
							->send();
					}
				} else {
					redirect(siteUrl('contents/pages'))
						->with('Lütfen boş alan bırakmadığınızdan ve sayfanızın güncel olduğundan emin olun.')
						->send();
				}
			}
			return $this->view('contents.new-page');
		}
		
		
		public function editPage($slug, Request $request): string
		{
			if($request->getMethod() == 'POST'){
				$this->validator->rule('required', [
					'title',
					'content',
					'status'
				]);
				if($this->validator->validate() && xssToken()->isVerify()){
					$status = Manager::table('page')
						->where('id', $slug)
						->where('license', auth()->get('licenseId'))
						->update([
							'title' => post('title'),
							'content' => post('content'),
							'status' => post('status'),
							'seo_extension' => post('seo_extension'),
							'seo_title' => post('seo_title'),
							'seo_keywords' => post('seo_keywords'),
							'seo_description' => post('seo_description')
						]);
					if($status){
						redirect(siteUrl('contents/pages'))
							->with('Sayfa başarıyla düzenlendi.')
							->send();
					} else {
						redirect(siteUrl('contents/pages'))
							->with('Sayfa düzenlenirken bir sorun oluştu.')
							->send();
					}
				} else {
					redirect(siteUrl('contents/pages'))
						->with('Lütfen boş alan bırakmadığınızdan ve sayfanızın güncel olduğundan emin olun.')
						->send();
				}
			}
			$data = Manager::table('page')
				->where('license', auth()->get('licenseId'))
				->where('id', $slug)
				->get()
				->all()[0];
			return $this->view('contents.edit-page', ['data' => $data]);
		}
	}