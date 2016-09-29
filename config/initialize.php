<?php
$url_base = URL_BASE_INTERNAL;

require "url/url.php";
require $url_base . "config/db/db.php";
require $url_base . "config/labels/pt-br/labels.php";


function __autoload($class_name){
	$divide_name = explode('_', $class_name);
	$module_name = strtolower($divide_name[0]);
	
	$controllers_path =	$url_base . "/app/controllers/";
	$model_path = $url_base . "/app/models/";
	$lib_path =	$url_base . "/lib/";
	$helper_path =	$url_base . "/app/helpers/";

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