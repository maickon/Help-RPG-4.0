<?php
// primeira letra maiuscula de um texto minusculo
$HOME = ucfirst(strtolower(HOME));

// menus e urls
$_MENU_LABELS = [$HOME, NAME_PLACES, NAME_CLASS, NAME_RACES, NAME_CULTURAL, NAME_OTHERS];

$_MENU_URLS = [
				HOME_URL, 
				$rota->lugares_path, 
				$rota->classes_path, 
				$rota->racas_path, 
				$rota->culturais_path, 
				$rota->outros_path];

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