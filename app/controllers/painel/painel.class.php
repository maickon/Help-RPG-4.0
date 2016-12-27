<?php

class Painel_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index($params = 1){
		@session_start();
		if (isset($_SESSION['id']) and isset($_SESSION['nome']) and isset($_SESSION['login']) and is_numeric($params)) {
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$texto = new Textos_Helper;
			$painel = new Painel_Model;
			$language = new Locale_Lib;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$timeline_model = new Timeline_Model();
			$time_line = $timeline_model->direct_instruction('SELECT * FROM timeline ORDER BY id DESC ','timeline');
			// contador
			$qtd_posts = count($time_line);
			$registros = 20;
			$numero_posts = ceil($qtd_posts/$registros);

			$inicio = ($registros*$params) - $registros;

			$time_line = $timeline_model->direct_instruction("SELECT * FROM timeline ORDER BY id DESC LIMIT {$inicio},{$registros}",'timeline');
			$qtd_posts = count($time_line);

			// rank
			$rank = $painel->general_rank();

			// mesas
			$mesas = $painel->general_tables();

			require (new Render_Lib('index'))->get_required_path();

		} else {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}

	function cadastros(){
		@session_start();
		if (isset($_SESSION['id'])) {
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$language = new Locale_Lib;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$cadastros = [
							'armas',
							'classes',
							'bestiario',
							'personagens',
							'cenarios',
							'cronicas',
							'aventuras',
							'contos',
							'historias',
							'magias',
							'talentos',
							'armaduras',
							'artefatos',
							'pericias',
							'mesas',
							'escudos',
							'habilidades',
							'lugares',
							'videos',
							'galeria'
						];

			require (new Render_Lib())->get_required_path('cadastros');
		} else {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}

	function adm(){
		@session_start();
		if (isset($_SESSION['id'])) {
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			if ($usuario->adm == 1 and $usuario->login == 'Maickon') {
				$language = new Locale_Lib;
				$tag = new Tags_Lib;
				$form = new Form_Lib;
				$painel = new Painel_Model;
				$time_ago = new Timeago_Helper;
				$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
				require (new Render_Lib())->get_required_path('adm');
			} else {
				header('Location: ' . URL_BASE . 'erro/codigo/404');
			}
		} else {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}

	function armaduras(){
		$armadura = new Armaduras_Model();
		$armaduras = $armadura->select('armaduras');
	}

	function ranking($modalidade){
		$modulos = ['geral','videos','armas','classes','bestiario','personagens','cenarios','cronicas','aventuras','contos','historias','magias','talentos','armaduras','artefatos','pericias','mesas','escudos','habilidades','lugares','galeria'];
		@session_start();
		if (isset($_SESSION['id']) and in_array($modalidade, $modulos)) {
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$time_ago = new Timeago_Helper;
			$mesas = $painel->general_tables();
			$painel = new Painel_Model;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			if ($modalidade == 'geral') {
				$ranking = $painel->general_rank(10);
			} else {
				$ranking = $painel->model_rank($modalidade);
			}
			require (new Render_Lib('ranking'))->get_required_path();
		} else {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}
}