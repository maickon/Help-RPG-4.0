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
	
		if (isset($url)) {
			$url =  array_filter(explode('/', $url));
			// define o nome da classe
			$class = ucfirst("{$url[0]}_Controller");
			$action = 'error';
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
					} else {
						$parameters[] = "Action {$url[1]} não encontrada.";	
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
					if (method_exists($object, $action)) {
						$object->$action($parameters[0]);
					} elseif ((count($parameters) > 1)) {
						$object->$action($parameters);
					} else {
						$parameters[] = "Action {$action} não encontrada.";
						$action = 'error';
						$object->$action($parameters);	
					}
				} else {
					$object->$action($parameters);	
				}
			} else {
				(new Errors_Lib())->show("Classe {$class} não existe.");
			}
		} else {
			$home = new Home_Controller;
			$home->index();
		}
	}
}