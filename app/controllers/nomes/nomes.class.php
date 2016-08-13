<?php

class Nomes_Controller{

	function index(){
		$tag = new Tags_Lib();
		require (new Render_Lib())->get_required_path();
	}

	function service(){
		// $params[0] -> caminho para nomes em txt, $params[1] -> quantidade a se exibida
		$name = new Nomes_Model(TXT_NAMES."/{$_POST['select']}.txt");
		require (new Render_Lib('service/index'))->get_required_path();
	}

	function lugares(){
		$tag = new Tags_Lib();
		require (new Render_Lib('lugares'))->get_required_path();
	}

	function classes(){
		$tag = new Tags_Lib();
		require (new Render_Lib('classes'))->get_required_path();
	}

	function racas(){
		$tag = new Tags_Lib();
		require (new Render_Lib('racas'))->get_required_path();
	}

	function culturais(){
		$tag = new Tags_Lib();
		require (new Render_Lib('culturais'))->get_required_path();
	}

	function outros(){
		$tag = new Tags_Lib();
		require (new Render_Lib('outros'))->get_required_path();
	}
}