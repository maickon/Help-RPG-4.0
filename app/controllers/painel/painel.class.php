<?php

class Painel_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		session_start();
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$language = new Locale_Lib;
		$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
		$time_ago = new Timeago_Helper;
		$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
		$time_line = (new Timeline_Model())->select('timeline');
		require (new Render_Lib())->get_required_path();
	}

	function cadastros(){
		session_start();
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		$language = new Locale_Lib;
		$usuario = (new Usuario_Model())->select('usuarios','*',['id','=',$_SESSION['id']])[0];
		$time_ago = new Timeago_Helper;
		$notificacoes = (new Notificacoes_Model())->escalonador_de_noticifacoes();
		$cadastros = [
						['nome'=>$language->MENU_ARMOR, 'link'=>URL_BASE . 'armaduras/'],
						['nome'=>$language->MENU_ARTIFACTS, 'link'=>URL_BASE . 'artefatos/'],
						['nome'=>$language->MENU_WEAPONS, 'link'=>URL_BASE . 'armas/'],
						['nome'=>$language->MENU_SPELLS, 'link'=>URL_BASE . 'magias/'],
						['nome'=>$language->MENU_TALENTS, 'link'=>URL_BASE . 'talentos/'],
						['nome'=>$language->MENU_SKILLS, 'link'=>URL_BASE . 'pericias/'],
						['nome'=>$language->MENU_STORIES, 'link'=>URL_BASE . 'historias/'],
						['nome'=>$language->MENU_ADVENTURES, 'link'=>URL_BASE . 'aventuras/'],
						['nome'=>$language->MENU_TALES, 'link'=>URL_BASE . 'contos/'],
						['nome'=>$language->MENU_CHRONICLES, 'link'=>URL_BASE . 'cronicas/'],
						['nome'=>$language->MENU_SCENARIO, 'link'=>URL_BASE . 'cenarios/'],
						['nome'=>$language->MENU_BESTIARY, 'link'=>URL_BASE . 'bestiario/'],
						['nome'=>$language->MENU_FILE_MONSTERS, 'link'=>URL_BASE . 'fichas_npc/'],
						['nome'=>$language->MENU_FILE_NPC_CHARACTER, 'link'=>URL_BASE . 'fichas_jogador/']
					];

		require (new Render_Lib())->get_required_path('cadastros');
	}		

	function armaduras(){
		$armadura = new Armaduras_Model();
		$armaduras = $armadura->select('armaduras');
	}
}