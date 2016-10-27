<?php

class Sorte_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$language = new Locale_Lib;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		$sorte = new Sorte_Model;
		require (new Render_Lib())->get_required_path();
	}

	function service($params){
		$language = new Locale_Lib;
		$sorte = new Sorte_Model;
		$titulo = null;

		$tipos = [
			'tipo1' 	=> $language->LUCK_LABEL,
			'tipo2'		=> $language->LUCK_YOU_LABEL,
			'tipo3'		=> $language->LUCK_YOU_LOVE_LABEL,
			'tipo4' 	=> $language->LUCK_YOUR_BEST_FRIEND_LABEL,
			'tipo5'		=> $language->LUCK_NEXT_PERSON_LABEL,
			'tipo6' 	=> $language->LUCK_ENEMY_LABEL,
			'tipo7' 	=> $language->LUCK_HIS_RIVAL_LABEL,
			'tipo8'		=> $language->LUCK_FAMILY_LABEL,
			'tipo9'		=> $language->LUCK_NEXT_TOUCH_PEOPLE_LABEL,
			'tipo10'	=> $language->LUCK_TO_BUMP_LABEL,
			'tipo11'	=> $language->LUCK_TO_KNOW_LABEL,
			'tipo12'	=> $language->LUCK_WOMAN_LABEL,
			'tipo13'	=> $language->LUCK_MAN_LABEL
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