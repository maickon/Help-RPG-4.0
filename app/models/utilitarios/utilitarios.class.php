<?php

class Utilitarios_Model extends Model_Lib{
	
	private $names;

	function __construct(){
		parent::__construct();
	}

	function utilitarios($dir){
		@session_start();
		$language = 'pt-BR';
		if (isset($_SESSION['lenguage'])) {
			$language = $_SESSION['lenguage'];
		}
		$utilitarios = scandir(URL_BASE_INTERNAL.'config/txt/'.$language.'/utilitarios/'.$dir);
		unset($utilitarios[0]);
		unset($utilitarios[1]);
		$attr_dir = str_replace('-', '_', $dir);
		$descricao = [];
		$this->$attr_dir = [];

		foreach ($utilitarios as $key => $value) {
			$attr = substr(str_replace('-', '_', $value), 0, -4);
			$handle = fopen(URL_BASE_INTERNAL.'config/txt/'.$language.'/utilitarios/'.$dir.'/'.$value, 'r');
			while ($file = fgets($handle)) {
				$line = explode('::', $file);
				$descricao[$line[0]] = $line[1]; 
			}
			$utilitario[$attr] = $descricao;
			$this->$attr_dir = (object)$utilitario;
		}
	}
}