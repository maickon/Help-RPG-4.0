<?php

class Nomes_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$language = new Locale_Lib();
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		$name = new Nomes_Model;
		require (new Render_Lib())->get_required_path();
	}

	function service($params){
		$name = new Nomes_Model;
		$attr = "{$params[0]}_path";
		$nome = (new Raffleitemfile_Lib("{$name->$attr}", $params[1]))->getRaffleItens();
		echo json_encode($nome);
		// require (new Render_Lib('service/index'))->get_required_path();
	}

	function lugares(){
		$rota = $this;
		$language = new Locale_Lib();
		$name = new Nomes_Model;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		require (new Render_Lib('lugares'))->get_required_path();
	}

	function classes(){
		$rota = $this;
		$language = new Locale_Lib();
		$name = new Nomes_Model;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		require (new Render_Lib('classes'))->get_required_path();
	}

	function racas(){
		$rota = $this;
		$language = new Locale_Lib();
		$name = new Nomes_Model;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		require (new Render_Lib('racas'))->get_required_path();
	}

	function culturais(){
		$rota = $this;
		$language = new Locale_Lib();
		$name = new Nomes_Model;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		require (new Render_Lib('culturais'))->get_required_path();
	}

	function outros(){
		$rota = $this;
		$language = new Locale_Lib();
		$name = new Nomes_Model;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		require (new Render_Lib('outros'))->get_required_path();
	}
}