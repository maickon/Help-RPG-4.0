<?php

Class Tavernas_Controller{
	
	function index(){
		$tag = new Tags_Lib;
		$home_helper = new Home_Helper();
		require (new Render_Lib())->get_required_path();
	}

	function service($param){
		$taverna = $this->$param();
		echo json_encode($taverna);
	}

	function medieval(){
		$taverna = new Tavernas_Model();
		$taverna_medieval = [
			'taverna_nome' => $taverna->get_taverna_nome(),
			'taverneiro_nome' => TAVERN_OWNER . $taverna->get_nome(),
			'taverneiro_raca' => TAVERN_RACE . $taverna->get_raca(),
			'taverneiro_idade' => TAVERN_WITH . $taverna->get_idade() . TAVERN_YEARS,
			'taverneiro_profissao' => $taverna->get_tempo_profissao(),
			'personalidade_titulo' => TAVERN_PERSONALITY_TITLE,
			'taverneiro_personalidade' => $taverna->get_personalidade(),
			'aparencia_titulo' => TAVERN_APPEARANCE_TITLE,
			'taverneiro_aparencia' => $taverna->get_aparencia(),
			'comidas_titulo' => TAVERN_SOME_FOOD_TITLE,
			'taverna_carnes' => $taverna->get_carnes(),
			'taverna_frutas' => $taverna->get_frutas(),
			'taverna_legumes' => $taverna->get_legumes(),
			'taverna_verduras' => $taverna->get_verduras(),
			'bebidas_titulo' => TAVERN_SOME_DRINKS_TITLE,
			'taverna_bebidas' => $taverna->get_bebidas()

		];
		return $taverna_medieval;
	}

	function bar(){
		$taverna = new Tavernas_Model();
		$taverna_medieval = [
			'taverna_nome' => $taverna->get_taverna_nome(),
			'taverneiro_nome' => TAVERN_OWNER . $taverna->get_nome(),
			'taverneiro_raca' => TAVERN_RACE . $taverna->get_raca(),
			'taverneiro_idade' => TAVERN_WITH . $taverna->get_idade() . TAVERN_YEARS,
			'taverneiro_profissao' => $taverna->get_tempo_profissao(),
			'personalidade_titulo' => TAVERN_PERSONALITY_TITLE,
			'taverneiro_personalidade' => $taverna->get_personalidade(),
			'aparencia_titulo' => TAVERN_APPEARANCE_TITLE,
			'taverneiro_aparencia' => $taverna->get_aparencia(),
			'comidas_titulo' => TAVERN_SOME_FOOD_TITLE,
			'taverna_carnes' => $taverna->get_carnes(),
			'taverna_frutas' => $taverna->get_frutas(),
			'taverna_legumes' => $taverna->get_legumes(),
			'taverna_verduras' => $taverna->get_verduras(),
			'bebidas_titulo' => TAVERN_SOME_DRINKS_TITLE,
			'taverna_bebidas' => $taverna->get_bebidas()

		];
		return $taverna_medieval;

	}

	function restaurante(){

	}

	function botequim(){

	}

	function pub(){

	}

	function saloom(){

	}
}