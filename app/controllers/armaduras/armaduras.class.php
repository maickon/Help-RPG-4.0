<?php
class Armaduras_Controller extends Controller_Lib{

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
		$armaduras = new Armaduras_Model;
		require (new Render_Lib('novo'))->get_required_path();
	}

	function salvar(){
		$language = new Locale_Lib;
		$armadura = new Armaduras_Model();
		if (count($_REQUEST) < 4) {
			$this->error();
			exit();
		} else {
			$campos = ['nome','dono','sistema','descricao'];
			$valores= [$_REQUEST['nome'],$_REQUEST['dono'],$_REQUEST['sistema'],$_REQUEST['descricao']];
			if ($armadura->insert('armaduras', $campos, $valores)) {
				$armadura = $armadura->maxId('armaduras')[0];
				$usuario = new Usuario_Model;
				$usuario_xp = $usuario->select('usuarios',['xp','nivel'],['id','=',$_SESSION['id']])[0];
				$xp = new Xp_Model;
				$xp->gravar_xp($usuario, $usuario_xp->xp);
				$xp->checar_nivel($usuario, $usuario_xp->nivel, $usuario_xp->xp);
				header("Location: {$this->visualizar_path}{$armadura->id}");
			} else {
				header("Location: {$this->novo}?status=erro");
			}
		}
	}

	function visualizar($params=''){
		@session_start();
		$comments = new Disqus_Helper;
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
		
		$usuario_atributos = 'u.id as usuario_id, u.nome as usuario_nome, u.pais, u.xp, u.nivel, u.estrelas, u.foto_link, u.capa_link, u.descricao as usuario_descricao';
		$armadura_view = $armadura->direct_instruction("SELECT a.*, {$usuario_atributos} FROM armaduras a, usuarios u WHERE a.id = {$params} and u.login = a.dono", 'armaduras e usuarios')[0];
		require (new Render_Lib('visualizar'))->get_required_path();
	}

	function editar($params){
		@session_start();
		if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
		    header("Location: " . URL_BASE);
		
		$armadura = new Armaduras_Model;
		$armadura_view = $armadura->direct_instruction("SELECT * FROM armaduras WHERE id={$params} AND dono='{$_SESSION['login']}'",'armadura');
		
		if (is_numeric($params) and count($armadura_view) == 1) {
			$armaduras = (new Armaduras_Model())->select('armaduras','*',[ ['id','=',$params] ]);
			if (count($armaduras) == 0) {
				header('Location: ' . URL_BASE . 'erro/codigo/404');
			} else {
				$armaduras = $armaduras[0];
				$language = new Locale_Lib;
				$tag = new Tags_Lib;
				$form = new Form_Lib;
				$painel = new Painel_Model;
				$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
				$time_ago = new Timeago_Helper;
				$sistemas_helper = new Sistemasrpg_Helper();
				$armaduras_helper = new Armaduras_Helper();
				$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
				$time_ago = new Timeago_Helper;
				require (new Render_Lib('editar'))->get_required_path();	
			}
		} else {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}

	}

	function atualizar(){
		if (count($_REQUEST) < 8) {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		} else {
			$armadura = new Armaduras_Model();
			$armadura_view = $armadura->direct_instruction("SELECT * FROM armaduras WHERE id={$_REQUEST['id']} AND dono='{$_SESSION['login']}'",'armadura');
			if (count($armadura_view) == 1) {
				$campos = ['nome','dono','lingua','sistema','categoria','descricao'];
				$valores= [$_REQUEST['nome'],$_REQUEST['dono'],$_REQUEST['lingua'],$_REQUEST['sistema'],$_REQUEST['categoria'],$_REQUEST['descricao']];
				if ($armadura->update('armaduras', 
									$campos, 
									$valores, 
									'id', $_REQUEST['id'])) {
					header('Location: ' . URL_BASE . 'armaduras/visualizar/'.$_REQUEST['id']);
				} else {
					header('Location: ' . URL_BASE . 'erro/codigo/003');
				}
			} else {
				header('Location: ' . URL_BASE . 'erro/codigo/404');
			}
		}
	}
	
	function error(){
		echo '<center><h1>PÁGINA NÃO EXISTE!</h1></center>';
	}
}