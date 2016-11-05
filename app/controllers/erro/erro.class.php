<?php

class Erro_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$language = new Locale_Lib;
		$tag = new Tags_Lib();
		$erro = new Erro_Model;
		$erro->codigo = 404;
		$erro->erro_msg = $language->ERROR_MSG_PAGE_DONT_EXIST;
		require (new Render_Lib())->get_required_path();
	}

	function codigo($id_erro = '404'){
		$language = new Locale_Lib;
		$erro = new Erro_Model;
		$erros = [
			'404' => $language->ERROR_MSG_PAGE_DONT_EXIST,
			'001' => $language->ERROR_MSG_CODE_NONEXISTENT,
			'002' => $language->ERROR_MSG_USER_DONT_SUBSCRIBE,
			'003' => $language->ERROR_MSG_UPDATE
		];
		
		if (is_array($id_erro) || (!array_key_exists($id_erro, $erros)) ) {
			header('Location: ' . URL_BASE . 'erro');
		} else {
			$tag = new Tags_Lib();
			$erro->codigo = $id_erro;
			$erro->erro_msg = $erros[$id_erro];

			require (new Render_Lib('codigo'))->get_required_path();
		}
	}

	function msg($msg = ''){
		$language = new Locale_Lib;
		if (is_array($msg)) {
			header('Location: ' . URL_BASE . 'erro');
		} else {
			$tag = new Tags_Lib();
			$erro = new Erro_Model;
			$erro->erro_msg = $msg;
			$erro->codigo = '';
			
			require (new Render_Lib('codigo'))->get_required_path();
		}

	}

	function error(){
		header('Location:' . URL_BASE . 'erro');
	}
}