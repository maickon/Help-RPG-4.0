<?php

class Login_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		session_start();
		if (isset($_SESSION['id']) and isset($_SESSION['nome']) and isset($_SESSION['login']))
			header('Location: ' . URL_BASE . 'painel');

		$language = new Locale_Lib();
		$login =  new Login_Model();
		$tag = new Tags_Lib();

		require (new Render_Lib())->get_required_path();
	}

	function entrar(){
		if (isset($_REQUEST['email']) and isset($_REQUEST['senha'])) {
			$usuario = new Usuario_Model;
			$usuario_login = $usuario->select('usuarios', '*', [ ['email', '=', $_REQUEST['email']], 
																 ['senha', '=', md5($_REQUEST['senha'])],
																 ['ativo', '=', '1'] 
															   ], 'AND');
			if (count($usuario_login) == 1) {
				session_start();
				$_SESSION['id'] = $usuario_login[0]->id;
				$_SESSION['nome'] = $usuario_login[0]->nome;
				$_SESSION['login'] = $usuario_login[0]->login;
				$_SESSION['capa_link'] = $usuario_login[0]->capa_link;
				$_SESSION['foto_link'] = $usuario_login[0]->foto_link;
				$_SESSION['email'] = $usuario_login[0]->email;
				header("Location: " .URL_BASE. "painel");
			} else {
				header("Location: " .URL_BASE. "login?erro=true");
			}	
		} else {
			header("Location: " .URL_BASE. "login");
		}
		print_r($_REQUEST);
	}

	function verificar($params = ''){
		if (is_array($params) or $params == '') {
			$this->error();
		}

		if (is_string($params)) {
			$usuario = new Usuario_Model;
			$usuario_validado = $usuario->select('usuarios', ['hash_code'], ['hash_code', '=', $params]);
			if (count($usuario_validado) == 1) {
				if ($usuario->update('usuarios', ['ativo'], ['1'], 'hash_code', $params)) {
					$usuario->update('usuarios', ['hash_code'], ['expirado'], 'hash_code', $params);
					header("Location: " .URL_BASE. "login?status=conta_ativada");
				} else {
					header('Location: ' . URL_BASE . 'erro/msg/' . LOGIN_ERRO_CONTA_ATIVADA);
				}
			} else {
				header('Location: ' . URL_BASE . 'erro/msg/' . LOGIN_ERRO_HASH_NAO_ENCONTRADA);
			}
			echo '<pre>';
			print_r($usuario_validado);
		}
	}

	function error(){
		header("Location: " .URL_BASE. "erro/");
	}

	function sair(){
		ini_set('date.timezone', 'America/Sao_paulo');
		session_start();
		$usuario = new Usuario_Model;
		$usuario->update('usuarios',['ultimo_login'],[date('Y-m-d H:i:s')], 'id', $_SESSION['id']);
		session_destroy();
		header("Location: " . URL_BASE);
	}
}