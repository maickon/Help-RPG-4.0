<?php

class Idioma_Controller{

	function index(){
		$language = new Locale_Lib();
		$idioma = new Idioma_Model();
		$tag = new Tags_Lib;
		$painel = new Painel_Model;
		$idiomas = new Idioma_Model;
		require (new Render_Lib())->get_required_path();
	}

	function linguagem($sigla){
		$idiomas = new Idioma_Model;
		if (!in_array($sigla, $idiomas->bandeiras)) {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		} else {
			session_start();
			$_SESSION['lingua'] = $sigla;
			header('Location: ' . URL_BASE );
		}
	}
}