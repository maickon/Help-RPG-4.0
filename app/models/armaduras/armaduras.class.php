<?php
class Armaduras_Model extends HelperRecord_Lib{
	
	function __construct(){
		parent::__construct();
		$this->set_attr_class($this, 'armaduras');	
	}
}