<?php

class Home_Controller{

	function index(){
		$home = new Home_Model();
		$tag = new Tags_Lib;

		$dados = new Dados_Model;
		$nomes = new Nomes_Model;
		$fichas = new Fichas_Model;
		$geradoraventuras = new GeradorAventuras_Model;
		$mundos = new Mundos_Model;
		$masmorras = new Masmorras_Model;
		$tavernas = new Tavernas_Model;
		$masmorras = new Masmorras_Model;
		$personalidades = new Personalidades_Model;
		$cidades = new Cidades_Model;
		$marcadores = new Marcadores_Model();
		$itens = new Itens_Model();
		$sorte = new Sorte_Model();
		
		require (new Render_Lib())->get_required_path();
	}
}