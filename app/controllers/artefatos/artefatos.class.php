<?php
class Artefatos_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		session_start();
		if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
		    header("Location: " . URL_BASE);
		
		$language = new Locale_Lib;
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$armadura = new Armaduras_Model();
		$painel = new Painel_Model;
		$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
		$time_ago = new Timeago_Helper;
		$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
		$armaduras = $armadura->select('armaduras');
		require (new Render_Lib())->get_required_path();
	}		

	function novo(){
		session_start();
		if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
		    header("Location: " . URL_BASE);

		$language = new Locale_Lib;
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
		$time_ago = new Timeago_Helper;
		$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
		$sistemas_helper = new Sistemasrpg_Helper();
		$armaduras_helper = new Armaduras_Helper;
		require (new Render_Lib('novo'))->get_required_path();
	}

	function salvar(){
		$armadura = new Armaduras_Model();
		if (count($_REQUEST) < 4) {
			$this->error();
			exit();
		} else {
			$campos = ['nome','sistema','descricao'];
			$valores= [$_REQUEST['nome'],$_REQUEST['sistema'],$_REQUEST['descricao']];
			if ($armadura->insert('armaduras', $campos, $valores)) {
				$armadura = $armadura->maxId('armaduras')[0];
				header("Location: {$this->visualizar_path}{$armadura->id}");
			} else {
				header("Location: {$this->novo}?status=erro");
			}
		}
	}

	function visualizar($params=''){
		session_start();
		if ($params == '' || !is_numeric($params)) {
			header("Location:" . URL_BASE.'armaduras');
		}
		$language = new Locale_Lib;
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
		$time_ago = new Timeago_Helper;
		$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
		$armadura = new Armaduras_Model();
		$armadura_view = $armadura->select('armaduras', '*', ['id', '=', $params])[0];
		require (new Render_Lib('visualizar'))->get_required_path();
	}

	function error(){
		echo '<center><h1>PÁGINA NÃO EXISTE!</h1></center>';
	}
}