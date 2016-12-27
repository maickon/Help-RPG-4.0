<?php
class Notificacoes_Model extends HelperRecord_Lib{

	public $url;

	function __construct(){
		parent::__construct();
		$this->url = new Model_Lib();
	}

	function escalonador_de_noticifacoes(){
		$ultimo_acesso = $_SESSION['ultimo_login'];
		$login = $_SESSION['login'];
		$data_atual =date('Y-m-d H:i:s');
		$timeline = new Timeline_Model;
		$notificacoes = $timeline->direct_instruction("SELECT * FROM timeline WHERE dono != '{$login}' AND cadastrado_em BETWEEN '{$ultimo_acesso}' AND '{$data_atual}' ORDER BY cadastrado_em DESC",'timeline');
		return $notificacoes;
	}
}