<?php
	
	ob_start();
	
	session_start();
	
	// using
	use \Core\{App, Theme};
	
	// Require Composer Packages and Eko Core
	require __DIR__ . '/vendor/autoload.php';
	
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	
	foreach (glob('themes/*/controller/*') as $t) {require $t;}
	
	// Set Default Timezone
	date_default_timezone_set(sysConfig('TIMEZONE'));
	
	// Run All Apps
	$app = new App();
	
	$theme = new Theme($app->env('THEME', 'admin'));
