<?php

class Utilitarios_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$language = new Locale_Lib;
		$tag = new Tags_Lib();
		$painel = new Painel_Model;
		$utilitarios = new Utilitarios_Model;
		$helper = new Utilitarios_Helper;

		$utilitarios->utilitarios('help-rpg');
		$utilitarios->utilitarios('fichas');
		$utilitarios->utilitarios('itens');
		$utilitarios->utilitarios('masmorras');
		$utilitarios->utilitarios('aventuras');
		$utilitarios->utilitarios('nomes');
	
		require (new Render_Lib())->get_required_path();
	}
}