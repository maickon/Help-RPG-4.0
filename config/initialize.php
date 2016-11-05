<?php
require "url/url.php";

session_start();
if (empty($_SESSION['lingua'])) {
	$_SESSION['lingua'] = 'pt-BR';
}

define('URL_BASE_INTERNAL_DB', URL_BASE_INTERNAL . 'config/db/db.php');
define('URL_BASE_INTERNAL_MAIL', URL_BASE_INTERNAL . 'config/mail/mail.php');
define('URL_BASE_INTERNAL_LABELS', URL_BASE_INTERNAL . 'config/labels/'.$_SESSION['lingua'].'/labels.php');
define('URL_BASE_INTERNAL_CONTROLLER', URL_BASE_INTERNAL . '/app/controllers/');
define('URL_BASE_INTERNAL_MODEL', URL_BASE_INTERNAL . '/app/models/');
define('URL_BASE_INTERNAL_LIB', URL_BASE_INTERNAL . '/lib/');
define('URL_BASE_INTERNAL_HELPER', URL_BASE_INTERNAL . '/app/helpers/');

require URL_BASE_INTERNAL_DB;
require URL_BASE_INTERNAL_MAIL;

function __autoload($class_name){
	$divide_name = explode('_', $class_name);
	$module_name = strtolower($divide_name[0]);
	
	$controllers_path =	URL_BASE_INTERNAL_CONTROLLER;
	$model_path = URL_BASE_INTERNAL_MODEL;
	$lib_path =	URL_BASE_INTERNAL_LIB;
	$helper_path =	URL_BASE_INTERNAL_HELPER;

	switch ($divide_name[1]) {
		case 'Controller':
			if (file_exists("{$controllers_path}{$module_name}/{$module_name}.class.php")) {
				require "{$controllers_path}{$module_name}/{$module_name}.class.php";
			}
			break;

		case 'Model':
			if (file_exists("{$model_path}{$module_name}/{$module_name}.class.php")) {
				require "{$model_path}{$module_name}/{$module_name}.class.php";
			}
			break;

		case 'Lib':
			if (file_exists("{$lib_path}{$module_name}/{$module_name}.class.php")) {
				require "{$lib_path}{$module_name}/{$module_name}.class.php";
			}
			break;
		case 'Helper':
			if (file_exists("{$helper_path}{$module_name}/{$module_name}.class.php")) {
				require "{$helper_path}{$module_name}/{$module_name}.class.php";
			}
			break;
		
		default:
			echo 'Nao encontrada!';
			break;
	}
}