<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	
	class Home extends Controller
	{
		/**
		 * @return string
		 */
		public function main(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}

			$lastOrders = [
				[
					'image' => 'https://randomuser.me/api/portraits/women/50.jpg',
					'total' => '50',
					'name' => 'Melike Yıldırım'
				]
			];
			return $this->view('main.home', [
				'lastOrders' => $lastOrders,
				'totalSale' => '13',
				'totalCustomer' => '79.263',
				'totalProduct' => '2.872k',
				'totalRevenue' => '152.61'
			]);
		}
		
		/**
		 * @return string
		 */
		public function statistic(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('main.statistic');
		}
		
		public function Test(): string
		{
			middleware::checkAuth('statistics');
			
			
			return "<h1> Merhabalar  </h1>";
		}
	}