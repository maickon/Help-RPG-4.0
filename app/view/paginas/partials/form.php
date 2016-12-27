
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina de formulario da visualizacao gerada no automatico

	$tag->input('type="hidden" name="dono" value="'.$_SESSION['login'].'" required aria-required="true"');
    $tag->input('type="hidden" name="lingua" value="'.$_SESSION['lingua'].'" required aria-required="true"');
	$tag->input('type="hidden" name="id" value="'.$paginas->id.'" required aria-required="true"');
	$tag->div('class="col-sm-4"');
		$tag->p();
	        $tag->b();
	        	$tag->printer('mome');
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->input('type="text" name="nome" value="'.$paginas->nome.'" required aria-required="true" class="form-control" placeholder=""');
			$tag->div;
		$tag->div;
	$tag->div;
	$tag->div('class="col-sm-4"');
		$tag->p();
	        $tag->b();
	        	$tag->printer('titulo');
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->input('type="text" name="titulo" value="'.$paginas->titulo.'" required aria-required="true" class="form-control" placeholder=""');
			$tag->div;
		$tag->div;
	$tag->div;
	$tag->div('class="col-sm-12"');
		$tag->p();
	        $tag->b();
	        	$tag->printer($language->WEAPON_DESCRIPTION);
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->textarea('id="ckeditor" name="descricao"');
	        		$tag->printer($paginas->descricao);
	        	$tag->textarea;
			$tag->div;
		$tag->div;
	$tag->div;
	