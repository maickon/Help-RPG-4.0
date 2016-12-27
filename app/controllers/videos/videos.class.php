
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Classe de controle gerada no automatico

	class Videos_Controller extends Controller_Lib {

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
			$videos_model = new Videos_Model;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$videos = $videos_model->select('videos');
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

			$videos = new Videos_Model;
			require (new Render_Lib('novo'))->get_required_path();
		}

		function salvar(){
			$language = new Locale_Lib;
			$videos = new Videos_Model();
			if (count($_REQUEST) < 4) {
				$this->error();
				exit();
			} else {
				$itens = parse_url($_REQUEST['link']);
				parse_str($itens['query'], $params);
				$link = 'http://www.youtube.com/embed/';

				if (isset($params['v'])) {
					$link .= $params['v'].'?fs=1';
				} elseif (isset($params['v']) and isset($params['list'])) {
					$link .= '&autoplay=1&listType=playlist&list='.$params['list'];
				} else {
					$link .= 'playlist?autoplay=1&listType=playlist&list='.$params['list'];
				}

				$iframe = '<iframe id="ytplayer" type="text/html" width="100%" height="560" src="'.$link.'" frameborder="0"></iframe>';

				$campos = ['dono','lingua','nome','link','iframe','sistema','descricao'];
				$valores = [$_REQUEST['dono'],$_REQUEST['lingua'],$_REQUEST['nome'],$_REQUEST['link'],$iframe,$_REQUEST['sistema'],$_REQUEST['descricao']];


				if ($videos->insert('videos', $campos, $valores)) {
					$time_line = new Timeline_Model;
					$id_videos = $videos->maxId('videos')[0];

					$time_line->insert(
					'timeline',
					['id_cadastro','lingua','titulo','exibir','tipo','dono','sistema','descricao'],
					[$id_videos->id,$_REQUEST['lingua'], $_REQUEST['nome'], $iframe,'videos', $_REQUEST['dono'], $_REQUEST['sistema'], $_REQUEST['descricao']]);

					$usuario = new Usuario_Model;
					$usuario_xp = $usuario->select('usuarios',['xp','nivel'],['id','=',$_SESSION['id']])[0];
					$xp = new Xp_Model;
					$xp->gravar_xp($usuario_xp);
					$xp->checar_nivel($usuario_xp);
					header("Location: {$this->visualizar_path}{$id_videos->id}");
				} else {
					header("Location: {$this->novo}?status=erro");
				}
			}
		}

		function visualizar($params=''){
			@session_start();
			$comments = new Disqus_Helper;
			if ($params == '' || !is_numeric($params)) {
				header('Location:' . URL_BASE. 'videos');
			}

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$videos = new Videos_Model();
			$usuario_atributos = 'u.id as usuario_id, u.nome as usuario_nome, u.pais, u.xp, u.nivel, u.estrelas, u.foto_link, u.capa_link, u.descricao as usuario_descricao';
			$videos_view = $videos->direct_instruction("SELECT a.*, {$usuario_atributos} FROM videos a, usuarios u WHERE a.id = {$params} and u.login = a.dono", 'videos e usuarios')[0];

			require (new Render_Lib('visualizar'))->get_required_path();
		}

		function editar($params){
			$videos = new Videos_Model();
			$videos_view = $videos->direct_instruction("SELECT * FROM videos WHERE id={$params} AND dono='{$_SESSION['login']}'",'videos');

			if (is_numeric($params) and count($videos_view) == 1) {
				$videos = (new Videos_Model())->select('videos','*',[ ['id','=',$params] ]);
				if (count($videos) == 0) {
					header('Location: ' . URL_BASE . 'erro/codigo/404');
				} else {
					$videos = $videos[0];
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
				$videos = new Videos_Model();
				$videos_view = $videos->direct_instruction("SELECT * FROM videos WHERE id={$_REQUEST['id']} AND dono='{$_SESSION['login']}'",'armas');
				if (count($videos_view) == 1) {

					$itens = parse_url($_REQUEST['link']);
					parse_str($itens['query'], $params);
					$link = 'http://www.youtube.com/embed/';

					if (isset($params['v'])) {
						$link .= $params['v'].'?fs=1';
					} elseif (isset($params['v']) and isset($params['list'])) {
						$link .= '&listType=playlist&list='.$params['list'];
					} else {
						$link .= 'playlist?listType=playlist&list='.$params['list'];
					}

					$iframe = '<iframe id="ytplayer" type="text/html" width="100%" height="560" src="'.$link.'" frameborder="0"></iframe>';

					$campos = ['nome','link','iframe','sistema','descricao'];
					$valores = [$_REQUEST['nome'],$_REQUEST['link'],$iframe,$_REQUEST['sistema'],$_REQUEST['descricao']];

					if ($videos->update('videos', $campos, $valores, 'id', $_REQUEST['id'])) {

						$time_line = new Timeline_Model;
						$insrucao = "
							UPDATE timeline
							SET
								lingua		= '{$_REQUEST['lingua']}',
								titulo		= '{$_REQUEST['nome']}',
								exibir		= '{$iframe}',
								tipo 		= 'videos',
								dono 		= '{$_REQUEST['dono']}',
								sistema 	= '{$_REQUEST['sistema']}',
								descricao 	= '{$_REQUEST['descricao']}'
							WHERE
								id_cadastro = {$_REQUEST['id']} AND tipo = 'videos'
						";

						$time_line->direct_instruction($insrucao,'timeline');

						header('Location: ' . URL_BASE . 'videos/visualizar/'.$_REQUEST['id']);
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

			$videos = new Videos_Model();
			$videos_view = $videos->direct_instruction("SELECT * FROM videos WHERE id={$params} AND dono='{$_SESSION['login']}'",'videos');

			if ($params == '' || !is_numeric($params) || (count($videos_view) == 0)) {
				header('Location:' . URL_BASE. 'videos');
			} else {
				if ($videos->delete('videos', ['id','=', $params])){
					$time_line = new Timeline_Model;
					$time_line->delete('timeline', [ ['id_cadastro', '=', $params], ['tipo', '=', 'videos'] ], 'AND');
					header('Location: ' . URL_BASE . 'videos?status=deletado!');
				} else {
					header('Location: ' . URL_BASE . 'erro/codigo/003');
				}
			}
		}

		function galeria($params = 1){
			if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login'])){
				header("Location: " . URL_BASE);
			} else {
				if (!is_numeric($params)) {
					$this->error();
				} else {
					$language = new Locale_Lib;
					$tag = new Tags_Lib;
					$form = new Form_Lib;
	
					$videos_model = new Videos_Model;
					$painel = new Painel_Model;
					$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
					$time_ago = new Timeago_Helper;
					$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();

					$videos = $videos_model->select('videos');

					$qtd_videos = count($videos);
					$registros = 24;
					$numero_paginas = ceil($qtd_videos/$registros);

					$inicio = ($registros*$params) - $registros;

					$videos = $videos_model->direct_instruction("SELECT * FROM videos LIMIT {$inicio},{$registros}",'videos');
					$qtd_videos = count($videos);

					require (new Render_Lib('galeria'))->get_required_path();
				}
			}
		}

		function filtrar_videos($params = ''){
			$videos_model = new Videos_Model;
			$videos = $videos_model->direct_instruction("
				SELECT * FROM videos
				WHERE
				nome LIKE '%{$params}%' OR
				cadastrado_em LIKE'%{$params}%' OR
				descricao LIKE'%{$params}%' OR
				sistema LIKE'%{$params}%' OR
				dono LIKE '%{$params}%'",'videos');

			echo json_encode($videos);
		}

		function error(){
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}