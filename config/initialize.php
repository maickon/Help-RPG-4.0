<?php
require "{$_SERVER['DOCUMENT_ROOT']}/config/db/db.php";
require "{$_SERVER['DOCUMENT_ROOT']}/config/labels/labels.php";
require "{$_SERVER['DOCUMENT_ROOT']}/config/url/url.php";

function __autoload($class_name){
	$divide_name = explode('_', $class_name);
	$module_name = strtolower($divide_name[0]);
	switch ($divide_name[1]) {
		case 'Controller':
			require "{$_SERVER['DOCUMENT_ROOT']}/app/controllers/{$module_name}/{$module_name}.class.php";
			break;

		case 'Model':
			require "{$_SERVER['DOCUMENT_ROOT']}/app/models/{$module_name}/{$module_name}.class.php";
			break;

		case 'Lib':
			require "{$_SERVER['DOCUMENT_ROOT']}/lib/{$module_name}/{$module_name}.class.php";
			break;
		case 'Helper':
			require "{$_SERVER['DOCUMENT_ROOT']}/app/helpers/{$module_name}/{$module_name}.class.php";
			break;
		
		default:
			echo 'Nao encontrada!';
			break;
	}
}