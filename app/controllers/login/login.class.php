<?php

class Login_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$login =  new Login_Model();
		$tag = new Tags_Lib();
		$login->base_url = URL_BASE;
		$login->titulo = LOGIN_TITLE;
		$login->descricao = LOGIN_META_DESCRIPTION;
		$login->palavras_chave = LOGIN_META_KEYWORDS;
		$login->autor = META_AUTHOR;
		$login->help = SITE_NAME_HELP;
		$login->rpg = SITE_NAME_RPG;
		$login->msg = LOGIN_MAIN_MSG;
		$login->usuario = LOGIN_USUARIO;
		$login->senha = LOGIN_SENHA;
		$login->relembrar = LOGIN_RELEMBRAR;
		$login->entrar = LOGIN_BTN_ENTRAR;
		$login->registrar_se = LOGIN_REGISTRAR_SE;
		$login->esqueceu_senha = LOGIN_ESQUECEU_SENHA;
		$login->esqueceu_senha_path = URL_BASE.'recuperarsenha';
		$login->inscreverse_path = URL_BASE.'inscreverse';
		require (new Render_Lib())->get_required_path();
	}
}