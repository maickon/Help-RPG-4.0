<?php

class Utilitarios_Model extends Model_Lib{
	
	private $names;

	function __construct(){
		parent::__construct();
	}

	function register($utilitario){
		$handle = fopen(URL_BASE_INTERNAL.'config/txt/pt-BR/utilitarios/'.$utilitario.'.txt','r');
		$attr = array();
		while ($file = fgets($handle)) {
			$line = explode('**', $file);
			$attr[$line[0]] = $line[1]; 
		}
		return $attr;
	}

	function helprpg(){
		$aventuras = $this->register('aventuras');
		$dados = $this->register('dados');
		$fichas = $this->register('fichas');
		$nomes = $this->register('nomes');
		$tavernas = $this->register('tavernas');	
		$mundos = $this->register('mundos');	
		$masmorras = $this->register('masmorras');	
		$personalidades = $this->register('personalidades');	
		$cidades = $this->register('cidades');	
		$marcadores = $this->register('marcadores');	
		$itens = $this->register('itens');	
		$sorte = $this->register('sorte');	
		$espadas = $this->register('espadas');	
		return [$aventuras, $dados, $fichas, $nomes, $tavernas, $mundos, $masmorras, $personalidades, $cidades, $marcadores, $itens, $sorte, $espadas];
	}

	function npc_gerador(){
		$myth_weavers_npc = $this->register('myth-weavers-npc');
		$RPGTinker_npc_5e = $this->register('RPGTinker-npc-5e');
		return [$myth_weavers_npc, $RPGTinker_npc_5e];
	}

	function masmorras(){
		$myth_weavers_dungeon = $this->register('myth-weavers-dungeon');
		return [$myth_weavers_dungeon];
	}
}