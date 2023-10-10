<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use Faker\Factory;
	
	class B2b extends Controller
	{
		/**
		 * @return string
		 */
		public function main(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			//return $this->view('b2b.orders');
			return $this->view('auth.comingSoon');
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
			
			//return $this->view('b2b.details', [
			//	'id' => $id
			//]);
			
			return $this->view('auth.comingSoon');
		}
		
		/**
		 * @return string
		 */
		public function payments(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			//return $this->view('b2b.payments');
			return $this->view('auth.comingSoon');
		}
		
		/**
		 * @return string
		 */
		public function bills(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			//return $this->view('b2b.bills');
			return $this->view('auth.comingSoon');
		}
		
		/**
		 * @return string
		 */
		public function cancellation(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			//return $this->view('b2b.cancellation');
			return $this->view('auth.comingSoon');
		}
		
		/**
		 * @return string
		 */
		public function reminder(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			//return $this->view('b2b.reminder');
			return $this->view('auth.comingSoon');
		}
	}