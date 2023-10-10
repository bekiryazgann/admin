<?php
	
	$lang = explode('-', $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];
	
	if(isset($_COOKIE['lang'])){
		$lang = $_COOKIE['lang'];
	}
	
	return [
		// Database
		"DB_HOST" => "185.106.210.162",
		"DB_NAME" => "socoreap_api",
		"DB_USERNAME" => "socoreap_root",
		"DB_PASSWORD" => "b3effa6d47766864298f3bb58856abd2",
		
		// SMTP
		"smtp_email" => "noreply@socore.app",
		"smtp_pass" => "Kahvetelvesi-0022",
		"smtp_port" => 465,
		"smtp_host" => 'socore.app',
		
		// Other
		"THEME" => "admin",
		"DEVELOPMENT" => true,
		"BASE_URL" => '//' . $_SERVER['HTTP_HOST'],
		"LOCALE" => $lang,
		"TIMEZONE" => 'Europe/Istanbul',
		"SYS_DESCRIPTION" => "açıklama",
		"SYS_KEYWORDS" => "anahtar kelimeler",
		"SYS_AUTHOR" => "Ebubekir Yazgan",
		"SYS_TITLE_PREFIX" => "Socore Dijital Sistemler",
	];
	
