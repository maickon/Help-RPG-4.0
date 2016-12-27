
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Classe de controle gerada no automatico

	class Magias_Controller extends Controller_Lib {

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
			$magias_model = new Magias_Model;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$magias = $magias_model->select('magias');
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

			$magias = new Magias_Model;
			require (new Render_Lib('novo'))->get_required_path();
		}

		function salvar(){
			$language = new Locale_Lib;
			$magias = new Magias_Model();
			if (count($_REQUEST) < 4) {
				$this->error();
				exit();
			} else {
				if( preg_match( '@<img(.*?)/>@s', $_REQUEST['descricao'], $matches ) ){
					$exibir = $matches[0];
				} else {
					$exibir = '';
				}
				$campos = ['dono','lingua','nome','sistema','descricao'];
				$valores = [$_REQUEST['dono'],$_REQUEST['lingua'],$_REQUEST['nome'],$_REQUEST['sistema'],$_REQUEST['descricao']];

				if ($magias->insert('magias', $campos, $valores)) {
					$time_line = new Timeline_Model;
					$id_magias = $magias->maxId('magias')[0];

					$time_line->insert(
					'timeline',
					['id_cadastro','lingua','titulo','exibir','tipo','dono','sistema','descricao'],
					[$id_magias->id,$_REQUEST['lingua'], $_REQUEST['nome'], $exibir, 'magias', $_REQUEST['dono'], $_REQUEST['sistema'], $_REQUEST['descricao']]);

					$usuario = new Usuario_Model;
					$usuario_xp = $usuario->select('usuarios',['xp','nivel'],['id','=',$_SESSION['id']])[0];
					$xp = new Xp_Model;
					$xp->gravar_xp($usuario_xp);
					$xp->checar_nivel($usuario_xp);
					header("Location: {$this->visualizar_path}{$id_magias->id}");
				} else {
					header("Location: {$this->novo}?status=erro");
				}
			}
		}

		function visualizar($params=''){
			@session_start();
			$comments = new Disqus_Helper;
			if ($params == '' || !is_numeric($params)) {
				header('Location:' . URL_BASE. 'magias');
			}

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$magias = new Magias_Model();
			$usuario_atributos = 'u.id as usuario_id, u.nome as usuario_nome, u.pais, u.xp, u.nivel, u.estrelas, u.foto_link, u.capa_link, u.descricao as usuario_descricao';
			$magias_view = $magias->direct_instruction("SELECT a.*, {$usuario_atributos} FROM magias a, usuarios u WHERE a.id = {$params} and u.login = a.dono", 'magias e usuarios')[0];

			require (new Render_Lib('visualizar'))->get_required_path();
		}

		function editar($params){
			$magias = new Magias_Model();
			$magias_view = $magias->direct_instruction("SELECT * FROM magias WHERE id={$params} AND dono='{$_SESSION['login']}'",'magias');

			if (is_numeric($params) and count($magias_view) == 1) {
				$magias = (new Magias_Model())->select('magias','*',[ ['id','=',$params] ]);
				if (count($magias) == 0) {
					header('Location: ' . URL_BASE . 'erro/codigo/404');
				} else {
					$magias = $magias[0];
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
				$magias = new Magias_Model();
				$magias_view = $magias->direct_instruction("SELECT * FROM magias WHERE id={$_REQUEST['id']} AND dono='{$_SESSION['login']}'",'armas');
				if (count($magias_view) == 1) {
					if( preg_match( '@<img(.*?)/>@s', $_REQUEST['descricao'], $matches ) ){
						$exibir = $matches[0];
					} else {
						$exibir = '';
					}
					$campos = ['nome','sistema','descricao'];
					$valores = [$_REQUEST['nome'],$_REQUEST['sistema'],$_REQUEST['descricao']];
					if ($magias->update('magias', $campos, $valores, 'id', $_REQUEST['id'])) {

						$time_line = new Timeline_Model;
						$insrucao = "
							UPDATE timeline
							SET
								lingua		= '{$_REQUEST['lingua']}',
								titulo		= '{$_REQUEST['nome']}',
								exibir		= '{$exibir}',
								tipo 		= 'magias',
								dono 		= '{$_REQUEST['dono']}',
								sistema 	= '{$_REQUEST['sistema']}',
								descricao 	= '{$_REQUEST['descricao']}'
							WHERE
								id_cadastro = {$_REQUEST['id']} AND tipo = 'magias'
						";

						$time_line->direct_instruction($insrucao,'timeline');

						header('Location: ' . URL_BASE . 'magias/visualizar/'.$_REQUEST['id']);
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

			$magias = new Magias_Model();
			$magias_view = $magias->direct_instruction("SELECT * FROM magias WHERE id={$params} AND dono='{$_SESSION['login']}'",'magias');

			if ($params == '' || !is_numeric($params) || (count($magias_view) == 0)) {
				header('Location:' . URL_BASE. 'magias');
			} else {
				if ($magias->delete('magias', ['id','=', $params])){
					$time_line = new Timeline_Model;
					$time_line->delete('timeline', [ ['id_cadastro', '=', $params], ['tipo', '=', 'magias'] ], 'AND');
					header('Location: ' . URL_BASE . 'magias?status=deletado!');
				} else {
					header('Location: ' . URL_BASE . 'erro/codigo/003');
				}
			}
		}

		function error(){
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}