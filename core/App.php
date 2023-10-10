<?php
	
	
	namespace Core;
	
	use Arrilot\DotEnv\DotEnv;
	use Aura\Session\Exception;
	use Ausi\SlugGenerator\SlugGenerator;
	use Buki\Router\Router;
	use Carbon\Carbon;
	use Illuminate\Database\Capsule\Manager as Capsule;
	use Valitron\Validator;
	
	class App{
		public View $view;
		public Carbon $carbon;
		public Validator $validator;
		public Slug $logger;
		
		public function __construct()
		{
			$capsule = new Capsule();
			$capsule->addConnection([
				'driver' => 'mysql',
				'host' => sysConfig('DB_HOST'),
				'database' => sysConfig('DB_NAME'),
				'username' => sysConfig('DB_USERNAME'),
				'password' => sysConfig('DB_PASSWORD'),
				'charset' => 'utf8mb4',
				'collation' => 'utf8mb4_unicode_ci',
				'prefix' => '',
			]);
			$capsule->setAsGlobal();
			
			// Form Validation
			$this->validator = new Validator($_POST);
			Validator::langDir(dirname(__DIR__) . '/lang/validator/');
			Validator::lang('tr');
			
			// Start View
			$this->view = new View($this->validator, $this->env('THEME', 'admin'));
			
			Carbon::setLocale(sysConfig('LOCALE', 'en'));
			
		}
		
		/**
		 * @param string $key
		 * @param mixed|null $default
		 * @return mixed
		 */
		public function env(string $key, mixed $default = null): mixed
		{
			DotEnv::load(dirname(__DIR__) . '/.env.php');
			return DotEnv::get($key, $default);
		}
	}