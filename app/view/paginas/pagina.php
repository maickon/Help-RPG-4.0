
<?php
	// Help RPG 2016
	// @author Maickon Rangel

	require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

	$tag->section('class="content"');

	    $tag->div('class="col-lg-12"');
	        $tag->div('class="row clearfix"');
	            $tag->div('class="card"');
	                $tag->div('class="body page"');
	                	$tag->div('class="row"');
	                		$tag->printer($pagina->descricao);
	                    $tag->div;
	                $tag->div;
	            $tag->div;
	        $tag->div;
	    $tag->div;
	$tag->section;

	require 'partials/footer.php';