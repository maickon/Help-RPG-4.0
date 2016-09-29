<?php
require "url/url.php";

$url_base = URL_BASE_INTERNAL;

require URL_BASE_INTERNAL . "config/db/db.php";
require URL_BASE_INTERNAL . "config/labels/pt-br/labels.php";


function __autoload($class_name){
	$divide_name = explode('_', $class_name);
	$module_name = strtolower($divide_name[0]);
	
	$controllers_path =	URL_BASE_INTERNAL . "/app/controllers/";
	$model_path = URL_BASE_INTERNAL . "/app/models/";
	$lib_path =	URL_BASE_INTERNAL . "/lib/";
	$helper_path =	URL_BASE_INTERNAL . "/app/helpers/";

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