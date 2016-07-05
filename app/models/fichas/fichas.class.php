<?php

require 'load_fichas.php';

class Fichas_Model{

	function select_sheet($type){
		$ficha = null;
		switch ($type) {
			case 'monstro_ded':
				$ficha = new Monstros;	
			break;
			
			case 'npc_ded':
				$ficha = new Personagem;	
			break;

			default:
				echo 'Ficha nao encontrada!';
			break;
		} 
		return $ficha;
	}
}