<?php

/*
	@file index.php
	@description disponibiliza a instancia dos modelos, controladores e bibiotecas separadas
	@author Maickon Rangel
	@copyright Help RPG - 2016
*/

// ############################# Controllers Class #############################
require_once "{$_SERVER['DOCUMENT_ROOT']}/config/initialize.php";

$controllers_dir = scandir("{$_SERVER['DOCUMENT_ROOT']}/app/controllers");
$controllers_instance;

for ($i=0; $i < count($controllers_dir); $i++) { 
	if ($i != 0 and $i != 1) {
		$class_part_name = ucfirst($controllers_dir[$i]);
		$class_full_name = "{$class_part_name}_Controller";
		$object = new $class_full_name;
		$controllers_instance[$controllers_dir[$i]] = $object;
	}
}	

// ############################# Models Class #############################
$models_dir = scandir("{$_SERVER['DOCUMENT_ROOT']}/app/models");
$models_instance;

for ($i=0; $i < count($models_dir); $i++) { 
	if ($i != 0 and $i != 1) {
		$class_part_name = ucfirst($models_dir[$i]);
		$class_full_name = "{$class_part_name}_Model";
		if ($class_full_name != 'Dbpersistence_Model') {
			$object = new $class_full_name;
			$models_instance[$models_dir[$i]] = $object;	
		}
	}
}	

// ############################# Libs Class #############################
$lib_dir = scandir("{$_SERVER['DOCUMENT_ROOT']}/lib");
$lib_instance;

foreach ($lib_dir as $key => $value) {
	if (strstr ($value, '_')) {
		unset($lib_dir[$key]);
	}
}

$lib_dir = array_values($lib_dir);

for ($i=0; $i < count($lib_dir); $i++) { 
	if ($i != 0 and $i != 1) {
		$class_part_name = ucfirst($lib_dir[$i]);
		$class_full_name = "{$class_part_name}_Lib";
		$object = new $class_full_name;
		$lib_instance[$lib_dir[$i]] = $object;
		
	}
}	

// ############################# Helpers Class #############################
$helper_dir = scandir("{$_SERVER['DOCUMENT_ROOT']}/app/helpers");
$helper_instance;

foreach ($helper_dir as $key => $value) {
	if (strstr ($value, '_')) {
		unset($helper_dir[$key]);
	}
}

$helper_dir = array_values($helper_dir);

for ($i=0; $i < count($helper_dir); $i++) { 
	if ($i != 0 and $i != 1) {
		$class_part_name = ucfirst($helper_dir[$i]);
		$class_full_name = "{$class_part_name}_Helper";
		$object = new $class_full_name;
		$helper_instance[$helper_dir[$i]] = $object;
		
	}
}	