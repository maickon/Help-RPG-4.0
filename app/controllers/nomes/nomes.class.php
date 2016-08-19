<?php

class Nomes_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$tag = new Tags_Lib();
		require (new Render_Lib())->get_required_path();
	}

	function service(){
		// $params[0] -> caminho para nomes em txt, $params[1] -> quantidade a se exibida
		$name = new Nomes_Model(TXT_NAMES."/{$_POST['select']}.txt");
		require (new Render_Lib('service/index'))->get_required_path();
	}

	function lugares(){
		$rota = $this;
		$tag = new Tags_Lib();
		require (new Render_Lib('lugares'))->get_required_path();
	}

	function classes(){
		$rota = $this;
		$tag = new Tags_Lib();
		require (new Render_Lib('classes'))->get_required_path();
	}

	function racas(){
		$rota = $this;
		$tag = new Tags_Lib();
		require (new Render_Lib('racas'))->get_required_path();
	}

	function culturais(){
		$rota = $this;
		$tag = new Tags_Lib();
		require (new Render_Lib('culturais'))->get_required_path();
	}

	function outros(){
		$rota = $this;
		$tag = new Tags_Lib();
		require (new Render_Lib('outros'))->get_required_path();
	}
}