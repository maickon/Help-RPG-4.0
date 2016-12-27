<?php
require 'helpgenerate/controlcreator.php';
require 'helpgenerate/modelcreator.php';
require 'helpgenerate/viewcreator.php';
require 'path_config.php';


$name = $_REQUEST['modulo'];
$db = isset($_REQUEST['db']) ? true : false;
$atributos = explode(',', $_REQUEST['atributos']);
unset($_REQUEST['modulo']);
unset($_REQUEST['botao']);
unset($_REQUEST['db']);
unset($_REQUEST['atributos']);
$check = 1;

if (empty($name)) {
	header('Location: '. URL_BASE . 'core?status=2');
} else {
	foreach ($_REQUEST as $key => $value) {
		$class = ucfirst($key).'Creator';
		if(new $class(URL_BASE_INTERNAL, $name, $atributos, $db)){
			$status = 1;
		} else {
			$status = 0;
		}
	}
}

if ($status == false) {
	header('Location: '. URL_BASE . 'core?status=0');
} else{
	header('Location: '. URL_BASE . 'core?status=1');
}