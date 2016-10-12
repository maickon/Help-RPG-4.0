<?php

class Recuperarsenha_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$recuperar_senha = new Recuperarsenha_Model;
		
		$recuperar_senha->descricao = RECUPERAR_SENHA_META_DESCRIPTION;
		$recuperar_senha->palavras_chave = RECUPERAR_SENHA_META_KEYWORDS;
		$recuperar_senha->autor = META_AUTHOR;
		$recuperar_senha->titulo = RECUPERAR_SENHA_TITULO;
		$recuperar_senha->home_path = URL_BASE;
		$recuperar_senha->inscreverse_path = URL_BASE.'inscreverse';
		$recuperar_senha->email = RECUPERAR_SENHA_EMAIL;
		$recuperar_senha->msg = RECUPERAR_SENHA_MSG;
		$recuperar_senha->btn = RECUPERAR_SENHA_BTN;
		$recuperar_senha->link = RECUPERAR_SENHA_INSCREVER_SE_LINK;
		$recuperar_senha->help = SITE_NAME_HELP;
		$recuperar_senha->rpg = SITE_NAME_RPG;
		require (new Render_Lib())->get_required_path();
	}		
}