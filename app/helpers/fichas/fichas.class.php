<?php

class Fichas_Helper{

	private $tag, $form;

	function __construct(){
		$this->tag = new Tags_Lib;
		$this->form = new Form_Lib;
	}
	
	function label_sheet($label, $name){
		$this->tag->label();
			$this->tag->printer($label);
		$this->tag->label;
		$this->tag->span('id="'.$name.'"');
		$this->tag->span;
	}
}