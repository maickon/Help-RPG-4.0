<?php

class Fichas_Controller{
	
	function index(){
		$ficha = new Fichas_Model;
		$tag = new Tags_Lib;
		require "{$_SERVER['DOCUMENT_ROOT']}/app/view/fichas/index.php";
	}

	function select_sheet($system_rpg){
		$url = "fichas/partials/fichas/{$system_rpg}";

	}

	function page_not_found(){
		echo 'page_not_found';
	}
}