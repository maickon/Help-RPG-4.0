<?php

class Fichas_Controller{

	function index(){
		$ficha = new Fichas_Model;
		$tag = new Tags_Lib;
		// load the fichas view
		require (new Render_Lib($ficha))->get_required_path();
	}

	function select_sheet(){
		$ficha = new Fichas_Model;
		$helper = new Fichas_Helper;
		$tag = new Tags_Lib;
		require (new Render_Lib("partials/fichas"))->get_required_path();
	}

	function service($system_rpg){
		$ficha = new Fichas_Model;
		$helper = new Fichas_Helper;
		$tag = new Tags_Lib;
		require (new Render_Lib('fichas/service'))->get_required_path();
	}


	function error($parameters){
		(new Errors_Lib())->show($parameters);
	}
}