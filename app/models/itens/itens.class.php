<?php

class Itens_Model extends Model_Lib{
	
	private $names;

	function __construct(){
		parent::__construct();
		$this->define_path(CONFIG_TXT_PATH.'itens/comuns/');
	}
}