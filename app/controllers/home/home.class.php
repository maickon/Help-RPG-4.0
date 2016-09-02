<?php

class Home_Controller{

	function index(){
		$home = new Home_Model();
		$tag = new Tags_Lib;

		$dados = new Dados_Model;
		$nomes = new Nomes_Model;
		$fichas = new Fichas_Model;
		$geradoraventuras = new GeradorAventuras_Model;
		$tavernas = new Tavernas_Model;

		require (new Render_Lib())->get_required_path();
	}
}