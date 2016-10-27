<?php
// menus e urls
$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-12']);
	    $tag->h2();
	        $tag->printer($language->ITENS_UTILITIES);
	    $tag->h2;
		
		$tag->printer($language->SITE_HORIZONTAL_BAR);
	    $home_helper->utilitaries_menu();

	$tag->div;
	$tag->hr();
$tag->div;