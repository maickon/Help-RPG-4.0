<?php
class Notificacoes_Model extends HelperRecord_Lib{

	public $url;
	
	function __construct(){
		parent::__construct();	
		$this->url = new Model_Lib();
	}

	function notificador_de_amizades(){
		$amizades = new Amizades_Model;
		return $amizades->direct_instruction("
			SELECT a.*, u.nome
			FROM amizades a, usuarios u 
			WHERE a.para = {$_SESSION['id']} 
			AND u.id = a.de
			AND visualizado = 0", 'amizades e usuarios');
	}

	function escalonador_de_noticifacoes(){
		return $this->notificador_de_amizades();
	}
}