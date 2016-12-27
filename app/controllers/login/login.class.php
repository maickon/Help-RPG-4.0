<?php

class Login_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		@session_start();
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
				$_SESSION['email'] = $usuario_login[0]->email;
				$_SESSION['lingua'] = $usuario_login[0]->lingua;
				$_SESSION['ultimo_login'] = $usuario_login[0]->ultimo_login;
				header("Location: " .URL_BASE. "painel");
			} else {
				header("Location: " .URL_BASE. "login?erro=true");
			}
		} else {
			header("Location: " .URL_BASE. "login");
		}
	}

	function checar_login($login){
		$usuario = new Usuario_Model();
		$usuario_check = $usuario->select(
			'usuarios',
			['login'],
			[ 'login','=',$login]);

		if (array_key_exists(0, $usuario_check)) {
			echo 1;
		} else{
			echo 0;
		}
	}

	function checar_email($email){
		$usuario = new Usuario_Model();
		$usuario_check = $usuario->select(
			'usuarios',
			['email'],
			[ 'email','=',$email]);

		if (array_key_exists(0, $usuario_check)) {
			echo 1;
		} else{
			echo 0;
		}
	}

	function verificar($params = ''){
		if (is_array($params) or $params == '') {
			$this->error();
		}

		$language = new Locale_Lib();

		if (is_string($params)) {
			$usuario = new Usuario_Model;
			$usuario_validado = $usuario->select('usuarios', ['hash_code'], ['hash_code', '=', $params]);
			if (count($usuario_validado) == 1) {
				if ($usuario->update('usuarios', ['ativo'], ['1'], 'hash_code', $params)) {
					$usuario->update('usuarios', ['hash_code'], ['expirado'], 'hash_code', $params);
					header("Location: " .URL_BASE. "login?status=conta_ativada");
				} else {
					header('Location: ' . URL_BASE . 'erro/msg/' . $language->LOGIN_ERROR_ACTIVE_ACOUNT);
				}
			} else {
				header('Location: ' . URL_BASE . 'erro/msg/' . $language->LOGIN_ERRO_HASH_DONT_FIND);
			}
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