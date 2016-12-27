
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Classe de controle gerada no automatico

	class Historias_Controller extends Controller_Lib {

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
			$historias_model = new Historias_Model;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$historias = $historias_model->select('historias');
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

			$historias = new Historias_Model;
			require (new Render_Lib('novo'))->get_required_path();
		}

		function salvar(){
			$language = new Locale_Lib;
			$historias = new Historias_Model();
			if (count($_REQUEST) < 4) {
				$this->error();
				exit();
			} else {
				if( preg_match( '@<img(.*?)/>@s', $_REQUEST['descricao'], $matches ) ){
					$exibir = $matches[0];
				} else {
					$exibir = '';
				}
				$campos = ['dono','lingua','titulo','tipo','descricao_pequena','sistema','descricao'];
				$valores = [$_REQUEST['dono'],$_REQUEST['lingua'],$_REQUEST['titulo'],$_REQUEST['tipo'],$_REQUEST['descricao_pequena'],$_REQUEST['sistema'],$_REQUEST['descricao']];

				if ($historias->insert('historias', $campos, $valores)) {
					$time_line = new Timeline_Model;
					$id_historias = $historias->maxId('historias')[0];

					$time_line->insert(
					'timeline',
					['id_cadastro','lingua','titulo','exibir','tipo','dono','sistema','descricao'],
					[$id_historias->id,$_REQUEST['lingua'], $_REQUEST['titulo'], $exibir, 'historias', $_REQUEST['dono'], $_REQUEST['sistema'], $_REQUEST['descricao']]);

					$usuario = new Usuario_Model;
					$usuario_xp = $usuario->select('usuarios',['xp','nivel'],['id','=',$_SESSION['id']])[0];
					$xp = new Xp_Model;
					$xp->gravar_xp($usuario_xp);
					$xp->checar_nivel($usuario_xp);
					header("Location: {$this->visualizar_path}{$id_historias->id}");
				} else {
					header("Location: {$this->novo}?status=erro");
				}
			}
		}

		function visualizar($params=''){
			@session_start();
			$comments = new Disqus_Helper;
			if ($params == '' || !is_numeric($params)) {
				header('Location:' . URL_BASE. 'historias');
			}

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$historias = new Historias_Model();
			$usuario_atributos = 'u.id as usuario_id, u.nome as usuario_nome, u.pais, u.xp, u.nivel, u.estrelas, u.foto_link, u.capa_link, u.descricao as usuario_descricao';
			$historias_view = $historias->direct_instruction("SELECT a.*, {$usuario_atributos} FROM historias a, usuarios u WHERE a.id = {$params} and u.login = a.dono", 'historias e usuarios')[0];

			require (new Render_Lib('visualizar'))->get_required_path();
		}

		function editar($params){
			$historias = new Historias_Model();
			$historias_view = $historias->direct_instruction("SELECT * FROM historias WHERE id={$params} AND dono='{$_SESSION['login']}'",'historias');

			if (is_numeric($params) and count($historias_view) == 1) {
				$historias = (new Historias_Model())->select('historias','*',[ ['id','=',$params] ]);
				if (count($historias) == 0) {
					header('Location: ' . URL_BASE . 'erro/codigo/404');
				} else {
					$historias = $historias[0];
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
				$historias = new Historias_Model();
				$historias_view = $historias->direct_instruction("SELECT * FROM historias WHERE id={$_REQUEST['id']} AND dono='{$_SESSION['login']}'",'armas');
				if (count($historias_view) == 1) {
					if( preg_match( '@<img(.*?)/>@s', $_REQUEST['descricao'], $matches ) ){
						$exibir = $matches[0];
					} else {
						$exibir = '';
					}
					$campos = ['titulo','tipo','descricao_pequena','sistema','descricao'];
					$valores = [$_REQUEST['titulo'],$_REQUEST['tipo'],$_REQUEST['descricao_pequena'],$_REQUEST['sistema'],$_REQUEST['descricao']];
					if ($historias->update('historias', $campos, $valores, 'id', $_REQUEST['id'])) {

						$time_line = new Timeline_Model;
						$insrucao = "
							UPDATE timeline
							SET
								lingua		= '{$_REQUEST['lingua']}',
								titulo		= '{$_REQUEST['titulo']}',
								exibir		= '{$exibir}',
								tipo 		= 'historias',
								dono 		= '{$_REQUEST['dono']}',
								sistema 	= '{$_REQUEST['sistema']}',
								descricao 	= '{$_REQUEST['descricao']}'
							WHERE
								id_cadastro = {$_REQUEST['id']} AND tipo = 'historias'
						";

						$time_line->direct_instruction($insrucao,'timeline');

						header('Location: ' . URL_BASE . 'historias/visualizar/'.$_REQUEST['id']);
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

			$historias = new Historias_Model();
			$historias_view = $historias->direct_instruction("SELECT * FROM historias WHERE id={$params} AND dono='{$_SESSION['login']}'",'historias');

			if ($params == '' || !is_numeric($params) || (count($historias_view) == 0)) {
				header('Location:' . URL_BASE. 'historias');
			} else {
				if ($historias->delete('historias', ['id','=', $params])){
					$time_line = new Timeline_Model;
					$time_line->delete('timeline', [ ['id_cadastro', '=', $params], ['tipo', '=', 'historias'] ], 'AND');
					header('Location: ' . URL_BASE . 'historias?status=deletado!');
				} else {
					header('Location: ' . URL_BASE . 'erro/codigo/003');
				}
			}
		}

		function error(){
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}