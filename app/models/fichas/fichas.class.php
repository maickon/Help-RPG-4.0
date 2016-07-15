<?php
require 'load_fichas.php';

class Fichas_Model{

	/*
		@method select_sheet
		retorna uma instancia de uma classe de ficha
	*/
	function select_sheet($type){
		require 'config.php';
		if (array_key_exists($type, $instances_of_sheet)) {
			return new $instances_of_sheet[$type]();
		} else {
			(new Errors_Lib())->show("O índice {$type} não existe.");
		}
	}
}