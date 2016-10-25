<?php

class Amizades_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function pedido($params = ''){
		$erro_msg = 'Um erro acorreu. A amizade não pode ser concluida.';
		if (is_array($params)) {
			$pedido_de_amizade = new Amizades_Model;
			$notificacao = new Notificacoes_Model;
			$colunas = ['de','para'];
			$valores = [$params[0], $params[1]];
			$verificar_amizade = $pedido_de_amizade->select('amizades','*', [ [$colunas[0], '=', $valores[0]], [$colunas[1], '=', $valores[1]] ], 'AND');
	
			if (count($verificar_amizade) == 1) {
				header('Location: ' . URL_BASE . 'erro/codigo/404');
			} else {
				if ($pedido_de_amizade->insert('amizades', $colunas, $valores)) {
					return true;
				} else {
					header('Location: ' . URL_BASE . 'erro/msg/' . $erro_msg);
				}
			}
		} else {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}

	function desfazer($params){
		$erro_msg = 'Um erro acorreu. A amizade não pode ser desfeita.';
		if (is_array($params)) {
			$pedido_de_amizade = new Amizades_Model;
			$colunas = ['de','para'];
			$valores = [$params[0], $params[1]];
	
			if ($pedido_de_amizade->delete('amizades', [ [$colunas[0], '=', $valores[0]], [$colunas[1], '=', $valores[1]] ], 'AND')) {
				return true;
			} else {
				header('Location: ' . URL_BASE . 'erro/msg/' . $erro_msg);
			}
		} else {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}

	function aceitar_amizade($params){
		$erro_msg = 'Um erro acorreu. A amizade não pode ser aceita.';
		if (is_array($params)) {
			$amizade = new Amizades_Model;
			$update = 'UPDATE amizades';
			$set = "SET status = 'aprovado', visualizado = 1";
			$where = "WHERE de = {$params[0]}";	//de
			$and = "AND para = {$params[1]}";	//para
			if ($amizade->direct_instruction("{$update} {$set} {$where} {$and}")){
				return true;
			} else {
				header('Location: ' . URL_BASE . 'erro/msg/' . $erro_msg);
			}
		} else {
			header('Location: ' . URL_BASE . 'erro/codigo/404');
		}
	}

	function listar(){
		session_start();
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$usuario = new Usuario_Model;
		$time_ago = new Timeago_Helper;
		$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
		$amizade = new Amizades_Model;
		$amigos = $amizade->direct_instruction("
			SELECT u.id, u.email, u.login, u.foto_link, a.* FROM amizades a, usuarios u WHERE a.de = {$_SESSION['id']} AND a.para = u.id AND a.status = 'aprovado'
			UNION All
			SELECT u.id, u.email, u.login, u.foto_link, a.* FROM amizades a, usuarios u WHERE a.para = {$_SESSION['id']} AND a.de = u.id AND a.status = 'aprovado'", 'usuarios e amizades');
		require (new Render_Lib('listar'))->get_required_path();
	}

	function filtrar($filtro = ''){
		session_start();
		$amizade = new Amizades_Model;
		$select = 'SELECT u.*';
		$from = 'FROM usuarios u, amizades a';
		$where = 'WHERE a.id_usuario_requisitante = '.$_SESSION['id'];
		$and_1 = 'AND a.status = \'aprovado\'';
		$and_2 = 'AND u.id = a.id_usuario_requisitado ';
		$and_3 = 'AND u.nome LIKE \'%'.$filtro.'%\'';
		$and_4 = 'AND u.login LIKE \'%'.$filtro.'%\'';
		$and_5 = 'OR u.sexo LIKE \'%'.$filtro.'%\'';
		$and_6 = 'OR u.data_nascimento LIKE \'%'.$filtro.'%\'';
		$and_7 = 'OR u.cidade LIKE \'%'.$filtro.'%\'';
		$and_8 = 'OR u.estado LIKE \'%'.$filtro.'%\'';
		$and_9 = 'OR u.pais LIKE \'%'.$filtro.'%\'';
	
		$amigos = $amizade->direct_instruction("{$select} {$from} {$where} {$and_1} {$and_2} {$and_3}", 'usuarios e amizades');
		$toJason = json_encode($amigos);
		echo $toJason;
	}
}