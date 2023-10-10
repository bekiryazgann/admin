<?php
	
	namespace themes\admin\controller;
	use Core\Controller;
	use Illuminate\Database\Capsule\Manager;
	
	class middleware extends Controller
	{
		
		/**
		 * @return true
		 */
		public static function checkLogin(): bool
		{
			if (!auth()->get('login')) {
				redirect(siteUrl('auth/login'))->send();
			}
			return true;
		}
		
		/**
		 * @param string $auth
		 * @return false
		 */
		public static function checkAuth(string $auth = ''): void
		{
			self::checkLogin();
			$userData = Manager::table('user')
				->where('user_key', auth()->get('login'))
				->get()
				->all()[0]->permission;
			$userData = json_decode($userData, true);
			
			if(isset($userData[$auth]) && $userData[$auth] == '1'){
			
			} else {
				if (isset($_SERVER['HTTP_REFERER'])){
					redirect($_SERVER['HTTP_REFERER'])->send();
				}
				redirect(siteUrl())->send();
			}
		}
		
		/**
		 * @param string $auth
		 * @return bool
		 */
		public static function checkAuthBool(string $auth = ''): bool
		{
			self::checkLogin();
			$userData = Manager::table('user')
				->where('user_key', auth()->get('login'))
				->get()
				->all()[0]->permission;
			$userData = json_decode($userData, true);
			
			if(!isset($userData[$auth]) && !$userData[$auth] == '1'){
				return false;
			} else {
				return true;
			}
		}
	}