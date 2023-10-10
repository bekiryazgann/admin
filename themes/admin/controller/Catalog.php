<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use Faker\Factory;
	use GuzzleHttp\Client;
	use http\Header;
	use \Symfony\Component\HttpFoundation\Request;
	use Illuminate\Database\Capsule\Manager;
	use Symfony\Component\HttpFoundation\Response;
	
	class Catalog extends Controller
	{
		/**
		 * @return string
		 */
		public function main(): string
		{
			if (!auth()->get('login')) {
				redirect(siteUrl('auth/login'))->send();
			}

			return $this->view('catalog.catalog');
		}
		
		/**
		 * @param $slug
		 * @param Request $request
		 * @param Response $response
		 * @return string
		 */
		public function editProduct($slug, Request $request, Response $response): string
		{
			
			if ($request->getMethod() == 'POST'){
				$this->validator->rule('required', [
					'product_name',
					'product_type',
					'product_fee',
					'product_stock_code',
					'product_stock_qty',
					'product_cargo_desi',
					'product_brand',
					'product_short_description',
					'product_long_description'
				]);
				
				if($this->validator->validate() && xssToken()->isVerify()){
					
					if (is_array(json_decode($_POST['product_images'], true))) {
						$image = json_encode(json_decode($_POST['product_images'], true));
					} else {
						$image = $_POST['product_images'];
					}


					$status = Manager::table('product')
						->where('id', $slug)
						->update([
							'name' => post('product_name'),
							'images' => $image,
							'license' => auth()->get('licenseId'),
							'type' => post('product_type'),
							'fee' => post('product_fee'),
							'purchase_price' => post('purchase_price'),
							'max_purchase' => post('max_purchase'),
							'sale_fee' => post('product_sale_fee'),
							'stock_barcode' => post('product_barcode'),
							'stock_code' => post('product_stock_code'),
							'stock_qty' => post('product_stock_qty'),
							'stock_desi' => post('product_cargo_desi'),
							'variants' => $_POST['variants_json'],
							'brand' => post('product_brand'),
							'tags' => json_encode($_POST['product_filters'] ?? []),
							'supplier' => $_POST['product_supplier'],
							'category' => json_encode($_POST['product_categories']),
							'short_description' => post('product_short_description'),
							'long_description' => post('product_long_description'),
							'seo_extension' => (post('seo_extension') == '') ? slug(post('seo_title'))->generate() : slug(post('seo_extension'))->generate(),
							'seo_title' => post('seo_title'),
							'seo_keywords' => post('seo_keywords'),
							'seo_description' => post('seo_description')
						]);
					
					if ($status) {
						redirect(siteUrl('catalog/'))
							->with('Ürün Başarıyla Düzenlendi')
							->send();
					} else {
						redirect(siteUrl('catalog/'))
							->with('Ürün Düzenlenemedi')
							->send();
					}
				} else {
					redirect($_SERVER['HTTP_REFERER'])
						->with('Lütfen boş zorunlu alanları doldurduğunuzdan emin olun.')
						->send();
				}
			}
			
			$data = Manager::table('product')
				->where('license', auth()->get('licenseId'))
				->where('id', $slug);
			$detail = [];
			if ($data->count() > 0) {
				$detail = $data->get()
					->all()[0];
			} else {
				redirect(siteUrl('catalog/'))
					->send();
			}
			
			$filters = Manager::table('filter')
				->where('license', auth()->get('licenseId'))
				->get();
			
			$brands = Manager::table('brand')
				->where('license', auth()->get('licenseId'))
				->get();
			
			$categories = Manager::table('category')
				->where('license', auth()->get('licenseId'))
				->get();
			
			return $this->view('catalog.edit-product', compact('detail', 'categories', 'brands', 'filters'));
		}
		
		/**
		 * @param Request $request
		 * @return string
		 */
		public function newProduct(Request $request): string
		{
			if (!auth()->get('login')) {
				redirect(siteUrl('auth/login'))->send();
			}
			

			if ($request->getMethod() == 'POST') {
				$this->validator->rule('required', [
					'product_name',
					'product_type',
					'product_fee',
					'product_stock_code',
					'product_stock_qty',
					'product_cargo_desi',
					'product_brand',
					'product_short_description',
					'product_long_description'
				]);
				if ($this->validator->validate() && xssToken()->isVerify()) {
					
					if (is_array(json_decode($_POST['product_images'], true))) {
						$image = json_encode(json_decode($_POST['product_images'], true));
					} else {
						$image = $_POST['product_images'];
					}
					
					$status = Manager::table('product')
						->insert([
							'name' => post('product_name'),
							'images' => $image,
							'license' => auth()->get('licenseId'),
							'type' => post('product_type'),
							'fee' => post('product_fee'),
                            'purchase_price' => post('purchase_price'),
                            'max_purchase' => post('max_purchase'),
							'sale_fee' => post('product_sale_fee'),
							'stock_barcode' => post('product_barcode'),
							'stock_code' => post('product_stock_code'),
							'stock_qty' => post('product_stock_qty'),
							'stock_desi' => post('product_cargo_desi'),
							'variants' => $_POST['variants_json'],
							'brand' => post('product_brand'),
							'tags' => json_encode($_POST['product_filters']),
							'supplier' => $_POST['product_supplier'],
							'category' => json_encode($_POST['product_categories']),
							'short_description' => post('product_short_description'),
							'long_description' => post('product_long_description'),
							'seo_extension' => (post('seo_extension') == '') ? slug(post('seo_title'))->generate() : slug(post('seo_extension'))->generate(),
							'seo_title' => post('seo_title'),
							'seo_keywords' => post('seo_keywords'),
							'seo_description' => post('seo_description')
						]);
					
					if ($status) {
						redirect(siteUrl('catalog/'))
							->with('Ürün Başarıyla Eklendi')
							->send();
					} else {
						redirect(siteUrl('catalog/'))
							->with('Ürün Eklenemedi')
							->send();
					}
				} else {
					redirect(siteUrl('catalog/'))
						->with('İzinsiz Erişim İstendi!')
						->send();
				}
			}
			
			$data['filters'] = Manager::table('filter')
				->where('license', auth()->get('licenseId'))
				->get();
			
			$data['brands'] = Manager::table('brand')
				->where('license', auth()->get('licenseId'))
				->get();
			
			$data['categories'] = Manager::table('category')
				->where('license', auth()->get('licenseId'))
				->get();
			
			return $this->view('catalog.new-product', $data);
		}
		
		/**
		 * @param Request $request
		 * @return string
		 */
		public function categories(Request $request): string
		{
			if (!auth()->get('login')) {
				redirect(siteUrl('auth/login'))->send();
			}
			
			$topCategories = Manager::table('category')
				->where('license', auth()->get('licenseId'))
				->orderBy('id', 'desc')
				->get();
			return $this->view('catalog.categories', compact('topCategories'));
		}
		
		/**
		 * @return string
		 */
		public function brands(): string
		{
			if (!auth()->get('login')) {
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('catalog.brands');
		}
		
		/**
		 * @return string
		 */
		public function filters(): string
		{
			if (!auth()->get('login')) {
				redirect(siteUrl('auth/login'))->send();
			}
			
			$categories = [];
			
			for ($i = 0; $i < 100; $i++) {
				$faker = Factory::create();
				$categories[] = [
					'id' => $i + 1,
					'name' => $faker->words(rand(1, 4), true),
					'status' => rand(1, 2)
				];
			}
			
			return $this->view('catalog.filters', [
				'categories' => $categories
			]);
		}
		
		/**
		 * TODO: this
		 * @return string
		 */
		public function tags(): string
		{
			if (!auth()->get('login')) {
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('catalog.tags');
		}
	}
	
	