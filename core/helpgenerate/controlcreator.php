<?php

class ControlCreator{

	function __construct($path, $class_name){
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
			$painel = new Painel_Model;
			$usuario = (new Usuario_Model())->select(\'usuarios\',\'*\',[\'id\',\'=\',$_SESSION[\'id\']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
			
			$'.$file_name.' = new '.$class_name.'_Model;
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
			$usuario = (new Usuario_Model())->select(\'usuarios\','*',[\'id\',\'=\',$_SESSION[\'id\']])[0];
			$time_ago = new Timeago_Helper;
			$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();

			$'.$file_name.' = new '.$class_name.'_Model;
			require (new Render_Lib(\'novo\'))->get_required_path();
		} 

		function salvar(){
			$language = new Locale_Lib;
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

			require (new Render_Lib(\'visualizar\'))->get_required_path();
		}

		function editar($params){
			@session_start();
			if (!isset($_SESSION[\'id\']) and !isset($_SESSION[\'nome\']) and !isset($_SESSION[\'login\']))
			    header(\'Location:\' . URL_BASE);
		}

		function atualizar(){

		}

		function error(){
			header(\'Location: \' . URL_BASE . \'erro/codigo/404\');
		}
	}';

		mkdir("{$path}app/controllers/{$file_name}/");
		file_put_contents("{$path}app/controllers/{$file_name}/{$file_name}.class.php", $code);
	}
}