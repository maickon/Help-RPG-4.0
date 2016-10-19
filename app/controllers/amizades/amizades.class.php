<?php

class Amizades_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function pedido($params = ''){
		$erro_msg = 'Um erro acorreu. A amizade não pode ser concluida.';
		if (is_array($params)) {
			$pedido_de_amizade = new Amizades_Model;
			$colunas = ['id_usuario_requisitante','id_usuario_requisitado'];
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
			$colunas = ['id_usuario_requisitante','id_usuario_requisitado'];
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

	function listar(){
		session_start();
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$usuario = new Usuario_Model;
		$amizade = new Amizades_Model;
		$amigos = $amizade->getConn()->prepare("SELECT u.* FROM usuarios u, amizades a WHERE id_usuario_requisitante = 106 and status = 'aprovado' and u.id = a.id_usuario_requisitado");
		$amigos->execute();
		$amigos = $amigos->fetchAll(PDO::FETCH_OBJ);
		require (new Render_Lib('listar'))->get_required_path();
	}
}