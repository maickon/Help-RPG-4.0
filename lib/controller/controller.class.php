<?php

class Controller_Lib{
	
	/*
		method get_pat()
		Cria URLs relativa a ao controlador e suas
		acoes.
	*/
	function get_path(){
		$path = '_path';
		$class_name = get_class($this);
		$paths = get_class_methods($class_name);
		unset($paths[0]);
		unset($paths[count($paths)]);
		foreach ($paths as $methods_names) {
			$new_path = $methods_names.$path;
			$controller_name = strtolower(explode('_', $class_name)[0]);
			$this->$new_path = URL_BASE . $controller_name . "/{$methods_names}/";
		}
	}
}