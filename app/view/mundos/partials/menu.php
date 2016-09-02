<?php
// menus e urls
$_MENU_LABELS = [NAME_PLACES, NAME_CLASS, NAME_RACES, NAME_CULTURAL, NAME_OTHERS];

$_MENU_URLS = [
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
		    $tag->a(['href'=> $_MENU_URLS[$i], 'class' => 'utilitarios-link']);
		        $tag->printer($_MENU_LABELS[$i]);
		    $tag->a;
		    $tag->printer(HORIZONTAL_BAR);
	    }

	    $tag->br();

		$tag->printer('|');
	    $home_helper->utilitaries_menu();

	$tag->div;
	$tag->hr();
$tag->div;