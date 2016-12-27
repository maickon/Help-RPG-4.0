
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina de formulario da visualizacao gerada no automatico

	$tag->input('type="hidden" name="dono" value="'.$_SESSION['login'].'" required aria-required="true"');
    $tag->input('type="hidden" name="lingua" value="'.$_SESSION['lingua'].'" required aria-required="true"');
	$tag->input('type="hidden" name="id" value="'.$cronicas->id.'" required aria-required="true"');
	$tag->div('class="col-sm-4"');
		$tag->p();
	        $tag->b();
	        	$tag->printer('titulo');
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->input('type="text" name="titulo" value="'.$cronicas->titulo.'" required aria-required="true" class="form-control" placeholder=""');
			$tag->div;
		$tag->div;
	$tag->div;
	$tag->div('class="col-sm-4"');
		$tag->p();
	        $tag->b();
	        	$tag->printer('tipo');
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->input('type="text" name="tipo" value="'.$cronicas->tipo.'" required aria-required="true" class="form-control" placeholder=""');
			$tag->div;
		$tag->div;
	$tag->div;$selects = ['op1','op2'];

	$tag->div('class="col-md-4"');
		$tag->p();
	        $tag->b();
	        	$tag->printer($language->ARMOR_RPG_SYSTEM);
	        $tag->b;
	    $tag->p;

	    $tag->select('class="form-control show-tick" name="sistema" data-live-search="true" id="lista"');
	    	foreach ($sistemas_helper->rpg_nomes as $key => $value) {
	    		if (trim($value) == $cronicas->sistema) {
		            $tag->option('selected');
		            	$tag->printer($value);
		            $tag->option;
	    		} else {
		            $tag->option();
		            	$tag->printer($value);
		            $tag->option;
	    		}
	    	}
	    $tag->select;
	$tag->div;
	$tag->div('class="col-sm-12"');
		$tag->p();
	        $tag->b();
	        	$tag->printer($language->WEAPON_DESCRIPTION);
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->textarea('class="form-control" rows="1" id="comment" name="descricao_pequena"');
	        		$tag->printer($cronicas->descricao_pequena);
	        	$tag->textarea;
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
	        		$tag->printer($cronicas->descricao);
	        	$tag->textarea;
			$tag->div;
		$tag->div;
	$tag->div;
	