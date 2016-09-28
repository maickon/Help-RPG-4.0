<?php

class Usuario_Model extends HelperRecord_Lib{

	public $url;
	
	function __construct(){
		parent::__construct();	
		$this->url = new Model_Lib();
	}
}