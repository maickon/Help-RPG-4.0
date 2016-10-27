<?php

$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-12']);
	    $tag->h2();
	        $tag->printer($language->ADVENTURE_UTILITIES_GENERATE);
	    $tag->h2;
		
		$tag->printer($language->SITE_HORIZONTAL_BAR);
		
	    $home_helper->utilitaries_menu();

	$tag->div;
	$tag->hr();
$tag->div;