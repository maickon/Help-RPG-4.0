<?php

class Notificacoes_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function notificacoes_de_amizade(){
		session_start();
		$amizades = new Amizades_Model;
		// SELECT * FROM `usuarios` where id = 1 ORDER BY id DESC LIMIT 10 
		$amizades->select('amizades','*', [ ['id_usuario_requisitante', '=', $_SESSION['id']], ['ORDER BY ',''] ])
	}
}