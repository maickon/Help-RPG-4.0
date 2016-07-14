<?php
require "{$_SERVER['DOCUMENT_ROOT']}/config/db/db.php";
require "{$_SERVER['DOCUMENT_ROOT']}/config/labels/labels.php";
require "{$_SERVER['DOCUMENT_ROOT']}/config/url/url.php";

function __autoload($class_name){
	$divide_name = explode('_', $class_name);
	$module_name = strtolower($divide_name[0]);
	
	$controllers_path =	"{$_SERVER['DOCUMENT_ROOT']}/app/controllers/";
	$model_path = "{$_SERVER['DOCUMENT_ROOT']}/app/models/";
	$lib_path =	"{$_SERVER['DOCUMENT_ROOT']}/lib/";
	$helper_path =	"{$_SERVER['DOCUMENT_ROOT']}/app/helpers/";

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