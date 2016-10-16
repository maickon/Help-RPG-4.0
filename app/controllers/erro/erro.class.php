<?php

class Erro_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib();
		$erro = new Erro_Model;
		$erro->descricao = ERRO_META_DESCRIPTION;
		$erro->palavras_chave = ERRO_META_KEYWORDS;
		$erro->autor = META_AUTHOR;
		$erro->titulo = ERRO_TITULO;
		$erro->codigo = '404';
		$erro->erro_msg = ERRO_MSG_PAGINA_NAO_EXISTE;
		$erro->btn_msg = ERRO_BTN_MSG;
		$erro->home_url = URL_BASE;
		require (new Render_Lib())->get_required_path();
	}

	function codigo($id_erro = '404'){
		if (is_array($id_erro)) {
			header('Location: ' . URL_BASE . 'erro');
		}

		$tag = new Tags_Lib();
		$erro = new Erro_Model;

		$erros = [
			'404' => ERRO_MSG_PAGINA_NAO_EXISTE,
			'001' => ERRO_MSG_CODIGO_DE_ERRO_INEXISTENTE,
			'002' => ERRO_MSG_USUARIO_NAO_CADASTRADO,
			'003' => ERRO_MSG_ATUALIZAR
		];

		if (!array_key_exists($id_erro, $erros)) {
			$erro->codigo = $id_erro;
			$id_erro = '001';
		} else {
			$erro->codigo = $id_erro;
		}

		$erro->descricao = ERRO_META_DESCRIPTION;
		$erro->palavras_chave = ERRO_META_KEYWORDS;
		$erro->autor = META_AUTHOR;
		$erro->titulo = ERRO_TITULO;
		$erro->erro_msg = $erros[$id_erro];
		$erro->btn_msg = ERRO_BTN_MSG;
		$erro->home_url = URL_BASE;
		require (new Render_Lib('codigo'))->get_required_path();

	}

	function msg($msg = ''){
		if (is_array($msg)) {
			header('Location: ' . URL_BASE . 'erro');
		}

		$tag = new Tags_Lib();
		$erro = new Erro_Model;

		$erro->descricao = ERRO_META_DESCRIPTION;
		$erro->palavras_chave = ERRO_META_KEYWORDS;
		$erro->autor = META_AUTHOR;
		$erro->titulo = ERRO_TITULO;
		$erro->erro_msg = $msg;
		$erro->codigo = '';
		$erro->btn_msg = ERRO_BTN_MSG;
		$erro->home_url = URL_BASE;
		require (new Render_Lib('codigo'))->get_required_path();
	}

	function error(){
		header('Location:' . URL_BASE . 'erro');
	}
}