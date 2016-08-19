<?php
// primeira letra maiuscula de um texto minusculo
$HOME = ucfirst(strtolower(HOME));

// menus e urls
$_MENU_LABELS = [$HOME, MEDIVEL_ADVENTURES_LABEL, STAR_WAR_ADVENTURES_LABEL, APOCALIPSE_ADVENTURES_LABEL];
$_MENU_URLS = [HOME_URL, MEDIVEL_ADVENTURES_URL, STAR_WAR_ADVENTURES_URL, APOCALIPSE_ADVENTURES_URL];

$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-12']);
	    $tag->h2();
	        $tag->printer(UTILITIES_ADVENTURES_GENERATE);
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