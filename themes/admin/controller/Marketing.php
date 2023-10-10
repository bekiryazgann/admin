<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use Faker\Factory;
	use Illuminate\Database\Capsule\Manager;
	use Symfony\Component\HttpFoundation\Response;
	
	class Marketing extends Controller
	{
		/**
		 * @return string
		 */
		public function coupons(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('marketing.coupons');
		}
		
		/**
		 * @return string
		 */
		public function campaigns(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('marketing.campaigns');
		}
		
		/**
		 * @return string
		 */
		public function newsletter(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			//return $this->view('marketing.newsletter');
			return $this->view('auth.comingSoon');
		}
		
		/**
		 * @return string
		 */
		public function comments(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('marketing.comments');
		}
		
		public function googleAds(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('auth.comingSoon');
		}
		
		public function metaAds(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('auth.comingSoon');
		}
	}