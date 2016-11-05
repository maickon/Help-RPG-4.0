<?php

class Home_Helper{
	
	private $tag, $form;

	function __construct(){
		$this->tag = new Tags_Lib;
		$this->form = new Form_Lib;
		$this->language = new Locale_Lib();
	}

	function utilitaries_menu(){
		$HOME = ucfirst(strtolower($this->language->MENU_HOME));
		// menus e urls
		$_MENU_LABELS = [
			$HOME, 
			$this->language->MENU_ROLL_DICE, 
			$this->language->MENU_GENERATOR_NAMES, 
			$this->language->MENU_CHARACTER_SHEETS,
			$this->language->MENU_GENERATOR_ADVENTURE,
			$this->language->MENU_GENERATOR_TAVERN,
			$this->language->MENU_GENERATOR_WORLDS,
			$this->language->MENU_GENERATOR_DUNGEON,
			$this->language->MENU_GENERATOR_PERSONALITIES,
			$this->language->MENU_GENERATOR_CITIES,
			$this->language->MENU_HIGHLIGHTER,
			$this->language->MENU_GENERATOR_ITENS,
			$this->language->MENU_GENERATOR_LUCK,
			$this->language->MENU_GENERATOR_NAME_SWORD
			];

		$_MENU_URLS = [
			URL_BASE , 
			URL_BASE . 'dados', 
			URL_BASE . 'nomes', 
			URL_BASE . 'fichas',
			URL_BASE . 'geradorAventuras',
			URL_BASE . 'tavernas',
			URL_BASE . 'mundos',
			URL_BASE . 'masmorras',
			URL_BASE . 'personalidades',
			URL_BASE . 'cidades',
			URL_BASE . 'marcadores',
			URL_BASE . 'itens',
			URL_BASE . 'sorte',
			URL_BASE . 'nomedeespadas'
			];

		for ($i=0; $i < count($_MENU_URLS); $i++) { 
		    $this->tag->a(['href'=> $_MENU_URLS[$i], 'class' => 'utilitarios-link']);
		        $this->tag->printer(strtolower($_MENU_LABELS[$i]));
		    $this->tag->a;
		    $this->tag->printer($this->language->SITE_HORIZONTAL_BAR);
	    }
	}
}