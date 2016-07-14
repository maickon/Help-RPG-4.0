<?php
/*
	Class Routes_Lib
	Filtra a URL para o controlador decidir o que fazer
	@author Maickon Rangel
	@copyright help RPG - 2016
*/

// torna todoas as instancias possiveis
require_once "{$_SERVER['DOCUMENT_ROOT']}/config/initialize.php";

class Routes_Lib{

	function __construct(){
		$this->router();
	}

	function router(){
		$url = (isset($_GET['url'])) ? $_GET['url'] : '';
		$url =  array_filter(explode('/', $url));

		// define o nome da classe
		$class = ucfirst("{$url[0]}_Controller");
		$action = 'page_not_found';
		$parameters = array();
		// verifica se a classe existe
		if (class_exists("{$class}")) {
			$object = new $class;
			// indice 1 e metodo, verifica-se a posicao 1 nao esta vazia
			// e se tem exatamente dois elementos em $url
			if (isset($url[1]) && count($url) == 2) {
				if (method_exists($object, $url[1])) {
					// se nao vaiza, define a acao
					$action = "{$url[1]}";	
				}
			} elseif (count($url) > 2) {
				foreach ($url as $key => $value) {
					if (($key != 1) && ($key != 0)) {
						$parameters[$key] = $value;
					}
				}
				$parameters = array_values($parameters);
				$action = "{$url[1]}";
			} elseif (method_exists($object, 'index')) {
				$action = 'index';
			} 
			// chama o metodo definito em action
			if (empty($parameters)) {
				$object->$action();
			} elseif (count($parameters) == 1) {
				$object->$action($parameters[0]);
			} else {
				$object->$action($parameters);	
			}
		} else {
			$action = 'page_not_found';
			// chama o metodo definito em action
			$object->$action();
		}
	}
}