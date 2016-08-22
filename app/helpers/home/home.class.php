<?php

class Home_Helper{
	
	private $tag, $form;

	function __construct(){
		$this->tag = new Tags_Lib;
		$this->form = new Form_Lib;
	}

	function utilitaries_menu(){
		$HOME = ucfirst(strtolower(HOME));
		// menus e urls
		$_MENU_LABELS = [
			$HOME, 
			ROLL_DICE, 
			GENERATOR_NAMES, 
			CHARACTER_SHEETS,
			GENERATOR_ADVENTURE,
			GENERATOR_TAVERN,
			GENERATOR_WORLDS,
			GENERATOR_DUNGEON,
			GENERATOR_PERSONALITIES,
			GENERATOR_CITIES,
			HIGHLIGHTER,
			GENERATOR_ITENS,
			GENERATOR_LUCK,
			GENERATOR_NAME_SWORD
			];

		$_MENU_URLS = [
			HOME_URL, 
			ROLL_DICE_URL, 
			NAMES_URL, 
			RANDOM_FILE_URL,
			GENERATOR_ADVENTURE_URL,
			TAVERN_URL,
			GENERATOR_WORLDS_URL,
			GENERATOR_DUNGEON_URL,
			GENERATOR_PERSONALITIES_URL,
			GENERATOR_CITIES_URL,
			HIGHLIGHTER_URL,
			GENERATOR_ITENS_URL,
			GENERATOR_LUCK_URL,
			GENERATOR_NAME_SWORD_URL
			];

		for ($i=0; $i < count($_MENU_URLS); $i++) { 
		    $this->tag->a(['href'=> $_MENU_URLS[$i], 'class' => 'utilitarios-link']);
		        $this->tag->printer(strtolower($_MENU_LABELS[$i]));
		    $this->tag->a;
		    $this->tag->printer(HORIZONTAL_BAR);
	    }
	}
}