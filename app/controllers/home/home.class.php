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
		$tempo = new Tempo_Model();
		$nomedeespadas = new Nomedeespadas_Model();
		
		// usuarios registrados
		$usuario = new Usuario_Model();
		$usuarios_registrados = $usuario->qtd_max('usuarios')->count;

		// armaduras registradas
		$armadura = new Armaduras_Model();
		$armaduras_registradas = $armadura->qtd_max('armaduras')->count;
		
		// armas registradas 
		$arma = new Armas_Model();
		$armas_registradas = $arma->qtd_max('armas')->count;

		// artefatos registrados
		$artefato = new Artefatos_Model();
		$artefatos_registrados = $artefato->qtd_max('artefatos')->count;

		// personagens do tipo jogador registrados
		$personagem_jogador = new Personagens_Model();
		$personagens_jogadores_registrados = $personagem_jogador->qtd_max('personagens', 'tipo = \'Personagem jogador\'')->count;

		// personagens do tipo monstros registrados
		$personagem_monstro = new Personagens_Model();
		$personagens_monstros_registrados = $personagem_monstro->qtd_max('personagens', 'tipo = \'Monstro\'')->count;

		// talentos registrados
		$talento = new Talentos_Model();
		$talentos_registrados = $talento->qtd_max('talentos')->count;

		// magias registradas
		$magia = new Magias_Model();
		$magias_registradas = $talento->qtd_max('magias')->count;

		// pericias registradas
		$pericia = new Pericias_Model();
		$pericias_registradas = $pericia->qtd_max('pericias')->count;

		// aventuras registradas
		$aventura = new Aventuras_Model();
		$aventuras_registradas = $aventura->qtd_max('aventuras')->count;

		// historias registradas
		$historia = new Historias_Model();
		$historias_registradas = $historia->qtd_max('historias')->count;

		// contos registrados
		$conto = new Contos_Model();
		$contos_registrados = $conto->qtd_max('contos')->count;

		// cronicas registradas
		$cronica = new Cronicas_Model();
		$cronicas_registradas = $cronica->qtd_max('cronicas')->count;

		// cenarios registrados
		$cenario = new Cenarios_Model();
		$cenarios_registrados = $cenario->qtd_max('cenarios')->count;

		// bestiarios registrados
		$bestiario = new Bestiario_Model();
		$bestiarios_registrados = $bestiario->qtd_max('bestiario')->count;

		require (new Render_Lib())->get_required_path();
	}
}