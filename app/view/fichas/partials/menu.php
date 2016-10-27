<?php
// menus e urls
$_MENU_LABELS = [$language->NAME_SHEETS_NPC, $language->NAME_SHEETS_MONSTERS];
$_MENU_URLS = [SHEETS_NPC_URL, SHEETS_MONSTERS_URL];

$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-12']);
	    $tag->h2();
	        $tag->printer($language->SHEETS_UTILITIES_CHARACTER);
	    $tag->h2;
		
		$tag->printer($language->SITE_HORIZONTAL_BAR);
	    for ($i=0; $i < count($_MENU_URLS); $i++) { 
		    $tag->a(['href'=> $_MENU_URLS[$i], 'class' => 'utilitarios-link']);
		        $tag->printer($_MENU_LABELS[$i]);
		    $tag->a;
		    $tag->printer($language->SITE_HORIZONTAL_BAR);
	    }

	    $tag->br();

		$tag->printer($language->SITE_HORIZONTAL_BAR);
	    $home_helper->utilitaries_menu();
	$tag->div;
	$tag->hr();
$tag->div;