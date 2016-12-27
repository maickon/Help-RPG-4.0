
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Classe de controle gerada no automatico

	class Paginas_Controller extends Controller_Lib {

		function __construct(){
			parent::get_path();
		}

		function index(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];

			if ($usuario->adm == 1 and $usuario->login == 'Maickon') {
				$language = new Locale_Lib;
				$tag = new Tags_Lib;
				$form = new Form_Lib;
				$limit_text = new Textos_Helper;
				$paginas_model = new Paginas_Model;
				$painel = new Painel_Model;
				$time_ago = new Timeago_Helper;
				$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
				$paginas = $paginas_model->select('paginas');
				require (new Render_Lib())->get_required_path();
			} else {
			    header("Location: " . URL_BASE);
			}
		}

		function novo(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];

			if ($usuario->adm == 1 and $usuario->login == 'Maickon') {
				$language = new Locale_Lib;
				$tag = new Tags_Lib;
				$form = new Form_Lib;
				$painel = new Painel_Model;
				$sistemas_helper = new Sistemasrpg_Helper;
				$time_ago = new Timeago_Helper;
				$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();

				$paginas = new Paginas_Model;
				require (new Render_Lib('novo'))->get_required_path();
			} else {
			    header("Location: " . URL_BASE);
			}
		}

		function salvar(){
			$language = new Locale_Lib;
			$paginas = new Paginas_Model();
			if (count($_REQUEST) < 4) {
				$this->error();
				exit();
			} else {
				$campos = ['dono','lingua','nome','titulo','descricao'];
				$valores = [$_REQUEST['dono'],$_REQUEST['lingua'],$_REQUEST['nome'],$_REQUEST['titulo'],$_REQUEST['descricao']];

				if ($paginas->insert('paginas', $campos, $valores)) {
					header("Location: {$this->visualizar_path}{$id_paginas->id}");
				} else {
					header("Location: {$this->novo}?status=erro");
				}
			}
		}

		function visualizar($params=''){
			@session_start();
			$comments = new Disqus_Helper;
			if ($params == '' || !is_numeric($params)) {
				header('Location:' . URL_BASE. 'paginas');
			}

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];

			if ($usuario->adm == 1 and $usuario->login == 'Maickon') {
				$language = new Locale_Lib;
				$tag = new Tags_Lib;
				$painel = new Painel_Model;
				$time_ago = new Timeago_Helper;
				$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
				$paginas = new Paginas_Model();
				$usuario_atributos = 'u.id as usuario_id, u.nome as usuario_nome, u.pais, u.xp, u.nivel, u.estrelas, u.foto_link, u.capa_link, u.descricao as usuario_descricao';
				$paginas_view = $paginas->direct_instruction("SELECT a.*, {$usuario_atributos} FROM paginas a, usuarios u WHERE a.id = {$params} and u.login = a.dono", 'paginas e usuarios')[0];

				require (new Render_Lib('visualizar'))->get_required_path();
			} else {
			    header("Location: " . URL_BASE);
			}
		}

		function editar($params){
			@session_start();
			$paginas = new Paginas_Model();
			$paginas_view = $paginas->direct_instruction("SELECT * FROM paginas WHERE id={$params} AND dono='{$_SESSION['login']}'",'paginas');

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];

			if ($usuario->adm == 1 and $usuario->login == 'Maickon') {
				if (is_numeric($params) and count($paginas_view) == 1) {
					$paginas = (new Paginas_Model())->select('paginas','*',[ ['id','=',$params] ]);
					if (count($paginas) == 0) {
						header('Location: ' . URL_BASE . 'erro/codigo/404');
					} else {
						$paginas = $paginas[0];
						$language = new Locale_Lib;
						$tag = new Tags_Lib;
						$form = new Form_Lib;
						$painel = new Painel_Model;
						$sistemas_helper = new Sistemasrpg_Helper();
						$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
						$time_ago = new Timeago_Helper;
						require (new Render_Lib('editar'))->get_required_path();
					}
				} else {
					header('Location: ' . URL_BASE . 'erro/codigo/404');
				}
			} else {
			    header("Location: " . URL_BASE);
			}
		}

		function atualizar(){
			@session_start();
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];

			if ($usuario->adm == 1 and $usuario->login == 'Maickon') {
				if (count($_REQUEST) < 5) {
					header('Location: ' . URL_BASE . 'erro/codigo/404');
				} else {
					$paginas = new Paginas_Model();
					$paginas_view = $paginas->direct_instruction("SELECT * FROM paginas WHERE id={$_REQUEST['id']} AND dono='{$_SESSION['login']}'",'armas');
					if (count($paginas_view) == 1) {
						$campos = ['nome','titulo','descricao'];
						$valores = [$_REQUEST['nome'],$_REQUEST['titulo'],$_REQUEST['descricao']];
						if ($paginas->update('paginas', $campos, $valores, 'id', $_REQUEST['id'])) {
							header('Location: ' . URL_BASE . 'paginas/visualizar/'.$_REQUEST['id']);
						} else {
							header('Location: ' . URL_BASE . 'erro/codigo/003');
						}
					} else {
						header('Location: ' . URL_BASE . 'erro/codigo/404');
					}
				}
			} else {
			    header("Location: " . URL_BASE);
			}
		}

		function deletar($params = ''){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];

			if ($usuario->adm == 1 and $usuario->login == 'Maickon') {
				$paginas = new Paginas_Model();
				$paginas_view = $paginas->direct_instruction("SELECT * FROM paginas WHERE id={$params} AND dono='{$_SESSION['login']}'",'paginas');

				if ($params == '' || !is_numeric($params) || (count($paginas_view) == 0)) {
					header('Location:' . URL_BASE. 'paginas');
				} else {
					if ($paginas->delete('paginas', ['id','=', $params])){
						header('Location: ' . URL_BASE . 'paginas?status=deletado!');
					} else {
						header('Location: ' . URL_BASE . 'erro/codigo/003');
					}
				}
			} else {
			    header("Location: " . URL_BASE);
			}
		}

		function sobre(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$time_ago = new Timeago_Helper;
			$pagina = (new Paginas_Model)->select('paginas', '*', [['nome','=','sobre'], ['lingua','=',$_SESSION['lingua']]], 'AND')[0];
			require (new Render_Lib('pagina'))->get_required_path();
		}

		function uso(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$time_ago = new Timeago_Helper;
			$pagina = (new Paginas_Model)->select('paginas', '*', [['nome','=','uso'], ['lingua','=',$_SESSION['lingua']]], 'AND')[0];
			require (new Render_Lib('pagina'))->get_required_path();
		}

		function versoes(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$time_ago = new Timeago_Helper;
			$pagina = (new Paginas_Model)->select('paginas', '*', [['nome','=','versoes'], ['lingua','=',$_SESSION['lingua']]], 'AND')[0];
			require (new Render_Lib('pagina'))->get_required_path();
		}

		function doacao(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$time_ago = new Timeago_Helper;
			$pagina = (new Paginas_Model)->select('paginas', '*', [['nome','=','doacao'], ['lingua','=',$_SESSION['lingua']]], 'AND')[0];
			require (new Render_Lib('pagina'))->get_required_path();
		}

		function parceria(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$time_ago = new Timeago_Helper;
			$pagina = (new Paginas_Model)->select('paginas', '*', [['nome','=','parceria'], ['lingua','=',$_SESSION['lingua']]], 'AND')[0];
			require (new Render_Lib('pagina'))->get_required_path();
		}

		function eu(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$time_ago = new Timeago_Helper;
			$pagina = (new Paginas_Model)->select('paginas', '*', [['nome','=','eu'], ['lingua','=',$_SESSION['lingua']]], 'AND')[0];
			require (new Render_Lib('pagina'))->get_required_path();
		}
		function error(){
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}