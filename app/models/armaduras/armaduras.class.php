<?php
class Armaduras_Model extends DbPersistence_Model{
	private $attr;
	
	function __construct($path = '', $warning_msg = 'Já existe uma armadura com este nome!'){
		parent::__construct(strtolower(substr(get_class($this), -5)), $path, $warning_msg);
	}
	
	function __set($attr_name, $attr_value){
	
		$this->attr["{$attr_name}"] = $attr_value;
	}
	
	function __get($attr){
		return $this->attr["{$attr}"];
	}
	
	function getTable(){
		return $this->table;
	}
}