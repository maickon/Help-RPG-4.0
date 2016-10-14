<?php

class Usuario_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$usuario = new Usuario_Model();
		$usuarios = $usuario->select('usuarios');
		require (new Render_Lib())->get_required_path();
	}

	function profile(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		session_start();
		$usuario = new Usuario_Model();
		$usuario = $usuario->select('usuarios', '*', ['id','=',$_SESSION['id']])[0];
		$painel = new Painel_Model;
		require (new Render_Lib('profile'))->get_required_path();
	}

	function feitos(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$armadura = new Armaduras_Model;
		$arma = new Armas_Model;
		$artefato = new Artefatos_Model;
		$aventura = new Aventuras_Model;
		$bestiario = new Bestiario_Model;
		$cenario = new Cenarios_Model;
		$contos = new Contos_Model;
		$cronica = new Cronicas_Model;
		$historia = new Historias_Model;
		$magia = new Magias_Model;
		$pericia = new Pericias_Model;
		$personagem = new Personagens_Model;
		$talento = new Talentos_Model;
		session_start();
		$armaduras_count = $armadura->qtd_max('armaduras', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$armas_count = $arma->qtd_max('armas', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$artefatos_count = $artefato->qtd_max('artefatos', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$aventuras_count = $aventura->qtd_max('aventuras', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$bestiario_count = $bestiario->qtd_max('bestiario', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$cenarios_count = $cenario->qtd_max('cenarios', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$contos_count = $contos->qtd_max('contos', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$cronicas_count = $cronica->qtd_max('cronicas', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$historias_count = $historia->qtd_max('historias', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$magias_count = $magia->qtd_max('magias', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$pericias_count = $pericia->qtd_max('pericias', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$personagens_count = $personagem->qtd_max('personagens', 'dono = "'.$_SESSION['nome'].'"')['count'];
		$talentos_count = $talento->qtd_max('talentos', 'dono = "'.$_SESSION['nome'].'"')['count'];
		
		$counts = [
					'ARMADURAS'=>$armaduras_count,
					'ARMAS'=>$armas_count,
					'ARTEFATOS'=>$artefatos_count,
					'AVENTURAS'=>$aventuras_count,
					'BESTIÁRIO'=>$bestiario_count,
					'CENÁRIOS'=>$cenarios_count,
					'CONTOS'=>$contos_count,
					'CRÔNICAS'=>$cronicas_count,
					'HISTÓRIAS'=>$historias_count,
					'MAGIAS'=>$magias_count,
					'PERÍCIAS'=>$pericias_count,
					'PERSONAGENS'=>$personagens_count,
					'TALENTOS'=>$talentos_count
				];
		require (new Render_Lib('feitos'))->get_required_path();
	}		
}