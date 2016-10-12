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
		$erro->codigo = ERRO_CODIGO;
		$erro->erro_msg = ERRO_MSG;
		$erro->btn_msg = ERRO_BTN_MSG;
		$erro->home_url = URL_BASE;
		require (new Render_Lib())->get_required_path();
	}
}