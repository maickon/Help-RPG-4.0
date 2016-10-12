<?php

class Inscreverse_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$inscreverse = new Inscreverse_Model;

		$inscreverse->descricao = INSCREVERSE_META_DESCRIPTION;
		$inscreverse->palavras_chave = INSCREVERSE_META_KEYWORDS;
		$inscreverse->autor = META_AUTHOR;
		$inscreverse->titulo = INSCREVERSE_TITLE;
		$inscreverse->help = SITE_NAME_HELP;
		$inscreverse->rpg = SITE_NAME_RPG;
		$inscreverse->main_msg = INSCREVERSE_MAIN_MSG;
		$inscreverse->novo_membro = INSCREVERSE_NOVO_MEMBRO;
		$inscreverse->usuario = INSCREVERSE_USUARIO;
		$inscreverse->email = INSCREVERSE_EMAIL;
		$inscreverse->senha = INSCREVERSE_SENHA;
		$inscreverse->confirmar_senha = INSCREVERSE_CONFIRMAR_SENHA;
		$inscreverse->termo_1 = INSCREVERSE_TERMOS_1;
		$inscreverse->termo_2 = INSCREVERSE_TERMOS_2;
		$inscreverse->btn_criar_conta = INSCREVERSE_BTN_CRIAR_CONTA;
		$inscreverse->usuario_cadastrado = INSCREVERSE_USUARIO_CADASTRADO;
		$inscreverse->login_path = URL_BASE.'login';
		$inscreverse->home_path = URL_BASE;
		// $usuario = new Usuario_Model();
		require (new Render_Lib())->get_required_path();
	}		
}