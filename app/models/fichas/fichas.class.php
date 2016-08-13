<?php
require 'load_fichas.php';

class Fichas_Model{

	/*
		@method select_sheet
		retorna uma instancia de uma classe de ficha
	*/
	function select_sheet($type){
		$sheets = $this->rpg_list();
		if (array_key_exists($type, $sheets)) {
			return new $sheets[$type]();
		} else {
			(new Errors_Lib())->show("O índice {$type} não existe.");
		}
	}

	function rpg_list(){
		$sheets = [
			'ded_monstros' => 'Monstros',
			'ded_npc' => 'Personagem'
		];

		return $sheets;
	}
}