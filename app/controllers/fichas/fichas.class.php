<?php

class Fichas_Controller{

	function index(){
		$ficha = new Fichas_Model;
		$tag = new Tags_Lib;
		$home_helper = new Home_Helper();
		// load the fichas view
		require (new Render_Lib('fichas/index'))->get_required_path();
	}

	/*
		@method select_sheet
		Vai renderizar uma ficha pre formatada
		de acordo com o sistema de RPG selecionado
	*/
	function select_sheet($sheet){
		$ficha = new Fichas_Model;
		$helper = new Fichas_Helper;
		$tag = new Tags_Lib;
		require (new Render_Lib("partials/fichas_monstros/{$sheet}"))->get_required_path();
	}

	function service($system_rpg){
		echo json_encode((new Fichas_Model)->select_sheet($system_rpg));
	}

	function get_ficha($system_rpg){
		echo '<pre>';
		print_r((new Fichas_Model)->select_sheet($system_rpg));
	}

	function npc(){
		$ficha = new Fichas_Model;
		$home_helper = new Home_Helper();
		$tag = new Tags_Lib;
		$personagem = (new Fichas_Model)->select_sheet('ded_npc');
		require (new Render_Lib())->get_required_path();
	}

	function monstros(){
		$ficha = new Fichas_Model;
		$home_helper = new Home_Helper();
		$tag = new Tags_Lib;
		$personagem = (new Fichas_Model)->select_sheet('ded_monstros');
		require (new Render_Lib())->get_required_path();
	}

	function error($parameters){
		(new Errors_Lib())->show($parameters);
	}
}