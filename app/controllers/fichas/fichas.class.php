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
		echo json_encode((new Fichas_Model)->select_sheet($system_rpg));
	}

	function npc(){
		$tag = new Tags_Lib;
		$personagem = (new Fichas_Model)->select_sheet('npc_ded');
		require (new Render_Lib())->get_required_path();
	}

	function monstros(){
		$tag = new Tags_Lib;
		$personagem = (new Fichas_Model)->select_sheet('monstro_ded');
		require (new Render_Lib())->get_required_path();
	}

	function error($parameters){
		(new Errors_Lib())->show($parameters);
	}
}