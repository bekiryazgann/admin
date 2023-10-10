<?php

	namespace Core;


	class Csrf
	{

        public string $key;

		public function __construct()
		{
			if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
				$key = md5(rand(0, 9999));
				$key = hash('sha512', $key) . hash('sha512', $key).hash('sha512', $key) . hash('sha512', $key).hash('sha512', $key) . hash('sha512', $key);
                $this->key = $key;
				auth()->set('_token', $key);
			}
		}

		/**
		 * Get Token Value
		 *
		 * @return string
         */
		public function getToken(): string
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                return auth()->get('_token');
            } else {
                return $this->key ?? '';
            }
		}

		/**
		 * Token Check, match or not
		 *
		 * @return bool
		 */
		public function isVerify(): bool
		{
			if ($_POST['_token'] == $this->getToken()) {
				return true;
			}
			return false;
		}
	}
