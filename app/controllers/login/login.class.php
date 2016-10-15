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
		$login->email = LOGIN_EMAIL;
		$login->senha = LOGIN_SENHA;
		$login->relembrar = LOGIN_RELEMBRAR;
		$login->entrar = LOGIN_BTN_ENTRAR;
		$login->registrar_se = LOGIN_REGISTRAR_SE;
		$login->esqueceu_senha = LOGIN_ESQUECEU_SENHA;
		$login->msg_erro = LOGIN_MSG_ERRO;
		$login->esqueceu_senha_path = URL_BASE.'recuperarsenha';
		$login->inscreverse_path = URL_BASE.'inscreverse';
		require (new Render_Lib())->get_required_path();
	}

	function entrar(){
		if (isset($_REQUEST['email']) and isset($_REQUEST['senha'])) {
			$usuario = new Usuario_Model;
			$usuario_login = $usuario->select('usuarios', '*', [ ['email', '=', $_REQUEST['email']], 
																 ['senha', '=', md5($_REQUEST['senha'])] 
															   ], 'AND');
			if (count($usuario_login) == 1) {
				session_start();
				$_SESSION['id'] = $usuario_login[0]['id'];
				$_SESSION['nome'] = $usuario_login[0]['nome'];
				$_SESSION['login'] = $usuario_login[0]['login'];
				$_SESSION['capa_link'] = $usuario_login[0]['capa_link'];
				$_SESSION['foto_link'] = $usuario_login[0]['foto_link'];
				$_SESSION['email'] = $usuario_login[0]['email'];
				header("Location: " .URL_BASE. "painel");
			} else {
				header("Location: " .URL_BASE. "login?erro=true");
			}	
		} else {
			header("Location: " .URL_BASE. "login");
		}
		print_r($_REQUEST);
	}

	function error(){
		header("Location: " .URL_BASE. "erro/");
	}

	function sair(){
		session_start();
		session_destroy();
		header("Location: " . URL_BASE);
	}
}