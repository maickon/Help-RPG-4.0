<?php

class DbPersistence_Controller{
	
	private $modules;

	function __construct(){
		$this->modules['arma'] = $this->get_arma_instance();
	}

	function get_arma_instance(){
		return new Armas_Model;
	}
}