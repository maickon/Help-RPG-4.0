<?php
class Personalidades_Model extends Model_Lib{
	
	function __construct(){
		parent::__construct();
		$this->define_path(CONFIG_TXT_PATH.'personalidades/');
	}

	function aspecto_negativo(){
		return (new Raffleitemfile_Lib($this->aspectos_negativos_path, 1, 'FILE'))->getRaffleItens();
	}

	function aspecto_positivo(){
		return (new Raffleitemfile_Lib($this->aspectos_positivos_path, 1, 'FILE'))->getRaffleItens();
	}

	function aspecto_geral(){
		return (new Raffleitemfile_Lib($this->caracteristicas_gerais_path, 1, 'FILE'))->getRaffleItens();
	}

	function aspecto_ideologia(){
		return (new Raffleitemfile_Lib($this->ideologias_path, 1, 'FILE'))->getRaffleItens();
	}

	function aspecto_medo(){
		return (new Raffleitemfile_Lib($this->medos_path, 1, 'FILE'))->getRaffleItens();
	}

	function aspecto_tendencia(){
		return (new Raffleitemfile_Lib($this->tendencia_path, 1, 'FILE'))->getRaffleItens();
	}
}