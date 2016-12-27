<?php

class ControlCreator{

	function __construct($path, $class_name, $atributes, $db_dependence = false){
		$file_name = strtolower($class_name);
		$class_name = ucfirst(strtolower($class_name));
		$code = '
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Classe de controle gerada no automatico

	class '.$class_name.'_Controller extends Controller_Lib {

		function __construct(){
			parent::get_path();
		}

		function index(){
			@session_start();
			if (!isset($_SESSION[\'id\']) and !isset($_SESSION[\'nome\']) and !isset($_SESSION[\'login\']))
			    header("Location: " . URL_BASE);

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$limit_text = new Textos_Helper;
			$'.$file_name.'_model = new '.$class_name.'_Model;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select(\'usuarios\',\'*\',[\'id\',\'=\',$_SESSION[\'id\']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$'.$file_name.' = $'.$file_name.'_model->select(\''.$file_name.'\');
			require (new Render_Lib())->get_required_path();
		}

		function novo(){
			@session_start();
			if (!isset($_SESSION[\'id\']) and !isset($_SESSION[\'nome\']) and !isset($_SESSION[\'login\']))
			    header("Location: " . URL_BASE);

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$form = new Form_Lib;
			$painel = new Painel_Model;
			$sistemas_helper = new Sistemasrpg_Helper;
			$usuario = (new Usuario_Model())->select(\'usuarios\',\'*\',[\'id\',\'=\',$_SESSION[\'id\']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();

			$'.$file_name.' = new '.$class_name.'_Model;
			require (new Render_Lib(\'novo\'))->get_required_path();
		}

		function salvar(){
			$language = new Locale_Lib;
			$'.$file_name.' = new '.$class_name.'_Model();
			if (count($_REQUEST) < 4) {
				$this->error();
				exit();
			} else {

				if( preg_match( \'@<img(.*?)/>@s\', $_REQUEST[\'descricao\'], $matches ) ){
					$exibir = $matches[0];
				} else {
					$exibir = \'\';
				}
			';

				$campos = '$campos = [\'dono\',\'lingua\',';
				$valores = '$valores = [$_REQUEST[\'dono\'],$_REQUEST[\'lingua\'],';

			foreach ($atributes as $key => $value) {
				$atribute = explode(':', $value);
				if (strpos($atribute[0], '-')) {
					$select = explode('-',$atribute[0]);
					$atribute[0] = $select[0];
				}
				if (end($atributes) == $value) {
					$campos .= '\''.$atribute[0].'\'];';
					$valores .= '$_REQUEST[\''.$atribute[0].'\']];';
				} else {
					$campos .= '\''.$atribute[0].'\',';
					$valores .= '$_REQUEST[\''.$atribute[0].'\'],';
				}
			}

			$code .=
			$campos.
			'
			'.
			$valores;
			$code .= '

				if ($'.$file_name.'->insert(\''.$file_name.'\', $campos, $valores)) {
					$time_line = new Timeline_Model;
					$id_'.$file_name.' = $'.$file_name.'->maxId(\''.$file_name.'\')[0];

					$time_line->insert(
					\'timeline\',
					[\'id_cadastro\',\'lingua\',\'titulo\',\'exibir\',\'tipo\',\'dono\',\'sistema\',\'descricao\'],
					[$id_'.$file_name.'->id,$_REQUEST[\'lingua\'], $_REQUEST[\'nome\'], $exibir, \''.$file_name.'\', $_REQUEST[\'dono\'], $_REQUEST[\'sistema\'], $_REQUEST[\'descricao\']]);

					$usuario = new Usuario_Model;
					$usuario_xp = $usuario->select(\'usuarios\',[\'xp\',\'nivel\'],[\'id\',\'=\',$_SESSION[\'id\']])[0];
					$xp = new Xp_Model;
					$xp->gravar_xp($usuario_xp);
					$xp->checar_nivel($usuario_xp);
					header("Location: {$this->visualizar_path}{$id_'.$file_name.'->id}");
				} else {
					header("Location: {$this->novo}?status=erro");
				}
			}
		}

		function visualizar($params=\'\'){
			@session_start();
			$comments = new Disqus_Helper;
			if ($params == \'\' || !is_numeric($params)) {
				header(\'Location:\' . URL_BASE. \''.$file_name.'\');
			}

			$language = new Locale_Lib;
			$tag = new Tags_Lib;
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select(\'usuarios\',\'*\',[\'id\',\'=\',$_SESSION[\'id\']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			$'.$file_name.' = new '.$class_name.'_Model();
			$usuario_atributos = \'u.id as usuario_id, u.nome as usuario_nome, u.pais, u.xp, u.nivel, u.estrelas, u.foto_link, u.capa_link, u.descricao as usuario_descricao\';
			$'.$file_name.'_view = $'.$file_name.'->direct_instruction("SELECT a.*, {$usuario_atributos} FROM '.$file_name.' a, usuarios u WHERE a.id = {$params} and u.login = a.dono", \''.$file_name.' e usuarios\')[0];

			require (new Render_Lib(\'visualizar\'))->get_required_path();
		}

		function editar($params){
			$'.$file_name.' = new '.$class_name.'_Model();
			$'.$file_name.'_view = $'.$file_name.'->direct_instruction("SELECT * FROM '.$file_name.' WHERE id={$params} AND dono=\'{$_SESSION[\'login\']}\'",\''.$file_name.'\');

			if (is_numeric($params) and count($'.$file_name.'_view) == 1) {
				$'.$file_name.' = (new '.$class_name.'_Model())->select(\''.$file_name.'\',\'*\',[ [\'id\',\'=\',$params] ]);
				if (count($'.$file_name.') == 0) {
					header(\'Location: \' . URL_BASE . \'erro/codigo/404\');
				} else {
					$'.$file_name.' = $'.$file_name.'[0];
					$language = new Locale_Lib;
					$tag = new Tags_Lib;
					$form = new Form_Lib;
					$painel = new Painel_Model;
					$usuario = (new Usuario_Model())->select(\'usuarios\',\'*\',[\'id\',\'=\',$_SESSION[\'id\']])[0];
					$time_ago = new Timeago_Helper;
					$sistemas_helper = new Sistemasrpg_Helper();
					$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
					$time_ago = new Timeago_Helper;
					require (new Render_Lib(\'editar\'))->get_required_path();
				}
			} else {
				header(\'Location: \' . URL_BASE . \'erro/codigo/404\');
			}
		}

		function atualizar(){
			if (count($_REQUEST) < 5) {
			header(\'Location: \' . URL_BASE . \'erro/codigo/404\');
			} else {
				$'.$file_name.' = new '.$class_name.'_Model();
				$'.$file_name.'_view = $'.$file_name.'->direct_instruction("SELECT * FROM '.$file_name.' WHERE id={$_REQUEST[\'id\']} AND dono=\'{$_SESSION[\'login\']}\'",\'armas\');
				if (count($'.$file_name.'_view) == 1) {

					if( preg_match( \'@<img(.*?)/>@s\', $_REQUEST[\'descricao\'], $matches ) ){
						$exibir = $matches[0];
					} else {
						$exibir = \'\';
					}
					';

					$campos = '$campos = [';
					$valores = '$valores = [';

				foreach ($atributes as $key => $value) {
					$atribute = explode(':', $value);
					if (strpos($atribute[0], '-')) {
						$select = explode('-',$atribute[0]);
						$atribute[0] = $select[0];
					}
					if (end($atributes) == $value) {
						$campos .= '\''.$atribute[0].'\'];';
						$valores .= '$_REQUEST[\''.$atribute[0].'\']];';
					} else {
						$campos .= '\''.$atribute[0].'\',';
						$valores .= '$_REQUEST[\''.$atribute[0].'\'],';
					}
				}

				$code .=
				$campos.
					'
					'.
				$valores;

				$code .='
					if ($'.$file_name.'->update(\''.$file_name.'\', $campos, $valores, \'id\', $_REQUEST[\'id\'])) {

						$time_line = new Timeline_Model;
						$insrucao = "
							UPDATE timeline
							SET
								lingua		= \'{$_REQUEST[\'lingua\']}\',
								titulo		= \'{$_REQUEST[\'nome\']}\',
								exibir		= \'{$exibir}\',
								tipo 		= \''.$file_name.'\',
								dono 		= \'{$_REQUEST[\'dono\']}\',
								sistema 	= \'{$_REQUEST[\'sistema\']}\',
								descricao 	= \'{$_REQUEST[\'descricao\']}\'
							WHERE
								id_cadastro = {$_REQUEST[\'id\']} AND tipo = \''.$file_name.'\'
						";

						$time_line->direct_instruction($insrucao,\'timeline\');

						header(\'Location: \' . URL_BASE . \''.$file_name.'/visualizar/\'.$_REQUEST[\'id\']);
					} else {
						header(\'Location: \' . URL_BASE . \'erro/codigo/003\');
					}
				} else {
					header(\'Location: \' . URL_BASE . \'erro/codigo/404\');
				}
			}
		}

		function deletar($params = \'\'){
			@session_start();
			if (!isset($_SESSION[\'id\']) and !isset($_SESSION[\'nome\']) and !isset($_SESSION[\'login\']))
			    header("Location: " . URL_BASE);

			$'.$file_name.' = new '.$class_name.'_Model();
			$'.$file_name.'_view = $'.$file_name.'->direct_instruction("SELECT * FROM '.$file_name.' WHERE id={$params} AND dono=\'{$_SESSION[\'login\']}\'",\''.$file_name.'\');

			if ($params == \'\' || !is_numeric($params) || (count($'.$file_name.'_view) == 0)) {
				header(\'Location:\' . URL_BASE. \''.$file_name.'\');
			} else {
				if ($'.$file_name.'->delete(\''.$file_name.'\', [\'id\',\'=\', $params])){
					$time_line = new Timeline_Model;
					$time_line->delete(\'timeline\', [ [\'id_cadastro\', \'=\', $params], [\'tipo\', \'=\', '.$file_name.'] ], 'AND');
					header(\'Location: \' . URL_BASE . \''.$file_name.'?status=deletado!\');
				} else {
					header(\'Location: \' . URL_BASE . \'erro/codigo/003\');
				}
			}
		}

		function error(){
			header(\'Location: \' . URL_BASE . \'erro/codigo/404\');
		}
	}';

		mkdir("{$path}app/controllers/{$file_name}/");
		file_put_contents("{$path}app/controllers/{$file_name}/{$file_name}.class.php", $code);
	}
}