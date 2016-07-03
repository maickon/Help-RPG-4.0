<?php
/*
	Class Routes_Lib
	Realiza a requisiçao de paginas analizando
	a URL passado pelo navegador.
	@author Maickon Rangel
	@copyright help RPG - 2016
*/

class Routes_Lib{

	function __construct(){
		$this->router();
	}

	function router(){
		$url = (isset($_GET['url'])) ? $_GET['url'] : '';
		$url =  array_filter(explode('/', $url));
		$file_path;
		$string_file_path = '';

		if (count($url) > 1) {
			foreach ($url as $key => $value) {
				if (is_numeric($value)) {
					$_GET['id'] = $value;
				} else {
					if ($key == (count($url) - 1)) {
						$file_path[] = "{$value}.php";
					} else {
						$file_path[] = "{$value}/";
					}
				}
			}	

			// troca a barra '/' no final pela extencao .php
			if (isset($_GET['id'])) {
				$file_path[count($file_path) - 1] = str_replace('/', '.php', end($file_path));
			}

			// percorre o array e monta uma string URL
			foreach ($file_path as $key => $value) {
				$string_file_path .= $value;
			}

			$url = $string_file_path;

			if (file_exists("{$_SERVER['DOCUMENT_ROOT']}/app/view/{$url}")) {
				require_once "{$_SERVER['DOCUMENT_ROOT']}/app/view/{$url}";
			} else {
				echo "{$_SERVER['DOCUMENT_ROOT']}/app/view/{$url}";
				// require "{$_SERVER['DOCUMENT_ROOT']}/teste.php";
			}
		} elseif (isset($url[0])) {
			if (file_exists("{$_SERVER['DOCUMENT_ROOT']}/app/view/{$url[0]}/index.php")) {
				require_once "{$_SERVER['DOCUMENT_ROOT']}/app/view/{$url[0]}/index.php";
			} else {
				// require "{$_SERVER['DOCUMENT_ROOT']}/teste.php";
			}
		} else {
			require_once "{$_SERVER['DOCUMENT_ROOT']}/app/view/home/index.php";
		}
	
	}
}