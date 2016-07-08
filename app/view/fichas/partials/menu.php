<?php
// primeira letra maiuscula de um texto minusculo
$HOME = ucfirst(strtolower(HOME));

// menus e urls
$_MENU_LABELS = [$HOME, SHEETS_NPC, SHEETS_MONSTERS];
$_MENU_URLS = [HOME_URL, SHEETS_NPC_URL, SHEETS_MONSTERS_URL];

$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-12']);
	    $tag->h2();
	        $tag->printer(UTILITIES_CHARACTER_SHEETS);
	    $tag->h2;
		
		$tag->printer(HORIZONTAL_BAR);
	    for ($i=0; $i < count($_MENU_URLS); $i++) { 
		    $tag->a(['href'=> $_MENU_URLS[$i]]);
		        $tag->printer($_MENU_LABELS[$i]);
		    $tag->a;
		    $tag->printer(HORIZONTAL_BAR);
	    }
	$tag->div;
	$tag->hr();
$tag->div;