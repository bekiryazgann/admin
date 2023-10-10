<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use Faker\Factory;
	
	class Orders extends Controller
	{
		/**
		 * @return string
		 */
		public function main(): string
		{

			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('orders.orders');
		}
		
		/**
		 * @param $id
		 * @return string
		 */
		public function details($id):string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('orders.details', [
				'id' => $id
			]);
		}
		
		/**
		 * @return string
		 */
		public function payments(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('orders.payments');
		}
		
		/**
		 * @return string
		 */
		public function bills(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('orders.bills');
		}
		
		/**
		 * @return string
		 */
		public function cancellation(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('orders.cancellation');
		}
	}