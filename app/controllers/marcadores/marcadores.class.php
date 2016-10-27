<?php

class Marcadores_Controller extends Controller_Lib{
	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$language = new Locale_Lib;
		$tag = new Tags_Lib();
		$form = new Form_Lib();
		$home_helper = new Home_Helper();
		$marcadores = new Marcadores_Model();
		require (new Render_Lib())->get_required_path();
	}
}