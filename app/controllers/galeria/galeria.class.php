
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Classe de controle gerada no automatico

	class Galeria_Controller extends Controller_Lib {

		function __construct(){
			parent::get_path();
		}

		function index(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$limit_text = new Textos_Helper;
			$galeria_model = new Galeria_Model;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$galeria = $galeria_model->select('galeria');
			require (new Render_Lib())->get_required_path();
		}

		function novo(){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$sistemas_helper = new Sistemasrpg_Helper;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();

			$galeria = new Galeria_Model;
			require (new Render_Lib('novo'))->get_required_path();
		}

		function salvar(){
			$language = new Locale_Lib;
			$galeria = new Galeria_Model();
			if (count($_REQUEST) < 4) {
				$this->error();
				exit();
			} else {
				$campos = ['dono','lingua','nome','url_img','tipo','descricao'];
				$valores = [$_REQUEST['dono'],$_REQUEST['lingua'],$_REQUEST['nome'],$_REQUEST['url_img'],$_REQUEST['tipo'],$_REQUEST['descricao']];
				$exibir = '<img src="'.$_REQUEST['url_img'].'" style="float:left; margin-right:10px;">';

				if ($galeria->insert('galeria', $campos, $valores)) {
					$time_line = new Timeline_Model;
					$id_galeria = $galeria->maxId('galeria')[0];

					$time_line->insert(
					'timeline',
					['id_cadastro','lingua','titulo','exibir','tipo','dono','sistema','descricao'],
					[$id_galeria->id,$_REQUEST['lingua'], $_REQUEST['nome'], $exibir, 'galeria', $_REQUEST['dono'], 'galeria', $_REQUEST['descricao']]);

					$usuario = new Usuario_Model;
					$usuario_xp = $usuario->select('usuarios',['xp','nivel'],['id','=',$_SESSION['id']])[0];
					$xp = new Xp_Model;
					$xp->gravar_xp($usuario_xp);
					$xp->checar_nivel($usuario_xp);
					header("Location: {$this->visualizar_path}{$id_galeria->id}");
				} else {
					header("Location: {$this->novo}?status=erro");
				}
			}
		}

		function visualizar($params=''){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$comments = new Disqus_Helper;
			if ($params == '' || !is_numeric($params)) {
				header('Location:' . URL_BASE. 'galeria');
			}

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$galeria = new Galeria_Model();
			$usuario_atributos = 'u.id as usuario_id, u.nome as usuario_nome, u.pais, u.xp, u.nivel, u.estrelas, u.foto_link, u.capa_link, u.descricao as usuario_descricao';
			$galeria_view = $galeria->direct_instruction("SELECT a.*, {$usuario_atributos} FROM galeria a, usuarios u WHERE a.id = {$params} and u.login = a.dono", 'galeria e usuarios')[0];

			require (new Render_Lib('visualizar'))->get_required_path();
		}

		function editar($params){
			$galeria = new Galeria_Model();
			$galeria_view = $galeria->direct_instruction("SELECT * FROM galeria WHERE id={$params} AND dono='{$_SESSION['login']}'",'galeria');

			if (is_numeric($params) and count($galeria_view) == 1) {
				$galeria = (new Galeria_Model())->select('galeria','*',[ ['id','=',$params] ]);
				if (count($galeria) == 0) {
					header('Location: ' . URL_BASE . 'erro/codigo/404');
				} else {
					$galeria = $galeria[0];
					$language = new Locale_Lib;
					$tag = new Tags_Lib;
					$form = new Form_Lib;
					$painel = new Painel_Model;
					$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
					$time_ago = new Timeago_Helper;
					$sistemas_helper = new Sistemasrpg_Helper();
					$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
					$time_ago = new Timeago_Helper;
					require (new Render_Lib('editar'))->get_required_path();
				}
			} else {
				header('Location: ' . URL_BASE . 'erro/codigo/404');
			}
		}

		function atualizar(){
			if (count($_REQUEST) < 5) {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
			} else {
				$galeria = new Galeria_Model();
				$galeria_view = $galeria->direct_instruction("SELECT * FROM galeria WHERE id={$_REQUEST['id']} AND dono='{$_SESSION['login']}'",'armas');
				if (count($galeria_view) == 1) {
					$campos = ['nome','url_img','tipo','descricao'];
					$valores = [$_REQUEST['nome'],$_REQUEST['url_img'],$_REQUEST['tipo'],$_REQUEST['descricao']];
					$exibir = '<img src="'.$_REQUEST['url_img'].'" style="float:left; margin-right:10px;">';

					if ($galeria->update('galeria', $campos, $valores, 'id', $_REQUEST['id'])) {

						$time_line = new Timeline_Model;
						$insrucao = "
							UPDATE timeline
							SET
								lingua		= '{$_REQUEST['lingua']}',
								titulo		= '{$_REQUEST['nome']}',
								exibir		= '{$exibir	}',
								tipo 		= 'galeria',
								dono 		= '{$_REQUEST['dono']}',
								sistema 	= 'galeria',
								descricao 	= '{$_REQUEST['descricao']}'
							WHERE
								id_cadastro = {$_REQUEST['id']} AND tipo = 'galeria'
						";

						$time_line->direct_instruction($insrucao,'timeline');

						header('Location: ' . URL_BASE . 'galeria/visualizar/'.$_REQUEST['id']);
					} else {
						header('Location: ' . URL_BASE . 'erro/codigo/003');
					}
				} else {
					header('Location: ' . URL_BASE . 'erro/codigo/404');
				}
			}
		}

		function deletar($params = ''){
			@session_start();
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login']))
			    header("Location: " . URL_BASE);

			$galeria = new Galeria_Model();
			$galeria_view = $galeria->direct_instruction("SELECT * FROM galeria WHERE id={$params} AND dono='{$_SESSION['login']}'",'galeria');

			if ($params == '' || !is_numeric($params) || (count($galeria_view) == 0)) {
				header('Location:' . URL_BASE. 'galeria');
			} else {
				if ($galeria->delete('galeria', ['id','=', $params])){
					$time_line = new Timeline_Model;
					$time_line->delete('timeline', [ ['id_cadastro', '=', $params], ['tipo', '=', 'galeria'] ], 'AND');
					header('Location: ' . URL_BASE . 'galeria?status=deletado!');
				} else {
					header('Location: ' . URL_BASE . 'erro/codigo/003');
				}
			}
		}

		function error(){
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}

		function imagens($params = 1){
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login'])){
				header("Location: " . URL_BASE);
			} else {
				if (!is_numeric($params)) {
					$this->error();
				} else {
					$language = new Locale_Lib;
					$tag = new Tags_Lib;
					$form = new Form_Lib;
					$limit_text = new Textos_Helper;
					$galeria_model = new Galeria_Model;
					$painel = new Painel_Model;
					$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
					$time_ago = new Timeago_Helper;
					$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
					$galeria = $galeria_model->select('galeria');

					$qtd_imagens = count($galeria);
					$registros = 22;
					$numero_paginas = ceil($qtd_imagens/$registros);

					$inicio = ($registros*$params) - $registros;

					$galeria = $galeria_model->direct_instruction("SELECT * FROM galeria LIMIT {$inicio},{$registros}",'galeria');
					$qtd_imagens = count($galeria);

					require (new Render_Lib('imagens'))->get_required_path();
				}
			}
		}

		function filtrar_imagem($params){
			$galeria_model = new Galeria_Model;
			$galeria = $galeria_model->direct_instruction("
				SELECT * FROM galeria
				WHERE
				nome LIKE '%{$params}%' OR
				tipo LIKE'%{$params}%' OR
				descricao LIKE'%{$params}%' OR
				dono LIKE '%{$params}%'",'galeria');

			echo json_encode($galeria);
		}
	}