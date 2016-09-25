<?php

class Nomedeespadas_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		$nomedeespadas = new Nomedeespadas_Model;
		require (new Render_Lib())->get_required_path();
	}

	function service($params){
		if (!is_numeric($params)) {
			$this->error();
		} else{
			$nomedeespadas = new Nomedeespadas_Model;
			$label = null;

			if ($params > 1) {
				$label = SWORD_NAME_LABEL_PLURAL;
			} elseif ($params == 1) {
				$label = SWORD_NAME_LABEL_SINGULAR;
			}
			
			$primeiro_nome = (new Raffleitemfile_Lib("{$nomedeespadas->primeiro_nome_path}", $params))->getRaffleItens();	
			$segundo_nome = (new Raffleitemfile_Lib("{$nomedeespadas->segundo_nome_path}", $params))->getRaffleItens();	
			
			if (is_array($primeiro_nome)) {
				for($i=0; $i<count($primeiro_nome); $i++) {
					$descricao[] = "{$primeiro_nome[$i]} {$segundo_nome[$i]}";
				}
			} else {
				$descricao = "{$primeiro_nome} {$segundo_nome}";
			}

			$nomes = ['titulo' => $label, 'descricao' => $descricao];
		
			// echo '<pre>';
			// print_r($nome);
			echo json_encode($nomes);
		}
	}

	function error(){
		echo '<center><h1>Error 404 - Página não encontrada.</h1></center>';
	}
}