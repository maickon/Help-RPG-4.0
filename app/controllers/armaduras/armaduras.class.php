<?php
class Armaduras_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$armadura = new Armaduras_Model();
		$painel = new Painel_Model;
		$armaduras = $armadura->select('armaduras');
		require (new Render_Lib())->get_required_path();
	}		

	function novo(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$sistemas_helper = new Sistemasrpg_Helper();
		$armaduras_helper = new Armaduras_Helper;
		require (new Render_Lib('novo'))->get_required_path();
	}

	function salvar(){
		$armadura = new Armaduras_Model();
		if (count($_REQUEST) < 4) {
			$this->error();
			exit();
		} else {
			$campos = ['nome','sistema','descricao'];
			$valores= [$_REQUEST['nome'],$_REQUEST['sistema'],$_REQUEST['descricao']];
			if ($armadura->insert('armaduras', $campos, $valores)) {
				$armadura = $armadura->maxId('armaduras')[0];
				header("Location: {$this->visualizar_path}{$armadura['id']}");
			} else {
				header("Location: {$this->novo}?status=erro");
			}
		}
	}

	function visualizar($params){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$armadura = new Armaduras_Model();
		$armadura_view = $armadura->select('armaduras', '*', ['id', '=', $params])[0];
		require (new Render_Lib('visualizar'))->get_required_path();
	}

	function error(){
		echo '<center><h1>PÁGINA NÃO EXISTE!</h1></center>';
	}
}