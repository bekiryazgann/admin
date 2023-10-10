<?php
	
	namespace Core;
	
	use AllowDynamicProperties;
    use Arrilot\DotEnv\DotEnv;
	use Buki\Router\Router;
	
	#[AllowDynamicProperties] class Theme
	{
		public $dir;
		
		public $mainDir;
		
		public $themeName;
		
		public function __construct($themeName)
		{
			$this->themeName = $themeName;
			$this->mainDir = dirname(__DIR__);
			$this->dir = $this->mainDir . '/themes/' . $this->themeName;    // Tema Ana Klasör
			DotEnv::load($this->dir . '/.env.php');                 // Tema env Dosyası
			$this->router = new Router([
				"paths" => [
					'controllers' => 'themes/' . $this->themeName . '/controller/'
				],
				"namespaces" => [
					"controllers" => 'themes\\' . $this->themeName . '\controller'
				]
			]);
			$this->routes();
		}
		
		public function routes()
		{
			$routers = $this->getEnv('routers');
			foreach ($routers as $path => $fnName)
			{
				$this->router->any($path, $fnName);
			}
			$this->router->run();
		}
		
		/**
		 * @param $key
		 * @param $default
		 * @return mixed
		 */
		public function getEnv($key, $default = null): mixed
		{
			return DotEnv::get($key, $default);
		}
	}