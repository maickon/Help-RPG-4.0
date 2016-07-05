<?php
// primeira letra maiuscula de um texto minusculo
$HOME = ucfirst(strtolower(HOME));

// menus e urls
$_MENU_LABELS = [$HOME, NAME_PLACES, NAME_CLASS, NAME_RACES, NAME_CULTURAL, NAME_OTHERS];
$_MENU_URLS = [HOME_URL, NAME_PLACES_URL, NAME_CLASS_URL, NAME_RACES_URL, NAME_CULTURAL_URL, NAME_OTHERS_URL];

$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-12']);
	    $tag->h2();
	        $tag->printer(UTILITIES_NAME);
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