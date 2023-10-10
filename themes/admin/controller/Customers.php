<?php
	
	namespace themes\admin\controller;
	
	use Core\Controller;
	use Faker\Factory;
	
	class Customers extends Controller
	{
		/**
		 * @return string
		 */
		public function customers(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('customers.customers');
		}
		
		/**
		 * @return string
		 */
		public function b2bCustomers(): string
		{
			if (!auth()->get('login')){
				redirect(siteUrl('auth/login'))->send();
			}
			
			return $this->view('customers.b2bCustomers');
		}
	}