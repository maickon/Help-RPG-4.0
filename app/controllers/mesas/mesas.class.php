
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Classe de controle gerada no automatico

	class Mesas_Controller extends Controller_Lib {

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
			$mesas_model = new Mesas_Model;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$mesas = $mesas_model->select('mesas');
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

			$mesas = new Mesas_Model;
			require (new Render_Lib('novo'))->get_required_path();
		}

		function salvar(){
			$language = new Locale_Lib;
			$mesas = new Mesas_Model();
			if (count($_REQUEST) < 4) {
				$this->error();
				exit();
			} else {
				// data formato sql
				$data = explode('/', $_REQUEST['data_final']);
				$data_formatada = "{$data[2]}-{$data[1]}-$data[0] 00:00:00";
				$_REQUEST['data_final'] = $data_formatada;

				if( preg_match( '@<img(.*?)/>@s', $_REQUEST['descricao'], $matches ) ){
					$exibir = $matches[0];
				} else {
					$exibir = '';
				}

				$campos = ['dono','lingua','nome','sistema','data_final','descricao'];
				$valores = [$_REQUEST['dono'],$_REQUEST['lingua'],$_REQUEST['nome'],$_REQUEST['sistema'],$_REQUEST['data_final'],$_REQUEST['descricao']];

				if ($mesas->insert('mesas', $campos, $valores)) {
					$time_line = new Timeline_Model;
					$id_mesas = $mesas->maxId('mesas')[0];

					$time_line->insert(
					'timeline',
					['id_cadastro','lingua','titulo','exibir','tipo','dono','sistema','descricao'],
					[$id_mesas->id,$_REQUEST['lingua'], $_REQUEST['nome'], $exibir, 'mesas', $_REQUEST['dono'], $_REQUEST['sistema'], $_REQUEST['descricao']]);

					$usuario = new Usuario_Model;
					$usuario_xp = $usuario->select('usuarios',['xp','nivel'],['id','=',$_SESSION['id']])[0];
					$xp = new Xp_Model;
					$xp->gravar_xp($usuario_xp);
					$xp->checar_nivel($usuario_xp);
					header("Location: {$this->visualizar_path}{$id_mesas->id}");
				} else {
					header("Location: {$this->novo}?status=erro");
				}
			}
		}

		function visualizar($params=''){
			@session_start();
			$comments = new Disqus_Helper;
			if ($params == '' || !is_numeric($params)) {
				header('Location:' . URL_BASE. 'mesas');
			}

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$mesas = new Mesas_Model();
			$usuario_atributos = 'u.id as usuario_id, u.nome as usuario_nome, u.pais, u.xp, u.nivel, u.estrelas, u.foto_link, u.capa_link, u.descricao as usuario_descricao';
			$mesas_view = $mesas->direct_instruction("SELECT a.*, {$usuario_atributos} FROM mesas a, usuarios u WHERE a.id = {$params} and u.login = a.dono", 'mesas e usuarios')[0];

			require (new Render_Lib('visualizar'))->get_required_path();
		}

		function editar($params){
			$mesas = new Mesas_Model();
			$mesas_view = $mesas->direct_instruction("SELECT * FROM mesas WHERE id={$params} AND dono='{$_SESSION['login']}'",'mesas');

			if (is_numeric($params) and count($mesas_view) == 1) {
				$mesas = (new Mesas_Model())->select('mesas','*',[ ['id','=',$params] ]);
				if (count($mesas) == 0) {
					header('Location: ' . URL_BASE . 'erro/codigo/404');
				} else {
					$mesas = $mesas[0];
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
				$mesas = new Mesas_Model();
				$mesas_view = $mesas->direct_instruction("SELECT * FROM mesas WHERE id={$_REQUEST['id']} AND dono='{$_SESSION['login']}'",'armas');
				if (count($mesas_view) == 1) {
					// data formato sql
					$data = explode('/', $_REQUEST['data_final']);
					$data_formatada = "{$data[2]}-{$data[1]}-$data[0] 00:00:00";
					$_REQUEST['data_final'] = $data_formatada;

					if( preg_match( '@<img(.*?)/>@s', $_REQUEST['descricao'], $matches ) ){
						$exibir = $matches[0];
					} else {
						$exibir = '';
					}

					$campos = ['nome','sistema','data_final','descricao'];
					$valores = [$_REQUEST['nome'],$_REQUEST['sistema'],$_REQUEST['data_final'],$_REQUEST['descricao']];
					if ($mesas->update('mesas', $campos, $valores, 'id', $_REQUEST['id'])) {

						$time_line = new Timeline_Model;
						$insrucao = "
							UPDATE timeline
							SET
								lingua		= '{$_REQUEST['lingua']}',
								titulo		= '{$_REQUEST['nome']}',
								exibir		= '{$exibir}',
								tipo 		= 'mesas',
								dono 		= '{$_REQUEST['dono']}',
								sistema 	= '{$_REQUEST['sistema']}',
								descricao 	= '{$_REQUEST['descricao']}'
							WHERE
								id_cadastro = {$_REQUEST['id']} AND tipo = 'mesas'
						";

						$time_line->direct_instruction($insrucao,'timeline');

						header('Location: ' . URL_BASE . 'mesas/visualizar/'.$_REQUEST['id']);
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

			$mesas = new Mesas_Model();
			$mesas_view = $mesas->direct_instruction("SELECT * FROM mesas WHERE id={$params} AND dono='{$_SESSION['login']}'",'mesas');

			if ($params == '' || !is_numeric($params) || (count($mesas_view) == 0)) {
				header('Location:' . URL_BASE. 'mesas');
			} else {
				if ($mesas->delete('mesas', ['id','=', $params])){
					$time_line = new Timeline_Model;
					$time_line->delete('timeline', [ ['id_cadastro', '=', $params], ['tipo', '=', 'mesas'] ], 'AND');
					header('Location: ' . URL_BASE . 'mesas?status=deletado!');
				} else {
					header('Location: ' . URL_BASE . 'erro/codigo/003');
				}
			}
		}

		function error(){
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}