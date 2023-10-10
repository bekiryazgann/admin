<?php
	
	namespace Core;
	
	
	class Auth
	{
		private static Auth $instance;
		
		/**
		 * @return Auth
		 */
		public static function getInstance(): Auth
		{
			if (!isset(self::$instance)) {
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		public function __construct(){}
		
		/**
		 * @param $key
		 *
		 * @return string|false
		 */
		public function get($key): string|false
		{
			if (isset($_COOKIE[$key])) {
				return crypto()->decode($_COOKIE[$key]);
			}
			return false;
		}
		
		/**
		 * @param $key
		 * @param $val
		 * @return null
		 */
		public function set($key, $val): null
        {
			setcookie($key, crypto()->encode((string)$val), array(
				'samesite' => 'Strict',
				'expires' => time() + (86400 * 365000),
				'path' => "/",
			));
			return null;
		}
		
		/**
		 * @return void
		 */
		public function clear(): void
		{
			foreach ($_COOKIE as $key => $val) {
				setcookie($key, '', time() - 36000000, '/');
			}
		}
	}
