<?php
class GeradorAventuras_Model extends Model_Lib{
	
	function __construct(){
		parent::__construct();
		$this->define_path(CONFIG_TXT_PATH.'aventuras/');
	}

	function sortear_nome_arquivo($path = '', $number = 1){
		$file = new Raffleitemfile_Lib($path, $number);
		return $file->getRaffleItens();
	}
}