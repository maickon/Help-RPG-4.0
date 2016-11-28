<?php

class Recuperarsenha_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$language = new Locale_Lib;
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$recuperar_senha = new Recuperarsenha_Model;
		require (new Render_Lib())->get_required_path();
	}		
}