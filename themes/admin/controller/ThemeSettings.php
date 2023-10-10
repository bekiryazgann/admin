<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	class ThemeSettings extends Controller
	{
		/**
		 * @return string
		 */
		public function main(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			return $this->view('themeSettings.themeSettings');
		}
		
		/**
		 * @return string
		 */
		public function generalSettings():string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('themeSettings.generalSettings');
		}
		
		/**
		 * @return string
		 */
		public function paintSettings():string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('themeSettings.paintSettings');
		}
		
		/**
		 * @return string
		 */
		public function contentSettings():string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('themeSettings.contentSettings');
		}
		
		/**
		 * @return string
		 */
		public function sliderSettings():string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('themeSettings.sliderSettings');
		}
		
		/**
		 * @return string
		 */
		public function bannerSettings():string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('themeSettings.bannerSettings');
		}
		
		/**
		 * @return string
		 */
		public function footerSettings():string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('themeSettings.footerSettings');
		}
	}