<?php

class Mundos_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		require (new Render_Lib())->get_required_path();
	}

	function service(){
		// $params[0] -> caminho para nomes em txt, $params[1] -> quantidade a se exibida
		$name = new Nomes_Model(TXT_NAMES."/{$_POST['select']}.txt");
		require (new Render_Lib('service/index'))->get_required_path();
	}
}