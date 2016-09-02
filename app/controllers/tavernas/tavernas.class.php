<?php

Class Tavernas_Controller{
	
	function index(){
		$taverna = new Tavernas_Model();
		$tag = new Tags_Lib;
		$home_helper = new Home_Helper();
		require (new Render_Lib())->get_required_path();
	}

	function service($param){
		if (method_exists($this, $param)) {
			$taverna = $this->$param();
			echo json_encode($taverna);
		} else {
			$this->error();
		}
	}

	function medieval(){
		$taverna = new Tavernas_Model();
		$raca = $taverna->taverna_raca_taverneiro();
		$idade_taverneiro = $taverna->taverna_idade_taverneiro($raca);
		$taverna_medieval = [
			'taverna_nome' => $taverna->taverna_nome(),
			'taverneiro_nome' => TAVERN_OWNER . $taverna->taverna_nome_taverneiro(),
			'taverneiro_raca' => TAVERN_RACE . $raca,
			'taverneiro_idade' => TAVERN_WITH . $idade_taverneiro . TAVERN_YEARS,
			'taverneiro_profissao' => $taverna->taverna_tempo_de_profissao($idade_taverneiro),
			'garcon_personalidade_titulo' => '',
			'garcon_personalidade' => '',
			'personalidade_titulo' => TAVERN_PERSONALITY_TITLE,
			'taverneiro_personalidade' => $taverna->taverna_personalidade_taverneiro(rand(2,4)),
			'aparencia_titulo' => TAVERN_APPEARANCE_TITLE,
			'taverneiro_aparencia' => $taverna->taverna_aparencia_taverneiro(rand(2,3)),
			'comidas_titulo' => TAVERN_SOME_FOOD_TITLE,
			'taverna_carnes' => $taverna->taverna_carnes(rand(2,3)),
			'taverna_frutas' => $taverna->taverna_frutas(rand(2,3)),
			'taverna_legumes' => $taverna->taverna_legumes(rand(2,3)),
			'taverna_verduras' => $taverna->taverna_verduras(rand(2,3)),
			'taverna_porcoes' => '',
			'taverna_petiscos' => '',
			'pratos_titulo' => '',
			'taverna_pratos' => '',
			'sobremesa_titulo' => '',
			'taverna_sobremesas' => '',
			'bebidas_titulo' => TAVERN_SOME_DRINKS_TITLE,
			'taverna_bebidas' => $taverna->taverna_bebidas(rand(2,3)),
			'taverna_bebidas_simples' => '',
			'taverna_bebidas_cervejas' => '',
			'taverna_bebidas_quentes' => '',
			'objetos_briga_titulo' => TAVERN_SOME_FIGTH_OBJECTS_TITLE,
			'taverna_objetos_briga' => $taverna->taverna_objetos_de_briga(rand(2,3)),
			'atracao_titulo' => TAVERN_AN_ATTRACTION_TITLE,
			'taverna_atracao' => $taverna->taverna_atracao_medieval(1),

		];
		return $taverna_medieval;
	}

	function bar(){
		$taverna = new Tavernas_Model();
		$taverna_medieval = [
			'taverna_nome' => $taverna->taverna_bar_nome(),
			'taverneiro_nome' => TAVERN_OWNER . $taverna->taverna_nome_taverneiro(),
			'taverneiro_raca' => '',
			'taverneiro_idade' => TAVERN_WITH . rand(22,100) . TAVERN_YEARS,
			'taverneiro_profissao' => '',
			'garcon_personalidade_titulo' => '',
			'garcon_personalidade' => '',
			'personalidade_titulo' => TAVERN_PERSONALITY_TITLE,
			'taverneiro_personalidade' => $taverna->taverna_personalidade_taverneiro(rand(3,4)),
			'aparencia_titulo' => TAVERN_APPEARANCE_TITLE,
			'taverneiro_aparencia' => $taverna->taverna_aparencia_taverneiro(rand(3,4)),
			'comidas_titulo' => TAVERN_SOME_FOOD_TITLE,
			'taverna_carnes' => '',
			'taverna_frutas' => '',
			'taverna_legumes' => '',
			'taverna_verduras' => '',
			'taverna_porcoes' => $taverna->taverna_porcoes(rand(2,6)),
			'taverna_petiscos' => $taverna->taverna_petiscos(rand(2,6)),
			'pratos_titulo' => '',
			'taverna_pratos' => '',
			'sobremesa_titulo' => '',
			'taverna_sobremesas' => '',
			'bebidas_titulo' => TAVERN_SOME_DRINKS_TITLE,
			'taverna_bebidas' => '',
			'taverna_bebidas_simples' => $taverna->taverna_bebidas_simples(rand(2,6)),
			'taverna_bebidas_cervejas' => $taverna->taverna_cervejas(rand(2,8)),
			'taverna_bebidas_quentes' => $taverna->taverna_bebidas_bar_ou_restaurante(rand(2,6)),
			'objetos_briga_titulo' => '',
			'taverna_objetos_briga' => '',
			'atracao_titulo' => TAVERN_AN_ATTRACTION_TITLE,
			'taverna_atracao' => $taverna->taverna_artista() . TAVERN_PLAYING_TITLE . $taverna->taverna_atracao_conteporanea(1)
		];
		return $taverna_medieval;

	}

	function restaurante(){
		$taverna = new Tavernas_Model();
		$taverna_medieval = [
			'taverna_nome' => $taverna->taverna_restaurante_nome(),
			'taverneiro_nome' => TAVERN_OWNER . $taverna->taverna_nome_taverneiro(),
			'taverneiro_raca' => '',
			'taverneiro_idade' => TAVERN_WITH . rand(22,100) . TAVERN_YEARS,
			'taverneiro_profissao' => '',
			'garcon_personalidade_titulo' => TAVERN_GARCON_PERSONALITY_TITLE,
			'garcon_personalidade' => $taverna->taverna_garcon(rand(2,3)),
			'personalidade_titulo' => '',
			'taverneiro_personalidade' => $taverna->taverna_personalidade_taverneiro(rand(2,4)),
			'aparencia_titulo' => '',
			'taverneiro_aparencia' => '',
			'comidas_titulo' => TAVERN_SOME_FOOD_TITLE,
			'taverna_carnes' => '',
			'taverna_frutas' => '',
			'taverna_legumes' => '',
			'taverna_verduras' => '',
			'taverna_porcoes' => $taverna->taverna_porcoes(rand(2,6)),
			'taverna_petiscos' => '',
			'pratos_titulo' => TAVERN_PLATES_TITLE,
			'taverna_pratos' => $taverna->taverna_pratos(rand(3,8)),
			'sobremesa_titulo' => TAVERN_DESSERT_TITLE,
			'taverna_sobremesas' => $taverna->taverna_sobremesas(rand(2,3)),
			'bebidas_titulo' => TAVERN_SOME_DRINKS_TITLE,
			'taverna_bebidas' => '',
			'taverna_bebidas_simples' => $taverna->taverna_bebidas_simples(rand(2,6)),
			'taverna_bebidas_cervejas' => $taverna->taverna_cervejas(rand(2,8)),
			'taverna_bebidas_quentes' => $taverna->taverna_bebidas_bar_ou_restaurante(rand(2,6)),
			'objetos_briga_titulo' => '',
			'taverna_objetos_briga' => '',
			'atracao_titulo' => '',
			'taverna_atracao' => ''
		];
		return $taverna_medieval;
	}

	function botequim(){
		$taverna = new Tavernas_Model();
		$taverna_medieval = [
			'taverna_nome' => $taverna->taverna_bar_nome(),
			'taverneiro_nome' => TAVERN_OWNER . $taverna->taverna_nome_taverneiro(),
			'taverneiro_raca' => '',
			'taverneiro_idade' => TAVERN_WITH . rand(22,100) . TAVERN_YEARS,
			'taverneiro_profissao' => '',
			'garcon_personalidade_titulo' => '',
			'garcon_personalidade' => '',
			'personalidade_titulo' => '',
			'taverneiro_personalidade' => $taverna->taverna_personalidade_taverneiro(rand(2,4)),
			'aparencia_titulo' => '',
			'taverneiro_aparencia' => '',
			'comidas_titulo' => TAVERN_SOME_FOOD_TITLE,
			'taverna_carnes' => '',
			'taverna_frutas' => '',
			'taverna_legumes' => '',
			'taverna_verduras' => '',
			'taverna_porcoes' => $taverna->taverna_porcoes(rand(2,6)),
			'taverna_petiscos' => '',
			'pratos_titulo' => '',
			'taverna_pratos' => '',
			'sobremesa_titulo' => '',
			'taverna_sobremesas' => '',
			'bebidas_titulo' => TAVERN_SOME_DRINKS_TITLE,
			'taverna_bebidas' => '',
			'taverna_bebidas_simples' => $taverna->taverna_bebidas_simples(rand(2,6)),
			'taverna_bebidas_cervejas' => $taverna->taverna_cervejas(rand(2,8)),
			'taverna_bebidas_quentes' => $taverna->taverna_bebidas_bar_ou_restaurante(rand(2,6)),
			'objetos_briga_titulo' => TAVERN_SOME_FIGTH_OBJECTS_TITLE,
			'taverna_objetos_briga' => $taverna->taverna_objetos_de_briga(rand(2,3)),
			'atracao_titulo' => TAVERN_AN_ATTRACTION_TITLE,
			'taverna_atracao' => $taverna->taverna_artista() . TAVERN_PLAYING_TITLE . $taverna->taverna_atracao_conteporanea(1)
		];
		return $taverna_medieval;
	}

	function pub(){

	}

	function saloom(){

	}

	function error(){
		echo '<center><h1>ERROR 404</h1></center><p>Página não encontrada.</p>';
	}
}