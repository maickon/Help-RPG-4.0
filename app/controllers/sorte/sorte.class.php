<?php

class Sorte_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		$sorte = new Sorte_Model;
		require (new Render_Lib())->get_required_path();
	}

	function service($params){
		$sorte = new Sorte_Model;
		$titulo = null;

		$tipos = [
			'tipo1' 	=> LUCK_LABEL,
			'tipo2'		=> YOU_LUCK_LABEL,
			'tipo3'		=> YOU_LOVE_LUCK_LABEL,
			'tipo4' 	=> YOUR_BEST_FRIEND_LUCK_LABEL,
			'tipo5'		=> NEXT_PERSON_LUCK_LABEL,
			'tipo6' 	=> ENEMY_LUCK_LABEL,
			'tipo7' 	=> HIS_RIVAL_LUCK_LABEL,
			'tipo8'		=> FAMILY_LUCK_LABEL,
			'tipo9'		=> NEXT_TOUCH_PEOPLE_LUCK_LABEL,
			'tipo10'	=> TO_BUMP_LUCK_LABEL,
			'tipo11'	=> TO_KNOW_LUCK_LABEL,
			'tipo12'	=> WOMAN_LUCK_LABEL,
			'tipo13'	=> MAN_LUCK_LABEL
    	];

    	$indice = rand(1, (count($tipos)));
    	if ($params[0] == 'tipo1') {
    		$titulo = $tipos["tipo{$indice}"];
    	} else {
    		$titulo = $tipos[$params[0]];
    	}

		if (is_array($params)) {
			$nome = (new Raffleitemfile_Lib("{$sorte->acontecimento_path}", $params[1]))->getRaffleItens();	
			$nomes = ['titulo' => $titulo, 'descricao' => $nome];
		} else {
			$nome = (new Raffleitemfile_Lib("{$sorte->acontecimento_path}", 1))->getRaffleItens();
			$nomes = ['titulo' => $tipos[$params], 'descricao' => $nome];
		}
		// echo '<pre>';
		// print_r($nome);
		echo json_encode($nomes);
	}
}