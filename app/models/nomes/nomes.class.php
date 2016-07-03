<?php

class Nomes_Model extends Raffleitemfile_Lib{
	
	private $names;

	function __construct($path = '', $number = 9){
		parent::__construct($path, $number);
		$this->names = $this->name_generation();
	}

	function name_generation(){
		return $this->getRaffleItens();
	}

	function getNames(){
		return $this->names;
	}
}