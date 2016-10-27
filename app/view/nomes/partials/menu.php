<?php
// menus e urls
$_MENU_LABELS = [$language->NAME_PLACES, $language->NAME_CLASS, $language->NAME_RACES, $language->NAME_CULTURAL, $language->NAME_OTHERS];

$_MENU_URLS = [
				$rota->lugares_path, 
				$rota->classes_path, 
				$rota->racas_path, 
				$rota->culturais_path, 
				$rota->outros_path];

$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-12']);
	    $tag->h2();
	        $tag->printer($language->NAME_UTILITIES);
	    $tag->h2;
		
		$tag->printer($language->SITE_HORIZONTAL_BAR);
	    for ($i=0; $i < count($_MENU_URLS); $i++) { 
		    $tag->a(['href'=> $_MENU_URLS[$i], 'class' => 'utilitarios-link']);
		        $tag->printer($_MENU_LABELS[$i]);
		    $tag->a;
		    $tag->printer($language->SITE_HORIZONTAL_BAR);
	    }

	    $tag->br();

		$tag->printer('|');
	    $home_helper->utilitaries_menu();

	$tag->div;
	$tag->hr();
$tag->div;